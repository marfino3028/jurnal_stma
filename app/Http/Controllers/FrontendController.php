<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use DB;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::with(["catalogs" => function ($q) {
            $q->where('status', '=', 1);
        }])->get();
        $recents = \App\Models\Catalog::with('catalog_metadata_value')->where('status', '1')->orderBy('created_at', 'desc')->paginate(20);
        $arr = array(
            'categories' => $categories,
            'recents' => DB::table('catalog_metadata_value')->orderBy('created_at', 'desc')->paginate(3)
        );
        return view('frontEnd.index', $arr);
    }

    public function subcollection()
    {
        return view('frontEnd.sub_collection');
    }
    public function detailCategory($id)
    {
        $q1 = \App\Models\Category::with('catalogs')->where('id', $id)
            ->first();
        // $q1 = DB::table('catalog_metadata_value')
        //     ->join('catalogs', 'catalog_metadata_value.catalog_id', '=', 'catalogs.id')
        //     ->select('cover','catalog_metadata_value.value', 'catalog_metadata_value.catalog_id')->where('catalogs.category_id', $id)
        //     ->paginate(20);
        $q2 = \App\Models\Category::where('id', $id)->first();
        $arr = array(
            'data'  => $q1,
            'judul' => $q2->name
        );

        return view('frontEnd.detail_category', $arr);
    }

    public function detailCatalog($id)
    {
        $judulx = \App\Models\Catalog::where('id', $id)->first();
        $judul = \App\Models\CatalogMetadataValue::where('catalog_id', $id)->where('metadata_id',1)->get();

        $data = array();
        $i = 0;
        foreach ($judul as $row) {
            
            $abstr   = \App\Models\CatalogMetadataValue::where('catalog_id', $id)->where('metadata_id',2)->where('value',$row->value)->first();
            $url     = \App\Models\CatalogMetadataValue::where('catalog_id', $id)->where('metadata_id',3)->where('value',$row->value)->first();
            $date    = \App\Models\CatalogMetadataValue::where('catalog_id', $id)->where('metadata_id',4)->where('value',$row->value)->first();
            $penulis = \App\Models\CatalogMetadataValue::where('catalog_id', $id)->where('metadata_id',5)->where('value',$row->value)->first();
            
            $data[$i]['id'] = $id;
            $data[$i]['judul'] = $row->metadata_key;
            $data[$i]['value'] = $row->value;
            $data[$i]['abstrak'] = $abstr != NULL ? $abstr->metadata_key: '';
            $data[$i]['url'] = $url != NULL ? $penulis->metadata_key: '';
            $data[$i]['date'] = $date != NULL ? $penulis->metadata_key: '';
            $data[$i]['author'] = $penulis != NULL ? $penulis->metadata_key: '';
            $i++;
        }
        
        // $catalog = \App\Models\Catalog::with('catalog_metadata_value')->where('status', '1')->where('id', $id)->first();
        // return response($catalog);
        return view('frontEnd.detail_catalog')->with(compact('data','judulx'));
    }

    public function search(Request $request)
    {
        $categories = \App\Models\Category::pluck('name', 'id');
        $categories->offsetSet(0, 'ALL');
        $catalog = \App\Models\Catalog::with('catalog_metadata_value')->whereHas('catalog_metadata_value', function ($query) {
            $query->where('value', 'LIKE', '%' . request('q') . '%');
        })->when($request->has('cat_id'), function ($query)  use ($request) {
            $query->where('category_id', $request->input('cat_id'));
        })->where('status', '=', 1)->get();

        // return response($categories);
        return view('frontEnd.detail_search')->with(compact('catalog'))->with(compact('categories'));
    }

    public function item_record()
    {
        // return view('frontEnd.detail_search')->with(compact('catalog'))->with(compact('categories'));
    }
    public function news()
    {
        return view('frontEnd.news');
    }   
    public function filter($metadata) {
        $data = \App\Models\Metadata::where('value', $metadata)->first();
        if(!$data) {
            if(strtolower($metadata) !== "category") {
                return redirect(route('index'));
            }
        }

        $arr = array(
            'judul' => 'Browsing by '.request()->segment(2)
        );
        switch (strtolower($metadata)) {
            case 'category':
                $arr['data'] = \App\Models\Category::with(["catalogs" => function ($q) {
                    $q->where('status', '=', 1);
                }])->get();
                return view('frontEnd.category', $arr);
                break;
            case 'title':
                $arr['data'] = \App\Models\CatalogMetadataValue::where('metadata_id',1)->orderBy('metadata_key', 'asc')->groupBy('metadata_key')->get();
                return view('frontEnd.title', $arr);
                break;
            case 'abstrak':
                $arr['data'] = \App\Models\CatalogMetadataValue::where('metadata_id',2)->orderBy('metadata_key', 'asc')->groupBy('metadata_key')->get();
                return view('frontEnd.abstrak', $arr);
                break;
            case 'date':
                $arr['data'] = \App\Models\CatalogMetadataValue::where('metadata_id',4)->orderBy('metadata_key', 'asc')->groupBy('metadata_key')->get();
                return view('frontEnd.date', $arr);
                break;
            case 'author':
                $arr['data'] = \App\Models\CatalogMetadataValue::where('metadata_id',5)->orderBy('metadata_key', 'asc')->groupBy('metadata_key')->get();
                return view('frontEnd.author', $arr);
                break;
            case 'views':
                $arr['data'] = \App\Models\CatalogMetadataValue::where('metadata_id',6)->orderBy('metadata_key', 'asc')->groupBy('metadata_key')->get();
                return view('frontEnd.views', $arr);
                break;
            case 'download':
                $arr['data'] = \App\Models\CatalogMetadataValue::inRandomOrder()->where('metadata_id',7)->orderBy('metadata_key', 'asc')->groupBy('metadata_key')->limit(10)->get();
                return view('frontEnd.download', $arr);
                break;
        }
    }
}
