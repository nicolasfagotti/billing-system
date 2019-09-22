<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChecksRequest;
use App\Http\Requests\UpdateChecksRequest;
use App\Repositories\ChecksRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ChecksController extends AppBaseController
{
    /** @var  ChecksRepository */
    private $checksRepository;

    public function __construct(ChecksRepository $checksRepo)
    {
        $this->checksRepository = $checksRepo;
    }

    /**
     * Display a listing of the Checks.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $checks = $this->checksRepository->all();

        return view('checks.index')
            ->with('checks', $checks);
    }

    /**
     * Show the form for creating a new Checks.
     *
     * @return Response
     */
    public function create()
    {
        return view('checks.create');
    }

    /**
     * Store a newly created Checks in storage.
     *
     * @param CreateChecksRequest $request
     *
     * @return Response
     */
    public function store(CreateChecksRequest $request)
    {
        $input = $request->all();

        $checks = $this->checksRepository->create($input);

        Flash::success('Checks saved successfully.');

        return redirect(route('checks.index'));
    }

    /**
     * Display the specified Checks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $checks = $this->checksRepository->find($id);

        if (empty($checks)) {
            Flash::error('Checks not found');

            return redirect(route('checks.index'));
        }

        return view('checks.show')->with('checks', $checks);
    }

    /**
     * Show the form for editing the specified Checks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $checks = $this->checksRepository->find($id);

        if (empty($checks)) {
            Flash::error('Checks not found');

            return redirect(route('checks.index'));
        }

        return view('checks.edit')->with('checks', $checks);
    }

    /**
     * Update the specified Checks in storage.
     *
     * @param int $id
     * @param UpdateChecksRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChecksRequest $request)
    {
        $checks = $this->checksRepository->find($id);

        if (empty($checks)) {
            Flash::error('Checks not found');

            return redirect(route('checks.index'));
        }

        $checks = $this->checksRepository->update($request->all(), $id);

        Flash::success('Checks updated successfully.');

        return redirect(route('checks.index'));
    }

    /**
     * Remove the specified Checks from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $checks = $this->checksRepository->find($id);

        if (empty($checks)) {
            Flash::error('Checks not found');

            return redirect(route('checks.index'));
        }

        $this->checksRepository->delete($id);

        Flash::success('Checks deleted successfully.');

        return redirect(route('checks.index'));
    }
}
