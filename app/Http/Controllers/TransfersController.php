<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransfersRequest;
use App\Http\Requests\UpdateTransfersRequest;
use App\Repositories\TransfersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class TransfersController extends AppBaseController
{
    /** @var  TransfersRepository */
    private $transfersRepository;

    public function __construct(TransfersRepository $transfersRepo)
    {
        $this->transfersRepository = $transfersRepo;
    }

    /**
     * Display a listing of the Transfers.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $transfers = $this->transfersRepository->all();

        return view('transfers.index')
            ->with('transfers', $transfers);
    }

    /**
     * Show the form for creating a new Transfers.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('transfers.create');
    }

    /**
     * Store a newly created Transfers in storage.
     *
     * @param CreateTransfersRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreateTransfersRequest $request)
    {
        $input = $request->all();

        $transfers = $this->transfersRepository->create($input);

        Flash::success('Transfers saved successfully.');

        return redirect(route('transfers.index'));
    }

    /**
     * Display the specified Transfers.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $transfers = $this->transfersRepository->find($id);

        if (empty($transfers)) {
            Flash::error('Transfers not found');

            return redirect(route('transfers.index'));
        }

        return view('transfers.show')->with('transfers', $transfers);
    }

    /**
     * Show the form for editing the specified Transfers.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $transfers = $this->transfersRepository->find($id);

        if (empty($transfers)) {
            Flash::error('Transfers not found');

            return redirect(route('transfers.index'));
        }

        return view('transfers.edit')->with('transfers', $transfers);
    }

    /**
     * Update the specified Transfers in storage.
     *
     * @param int $id
     * @param UpdateTransfersRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdateTransfersRequest $request)
    {
        $transfers = $this->transfersRepository->find($id);

        if (empty($transfers)) {
            Flash::error('Transfers not found');

            return redirect(route('transfers.index'));
        }

        $transfers = $this->transfersRepository->update($request->all(), $id);

        Flash::success('Transfers updated successfully.');

        return redirect(route('transfers.index'));
    }

    /**
     * Remove the specified Transfers from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $transfers = $this->transfersRepository->find($id);

        if (empty($transfers)) {
            Flash::error('Transfers not found');

            return redirect(route('transfers.index'));
        }

        $this->transfersRepository->delete($id);

        Flash::success('Transfers deleted successfully.');

        return redirect(route('transfers.index'));
    }
}
