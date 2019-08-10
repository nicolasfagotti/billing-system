<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBillsRequest;
use App\Http\Requests\UpdateBillsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BillsRepository;
use App\Repositories\ClientsRepository;
use App\Utils\DateToText;
use App\Utils\NumberToText;
use Illuminate\Http\Request;
use Flash;
use PDF;
use Response;

class BillsController extends AppBaseController
{
    /** @var  BillsRepository */
    private $billsRepository;

    /** @var  ClientsRepository */
    private $clientsRepository;

    public function __construct(BillsRepository $billsRepo, ClientsRepository $clientsRepo)
    {
        $this->billsRepository = $billsRepo;
        $this->clientsRepository = $clientsRepo;
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
        if ($request->input('client_id')) {
            $filters['client_id'] = $request->input('client_id');
        }

        $bills = $this->billsRepository->all($filters);
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
        return view('bills.create')->with('clients', $clients);;
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

        $title = "$client->full_name - $bill->created_at";
        $data = [
            'title' => $title,
            'date' => DateToText::convert($bill->created_at),
            'clientName' => $client->full_name,
            'amount' => $bill->formatedAmount(),
            'amountText' => NumberToText::convert($bill->amount),
        ];
        $pdf = PDF::loadView('pdf.bill', $data);

        return $pdf->download("$title.pdf");
    }
}
