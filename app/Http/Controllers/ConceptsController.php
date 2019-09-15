<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConceptsRequest;
use App\Http\Requests\UpdateConceptsRequest;
use App\Repositories\ConceptsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ConceptsController extends AppBaseController
{
    /** @var  ConceptsRepository */
    private $conceptsRepository;

    public function __construct(ConceptsRepository $conceptsRepo)
    {
        $this->conceptsRepository = $conceptsRepo;
    }

    /**
     * Display a listing of the Concepts.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $concepts = $this->conceptsRepository->all();

        return view('concepts.index')
            ->with('concepts', $concepts);
    }

    /**
     * Show the form for creating a new Concepts.
     *
     * @return Response
     */
    public function create()
    {
        return view('concepts.create');
    }

    /**
     * Store a newly created Concepts in storage.
     *
     * @param CreateConceptsRequest $request
     *
     * @return Response
     */
    public function store(CreateConceptsRequest $request)
    {
        $input = $request->all();

        $concepts = $this->conceptsRepository->create($input);

        Flash::success('Concepts saved successfully.');

        return redirect(route('concepts.index'));
    }

    /**
     * Display the specified Concepts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $concepts = $this->conceptsRepository->find($id);

        if (empty($concepts)) {
            Flash::error('Concepts not found');

            return redirect(route('concepts.index'));
        }

        return view('concepts.show')->with('concepts', $concepts);
    }

    /**
     * Show the form for editing the specified Concepts.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $concepts = $this->conceptsRepository->find($id);

        if (empty($concepts)) {
            Flash::error('Concepts not found');

            return redirect(route('concepts.index'));
        }

        return view('concepts.edit')->with('concepts', $concepts);
    }

    /**
     * Update the specified Concepts in storage.
     *
     * @param int $id
     * @param UpdateConceptsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConceptsRequest $request)
    {
        $concepts = $this->conceptsRepository->find($id);

        if (empty($concepts)) {
            Flash::error('Concepts not found');

            return redirect(route('concepts.index'));
        }

        $concepts = $this->conceptsRepository->update($request->all(), $id);

        Flash::success('Concepts updated successfully.');

        return redirect(route('concepts.index'));
    }

    /**
     * Remove the specified Concepts from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $concepts = $this->conceptsRepository->find($id);

        if (empty($concepts)) {
            Flash::error('Concepts not found');

            return redirect(route('concepts.index'));
        }

        $this->conceptsRepository->delete($id);

        Flash::success('Concepts deleted successfully.');

        return redirect(route('concepts.index'));
    }
}
