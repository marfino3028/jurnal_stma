<?php

namespace App\Http\Controllers;

use App\DataTables\MetadataDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMetadataRequest;
use App\Http\Requests\UpdateMetadataRequest;
use App\Repositories\MetadataRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MetadataController extends AppBaseController
{
    /** @var  MetadataRepository */
    private $metadataRepository;

    public function __construct(MetadataRepository $metadataRepo)
    {
        $this->metadataRepository = $metadataRepo;
    }

    /**
     * Display a listing of the Metadata.
     *
     * @param MetadataDataTable $metadataDataTable
     * @return Response
     */
    public function index(MetadataDataTable $metadataDataTable)
    {
        return $metadataDataTable->render('metadata.index');
    }

    /**
     * Show the form for creating a new Metadata.
     *
     * @return Response
     */
    public function create()
    {
        return view('metadata.create');
    }

    /**
     * Store a newly created Metadata in storage.
     *
     * @param CreateMetadataRequest $request
     *
     * @return Response
     */
    public function store(CreateMetadataRequest $request)
    {
        $input = $request->all();

        $metadata = $this->metadataRepository->create($input);

        Flash::success('Metadata saved successfully.');

        return redirect(route('metadata.index'));
    }

    /**
     * Display the specified Metadata.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $metadata = $this->metadataRepository->find($id);

        if (empty($metadata)) {
            Flash::error('Metadata not found');

            return redirect(route('metadata.index'));
        }

        return view('metadata.show')->with('metadata', $metadata);
    }

    /**
     * Show the form for editing the specified Metadata.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $metadata = $this->metadataRepository->find($id);

        if (empty($metadata)) {
            Flash::error('Metadata not found');

            return redirect(route('metadata.index'));
        }

        return view('metadata.edit')->with('metadata', $metadata);
    }

    /**
     * Update the specified Metadata in storage.
     *
     * @param  int              $id
     * @param UpdateMetadataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMetadataRequest $request)
    {
        $metadata = $this->metadataRepository->find($id);

        if (empty($metadata)) {
            Flash::error('Metadata not found');

            return redirect(route('metadata.index'));
        }

        $metadata = $this->metadataRepository->update($request->all(), $id);

        Flash::success('Metadata updated successfully.');

        return redirect(route('metadata.index'));
    }

    /**
     * Remove the specified Metadata from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $metadata = $this->metadataRepository->find($id);

        if (empty($metadata)) {
            Flash::error('Metadata not found');

            return redirect(route('metadata.index'));
        }

        $this->metadataRepository->delete($id);

        Flash::success('Metadata deleted successfully.');

        return redirect(route('metadata.index'));
    }
}
