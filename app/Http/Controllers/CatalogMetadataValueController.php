<?php

namespace App\Http\Controllers;

use App\DataTables\CatalogMetadataValueDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCatalogMetadataValueRequest;
use App\Http\Requests\UpdateCatalogMetadataValueRequest;
use App\Repositories\CatalogMetadataValueRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CatalogMetadataValueController extends AppBaseController
{
    /** @var  CatalogMetadataValueRepository */
    private $catalogMetadataValueRepository;

    public function __construct(CatalogMetadataValueRepository $catalogMetadataValueRepo)
    {
        $this->catalogMetadataValueRepository = $catalogMetadataValueRepo;
    }

    /**
     * Display a listing of the CatalogMetadataValue.
     *
     * @param CatalogMetadataValueDataTable $catalogMetadataValueDataTable
     * @return Response
     */
    public function index(CatalogMetadataValueDataTable $catalogMetadataValueDataTable)
    {
        return $catalogMetadataValueDataTable->render('catalog_metadata_values.index');
    }

    /**
     * Show the form for creating a new CatalogMetadataValue.
     *
     * @return Response
     */
    public function create()
    {
        return view('catalog_metadata_values.create');
    }

    /**
     * Store a newly created CatalogMetadataValue in storage.
     *
     * @param CreateCatalogMetadataValueRequest $request
     *
     * @return Response
     */
    public function store(CreateCatalogMetadataValueRequest $request)
    {
        $input = $request->all();

        $catalogMetadataValue = $this->catalogMetadataValueRepository->create($input);

        Flash::success('Catalog Metadata Value saved successfully.');

        return redirect(route('catalogMetadataValues.index'));
    }

    /**
     * Display the specified CatalogMetadataValue.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catalogMetadataValue = $this->catalogMetadataValueRepository->find($id);

        if (empty($catalogMetadataValue)) {
            Flash::error('Catalog Metadata Value not found');

            return redirect(route('catalogMetadataValues.index'));
        }

        return view('catalog_metadata_values.show')->with('catalogMetadataValue', $catalogMetadataValue);
    }

    /**
     * Show the form for editing the specified CatalogMetadataValue.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catalogMetadataValue = $this->catalogMetadataValueRepository->find($id);

        if (empty($catalogMetadataValue)) {
            Flash::error('Catalog Metadata Value not found');

            return redirect(route('catalogMetadataValues.index'));
        }

        return view('catalog_metadata_values.edit')->with('catalogMetadataValue', $catalogMetadataValue);
    }

    /**
     * Update the specified CatalogMetadataValue in storage.
     *
     * @param  int              $id
     * @param UpdateCatalogMetadataValueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatalogMetadataValueRequest $request)
    {
        $catalogMetadataValue = $this->catalogMetadataValueRepository->find($id);

        if (empty($catalogMetadataValue)) {
            Flash::error('Catalog Metadata Value not found');

            return redirect(route('catalogMetadataValues.index'));
        }

        $catalogMetadataValue = $this->catalogMetadataValueRepository->update($request->all(), $id);

        Flash::success('Catalog Metadata Value updated successfully.');

        return redirect(route('catalogMetadataValues.index'));
    }

    /**
     * Remove the specified CatalogMetadataValue from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catalogMetadataValue = $this->catalogMetadataValueRepository->find($id);

        if (empty($catalogMetadataValue)) {
            Flash::error('Catalog Metadata Value not found');

            return redirect(route('catalogMetadataValues.index'));
        }

        $this->catalogMetadataValueRepository->delete($id);

        Flash::success('Catalog Metadata Value deleted successfully.');

        return redirect(route('catalogMetadataValues.index'));
    }
}
