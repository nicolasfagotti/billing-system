<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBillsRequest;
use App\Http\Requests\UpdateBillsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BillsRepository;
use App\Repositories\ClientsRepository;
use App\Repositories\ConceptsRepository;
use App\Repositories\ChecksRepository;
use App\Repositories\TransfersRepository;
use App\Utils\DateToText;
use App\Utils\NumberToText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flash;
use PDF;
use Response;

class BillsController extends AppBaseController
{
    /** @var  BillsRepository */
    private $billsRepository;

    /** @var  ClientsRepository */
    private $clientsRepository;

    /** @var  ConceptsRepository */
    private $conceptsRepository;

    /** @var  ChecksRepository */
    private $checksRepository;

    /** @var  TransfersRepository */
    private $transfersRepository;

    public function __construct(BillsRepository $billsRepo, ClientsRepository $clientsRepo, ConceptsRepository $conceptsRepo, ChecksRepository $checksRepo, TransfersRepository $transfersRepo)
    {
        $this->billsRepository = $billsRepo;
        $this->clientsRepository = $clientsRepo;
        $this->conceptsRepository = $conceptsRepo;
        $this->checksRepository = $checksRepo;
        $this->transfersRepository = $transfersRepo;
    }

    /**
     * Display a listing of the Bills.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $filters = [];
        $billsQuery = $this->billsRepository->makeModel()->newQuery();

        if ($request->input('client_id')) {
            $filters['client_id'] = $request->input('client_id');
            $billsQuery->where('client_id', '=', $filters['client_id']);
        }
        if ($request->input('from_date')) {
            $filters['from_date'] = $request->input('from_date');
            $billsQuery->where('created_at', '>=', $filters['from_date'] . ' 00:00:00');
        }
        if ($request->input('to_date')) {
            $filters['to_date'] = $request->input('to_date');
            $billsQuery->where('created_at', '<=', $filters['to_date'] . ' 23:59:59');
        }

        $bills = $billsQuery->orderBy('created_at', 'desc')->get();
        $clients = $this->clientsRepository->all()->pluck('full_name', 'id');

        return view('bills.index')
            ->with('bills', $bills)
            ->with('clients', $clients)
            ->with('filters', $filters);
    }

    /**
     * Show the form for creating a new Bills.
     *
     * @return Response
     */
    public function create()
    {
        $clients = $this->clientsRepository->all()->pluck('full_name', 'id');
        $banks = DB::table('banks')->pluck('name', 'id');

        return view('bills.create')->with('banks', $banks)->with('clients', $clients);
    }

    /**
     * Store a newly created Bills in storage.
     *
     * @param CreateBillsRequest $request
     *
     * @return Response
     */
    public function store(CreateBillsRequest $request)
    {
        $input = $request->all();

        $bills = $this->billsRepository->create($input);
        for ($i = 0; $i < count($input['detail']); $i++) {
            $this->conceptsRepository->create([
                'bill_id' => $bills->id,
                'detail' => $input['detail'][$i],
                'amount' => $input['amount'][$i]]
            );
        }
        if (isset($input['check_number'])) {
            for ($i = 0; $i < count($input['check_number']); $i++) {
                $this->checksRepository->create([
                    'bill_id' => $bills->id,
                    'number' => $input['check_number'][$i],
                    'bank_id' => $input['check_bank'][$i],
                    'amount' => $input['check_amount'][$i]]
                );
            }
        }
        if (isset($input['transfer_number'])) {
            for ($i = 0; $i < count($input['transfer_number']); $i++) {
                $this->transfersRepository->create([
                    'bill_id' => $bills->id,
                    'number' => $input['transfer_number'][$i],
                    'bank_id' => $input['transfer_bank'][$i],
                    'amount' => $input['transfer_amount'][$i]]
                );
            }
        }

        Flash::success(__('bill.message.saved'));

        return redirect(route('bills.index'));
    }

    /**
     * Display the specified Bills.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bills = $this->billsRepository->find($id);

        if (empty($bills)) {
            Flash::error(__('bill.message.not_found'));

            return redirect(route('bills.index'));
        }

        return view('bills.show')->with('bills', $bills);
    }

    /**
     * Show the form for editing the specified Bills.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bills = $this->billsRepository->find($id);
        $clients = $this->clientsRepository->all()->pluck('full_name', 'id');

        if (empty($bills)) {
            Flash::error(__('bill.message.not_found'));

            return redirect(route('bills.index'));
        }

        return view('bills.edit')->with('bills', $bills)->with('clients', $clients);
    }

    /**
     * Update the specified Bills in storage.
     *
     * @param int $id
     * @param UpdateBillsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBillsRequest $request)
    {
        $bills = $this->billsRepository->find($id);

        if (empty($bills)) {
            Flash::error(__('bill.message.not_found'));

            return redirect(route('bills.index'));
        }

        $bills = $this->billsRepository->update($request->all(), $id);

        Flash::success(__('bill.message.updated'));

        return redirect(route('bills.index'));
    }

    /**
     * Remove the specified Bills from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bills = $this->billsRepository->find($id);

        if (empty($bills)) {
            Flash::error(__('bill.message.not_found'));

            return redirect(route('bills.index'));
        }

        $this->billsRepository->delete($id);

        Flash::success(__('bill.message.deleted'));

        return redirect(route('bills.index'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $bill = $this->billsRepository->find($id);
        $client = $this->clientsRepository->find($bill->client_id);
        $checks = $this->checksRepository->all(['bill_id' => $id]);
        $transfers = $this->transfersRepository->all(['bill_id' => $id]);
        $concepts = $this->conceptsRepository->all(['bill_id' => $id]);

        $title = "$client->full_name - $bill->created_at";
        $data = [
            'title' => $title,
            'date' => DateToText::convert($bill->created_at),
            'clientName' => $client->full_name,
            'bill' => $bill,
            'checks' => $checks,
            'concepts' => $concepts,
            'transfers' => $transfers,
            'amountText' => NumberToText::convert($bill->getAmount()),
        ];
        $pdf = PDF::loadView('pdf.bill', $data);

        return $pdf->download("$title.pdf");
    }
}
