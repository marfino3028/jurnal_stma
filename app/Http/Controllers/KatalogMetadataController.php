<?php

namespace App\Http\Controllers;

use App\DataTables\KatalogMetadataDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKatalogMetadataRequest;
use App\Http\Requests\UpdateKatalogMetadataRequest;
use App\Repositories\KatalogMetadataRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KatalogMetadataController extends AppBaseController
{
    /** @var  KatalogMetadataRepository */
    private $katalogMetadataRepository;

    public function __construct(KatalogMetadataRepository $katalogMetadataRepo)
    {
        $this->katalogMetadataRepository = $katalogMetadataRepo;
    }

    /**
     * Display a listing of the KatalogMetadata.
     *
     * @param KatalogMetadataDataTable $katalogMetadataDataTable
     * @return Response
     */
    public function index(KatalogMetadataDataTable $katalogMetadataDataTable)
    {
        return $katalogMetadataDataTable->render('katalog_metadatas.index');
    }

    /**
     * Show the form for creating a new KatalogMetadata.
     *
     * @return Response
     */
    public function create()
    {
        return view('katalog_metadatas.create');
    }

    /**
     * Store a newly created KatalogMetadata in storage.
     *
     * @param CreateKatalogMetadataRequest $request
     *
     * @return Response
     */
    public function store(CreateKatalogMetadataRequest $request)
    {
        $input = $request->all();
        foreach ($input['metadata'] as $metadata_id ) {
            $katalogMetadata = new \App\Models\KatalogMetadata();
            $katalogMetadata->category_id = $input['category_id'];
            $katalogMetadata->metadata_id = $metadata_id;
            $katalogMetadata->type = $input['type'];
            $katalogMetadata->save();
        }
        // $katalogMetadata = $this->katalogMetadataRepository->create($input);

        Flash::success('Metadata saved successfully.');

        return redirect(route('categories.show',$input['category_id']));
    }

    /**
     * Display the specified KatalogMetadata.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $katalogMetadata = $this->katalogMetadataRepository->find($id);

        if (empty($katalogMetadata)) {
            Flash::error('Katalog Metadata not found');

            return redirect(route('katalogMetadatas.index'));
        }

        return view('katalog_metadatas.show')->with('katalogMetadata', $katalogMetadata);
    }

    /**
     * Show the form for editing the specified KatalogMetadata.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $katalogMetadata = $this->katalogMetadataRepository->find($id);

        if (empty($katalogMetadata)) {
            Flash::error('Katalog Metadata not found');

            return redirect(route('katalogMetadatas.index'));
        }

        return view('katalog_metadatas.edit')->with('katalogMetadata', $katalogMetadata);
    }

    /**
     * Update the specified KatalogMetadata in storage.
     *
     * @param  int              $id
     * @param UpdateKatalogMetadataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKatalogMetadataRequest $request)
    {
        $katalogMetadata = $this->katalogMetadataRepository->find($id);

        if (empty($katalogMetadata)) {
            Flash::error('Katalog Metadata not found');

            return redirect(route('katalogMetadatas.index'));
        }

        $katalogMetadata = $this->katalogMetadataRepository->update($request->all(), $id);

        Flash::success('Katalog Metadata updated successfully.');

        return redirect(route('katalogMetadatas.index'));
    }

    /**
     * Remove the specified KatalogMetadata from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $katalogMetadata = $this->katalogMetadataRepository->find($id);

        if (empty($katalogMetadata)) {
            Flash::error('Katalog Metadata not found');

            return redirect(route('katalogMetadatas.index'));
        }

        $this->katalogMetadataRepository->delete($id);

        Flash::success('Metadata deleted successfully.');
        return redirect(route('categories.show',$katalogMetadata->category_id));

    }
}
