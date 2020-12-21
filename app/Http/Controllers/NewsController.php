<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::table('news')->get();
        $title = "Data Berita";
        return view('news.index', ['title'=>$title, 'news'=>$news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $news = DB::table('news')->get();
    $id_news = $news->id_news;
         //validasi data
    $validator = Validator::make(request()->all(),[

        'id_news'=>'required',
        'judul'=>'required',
        'deskripsi'=>'required',
        'img'=>'image|mimes:jpg,jpeg,png,gif|max:2048',

     ],[
         'id_news.required'=>'Berita Wajib untuk diisi',
         'judul.required'=>'Judul Wajib untuk diisi',
         'deskripsi.required'=>'Deskripsi Wajib untuk dipilih',
         'img.image'=>'Ektensi File Foto Keterangan Hanya Boleh .jpg, .png, .gif',
         'img.max' =>'File Foto Melebihi 5048 KB',
         
     ])->validate();

    //2. proses upload,dicek pas input ada upload file/tidak

        if(!empty($request->img)){

            $request->validate([
                'img' => 'image|mimes:jpg,jpeg,png,giff|max:5048',
            ]);
            $image = $request->judul.'.jpg';
            $request->img->move(public_path('news/'), $fileName);
            }else{
            $image = '';
            }

    //1. tangkap request form
    DB::table('news')->insert(
        [
            'id_news'=>$request->id_news,
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'img'=>$request->image,
            
        ]
    );
    return view('news.index',compact('data', 'news', 'id_news'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = DB::table('news')->get();
        $id_news = $news->id_news;
        $data = DB::table('news')->where('id_news',$id)->get();
        return view('news.edit',compact('data', 'news', 'id_news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = DB::table('news')->get();
        $id_news = $news->id_news;
        $validator = Validator::make(request()->all(),[

            'id_news'=>'required',
            'judul'=>'required',
            'deskripsi'=>'required',
            'img'=>'image|mimes:jpg,jpeg,png,gif|max:2048',
    
         ],[
             'id_news.required'=>'Berita Wajib untuk diisi',
             'judul.required'=>'Judul Wajib untuk diisi',
             'deskripsi.required'=>'Deskripsi Wajib untuk dipilih',
             'img.image'=>'Ektensi File Foto Keterangan Hanya Boleh .jpg, .png, .gif',
             'img.max' =>'File Foto Melebihi 5048 KB',
             
         ])->validate();
    
        //2. proses upload,dicek pas input ada upload file/tidak
    
            if(!empty($request->img)){
    
                $request->validate([
                    'img' => 'image|mimes:jpg,jpeg,png,giff|max:5048',
                ]);
                $image = $request->judul.'.jpg';
                $request->img->move(public_path('news/'), $fileName);
                }else{
                $image = '';
                }
    
        //1. tangkap request form
        DB::table('news')->insert(
            [
                'id_news'=>$request->id_news,
                'judul'=>$request->judul,
                'deskripsi'=>$request->deskripsi,
                'img'=>$request->image,
                
            ]
        );
        return view('news.index'.'/'.$id)->with('id_news', $id_news)->with('news', $news);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = DB::table('news')->select('img')->where('id','=',$id)->get();
        foreach($img as $ket){
            $namaFile = $ket->img;
        }
        File::delete(public_path('news/'.$namaFile));

       //1. hapus data
       DB::table('news')->where('id',$id)->delete();
       return redirect('news.index');
    }
}
