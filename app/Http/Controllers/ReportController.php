<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        $collection = array();
        $month = array();
        for ($i=1; $i <= 12 ; $i++) { 
            // $collection['year'][$i] = \App\Models\Catalog::where('status','1')->whereMonth('created_at',$i)->count();
            $month['month'] = $i;
            $month['value'] = \App\Models\Catalog::where('status','1')->whereMonth('created_at',$i)->count();
            array_push($collection,$month);
        }

        $collection2 = array();
        $category = array();
        $cats = \App\Models\Category::all();
        foreach ($cats as $key => $value) {
            $category['label'] = $value->name;
            $category['value'] = \App\Models\Catalog::where('category_id',$value->id)->where('status','1')->count();
            array_push($collection2,$category);
        }

        return view('report.index')->with('collection',$collection)->with('collection2',$collection2);
    }
}
