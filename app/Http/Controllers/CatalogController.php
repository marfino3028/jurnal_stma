<?php

namespace App\Http\Controllers;

use App\DataTables\CatalogDataTable;
use App\Http\Requests;
use App\Models\Metadata;
use App\Models\Catalog;
use App\Models\CatalogMetadataValue;
use App\Http\Requests\CreateCatalogRequest;
use App\Http\Requests\UpdateCatalogRequest;
use App\Repositories\CatalogRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Mail\NotifyNewCatalog;
use App\Mail\NotifyUpdateCatalog;
use Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class CatalogController extends AppBaseController
{
    /** @var  CatalogRepository */
    private $catalogRepository;

    public function __construct(CatalogRepository $catalogRepo)
    {
        $this->catalogRepository = $catalogRepo;
    }

    /**
     * Display a listing of the Catalog.
     *
     * @param CatalogDataTable $catalogDataTable
     * @return Response
     */
    public function index(CatalogDataTable $catalogDataTable)
    {
        // return $catalogDataTable->render('catalogs.index');
        $categories = \App\Models\Category::all();
        return view('catalogs.index')->with('categories',$categories);
    }

    public function indexWithCategory(CatalogDataTable $catalogDataTable,$category_id)
    {
        $catalogs = new CatalogMetadataValue();
        if (\Auth::user()->can('isAdmin')) {
            $catalogs = $catalogs->getWithCatalogs($category_id)->get();
            

        }else{
            $catalogs = $catalogs->getWithCatalogs($category_id)->where('user_id',\Auth::user()->id)->get();
        } 
        return view('catalogs.index_with_category')->with('catalogs',$catalogs)->with('category_id',$category_id);

        // return response($catalogs);
    }

    /**
     * Show the form for creating a new Catalog.
     *
     * @return Response
     */
    public function create()
    {
        return view('catalogs.create');
    }

    public function createWithCategory($id)
    {
        $metadata = \App\Models\Metadata::get();
        // $catalogz = \App\Models\Catalog::get();
        $katalog_metadata = \App\Models\KatalogMetadata::with('metadata')->where('category_id',$id)->get();
        return view('catalogs.create')->with('katalog_metadata',$katalog_metadata)->with('metadata', $metadata)->with('category_id',$id);
        // return response($katalog_metadata);
    }

    /**
     * Store a newly created Catalog in storage.
     *
     * @param CreateCatalogRequest $request
     *
     * @return Response
     */
    public function store(CreateCatalogRequest $request)
    {

        $input = $request->all();

        if (\Auth::user()->can('isAdmin')) {
            $input['status'] = 1 ;
        }else{
            $input['status'] = 0 ;
        } 
        $input['cover'] = $this->uploadingCover($request);
        $input['full'] = $this->uploadingFull($request);

        $catalogInput = [
            'cover' => $input['cover'],
            'full' => $input['full'],
            'status' => $input['status'],
            'user_id' => $input['user_id'],
            'category_id' => $input['category_id'],
        ];
        $catalog = $this->catalogRepository->create($catalogInput);    
        $catalog_id = $catalog->id;

        $value = Str::random(9);
        foreach ($input['metadata'] as $key => $valueKey) {
            CatalogMetadataValue::create([
                'metadata_id'=>$key,
                'metadata_key'=>$valueKey,
                'value'=> $value,
                'catalog_id'=>$catalog->id
            ]);
        }
            
            
        if (! \Auth::user()->can('isAdmin')) {
            // $admin = \App\Models\User::where('role_id','1')->first();
            // Mail::to($admin->email)->send(new NotifyNewCatalog($catalog));
        } 

        Flash::success('Catalog saved successfully.');

        return redirect(route('catalogs.index_with_category',$request->category_id));
    }

    /**
     * Display the specified Catalog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catalog = $this->catalogRepository->find($id);
        if (empty($catalog)) {
            Flash::error('Catalog not found');
            return redirect(route('catalogs.index'));
        }
        $user = \Auth::user();
        if (\Auth::user()->can('isAdmin')) {
            return view('catalogs.show')->with('catalog', $catalog);
        }else{
            if ($user->can('update-catalog', $catalog)) {
                return view('catalogs.show')->with('catalog', $catalog);
            }else{
                return abort(403, 'Unauthorized action.');
            }
        } 
        
       
    }

    /**
     * Show the form for editing the specified Catalog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catalog = \App\Models\Catalog::with('catalog_metadata_value')->find($id);
        $category_id = $catalog->category_id;
        $katalog_metadata = \App\Models\KatalogMetadata::with('metadata')->where('category_id',$category_id)->get();

        if (empty($catalog)) {
            Flash::error('Catalog not found');

            return redirect(route('catalogs.index'));
        }

        return view('catalogs.edit')->with('catalog', $catalog)->with('katalog_metadata',$katalog_metadata)->with('category_id',$category_id);
    }

    /**
     * Update the specified Catalog in storage.
     *
     * @param  int              $id
     * @param UpdateCatalogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCatalogRequest $request)
    {
        $catalog = $this->catalogRepository->find($id);
        $input =  $request->all();
        $input['cover'] = $this->uploadingCover($request);
        $input['full'] = $this->uploadingFull($request);

        if (!$request->filled('cover') && !$request->filled('full') ) {
            $input =  $request->except(['full','cover']);
        }elseif($request->filled('cover') && !$request->filled('full') ){
            $input =  $request->except(['full']);
            // if($catalog->cover) $this->remove_uploaded($catalog->cover);
        }elseif(!$request->filled('cover') && $request->filled('full') ){
            $input =  $request->except(['cover']);
            // if($catalog->full) $this->remove_uploaded($catalog->full);
        }
        // $input = $request->filled('cover') ? $request->all() : $request->except('cover');
        // $input = $request->filled('full') ? $request->all() : $request->except('full');
        // return response($input);
        if (empty($catalog)) {
            Flash::error('Catalog not found');

            return redirect(route('catalogs.index'));
        }
        foreach ($input['metadata'] as $key => $value) {
            $val = [
                'metadata_id'=>$key,
                'metadata_key'=>$value['key'],
                'value'=>$value['value'],
                'catalog_id'=>$catalog->id
            ];
            $data = \App\Models\CatalogMetadataValue::updateOrCreate(['id'=>$value['id']],$val);
        }

        $catalog = $this->catalogRepository->update($input, $id);

        Flash::success('Catalog updated successfully.');

        return redirect(route('catalogs.index'));
    }

    /**
     * Remove the specified Catalog from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catalog = $this->catalogRepository->find($id);

        if (empty($catalog)) {
            Flash::error('Catalog not found');

            return redirect(route('catalogs.index'));
        }

        $this->catalogRepository->delete($id);
        if($catalog->cover) $this->remove_uploaded($catalog->cover);
        if($catalog->full) $this->remove_uploaded($catalog->full);

        Flash::success('Catalog deleted successfully.');

        return redirect(route('catalogs.index'));
    }

    protected function remove_uploaded($fileName)
    {
        if(file_exists($fileName)) {
            return unlink($fileName);
        }
    }

    protected function uploadingCover($request)
    {
        $destinationPath = 'catalog/cover';
        if(! is_dir($destinationPath)) {
            if(! is_dir('catalog')){
                mkdir('catalog');
            }
            mkdir($destinationPath);
        }

        if($request->has('cover')) {
            $result = '';
            for ($i=0; $i < count($request->file('cover')); $i++) { 
                $file = $request->file('cover')[$i];
                $fileName = Str::random(3).'_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPath, $fileName);
                $result .= $destinationPath . '/' . $fileName . '|';
            }
            
            return substr($result,0,-1);
        }
        return;
    }

    protected function uploadingFull($request)
    {
        $destinationPath = 'catalog/full';
        if(! is_dir($destinationPath)) {
            if(! is_dir('catalog')){
                mkdir('catalog');
            }
            mkdir($destinationPath);

        }

        if($request->has('full')) {
            $result = '';
            for ($i=0; $i < count($request->file('full')); $i++) { 
                $file = $request->file('full')[$i];
                $fileName = Str::random(3).'_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPath, $fileName);
                $result .= $destinationPath . '/' . $fileName . '|';
            }
            
            return substr($result,0,-1);
        }
        return;
    }

    public function updateStatus($id){
        $catalog = $this->catalogRepository->find($id);
        if (empty($catalog)) {
            Flash::error('Catalog not found');
            return redirect(route('catalogs.index'));
        }
        $catalog->status == 1 ? $catalog->status = 0 : $catalog->status = 1; 
        $catalog->save();
        
        Mail::to($catalog->user->email)->send(new NotifyUpdateCatalog($catalog));
        Flash::success('Catalog updated successfully.');

        return redirect()->back();
    }
}
