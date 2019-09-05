<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Artikel;
use File;
use Image;
class ArtikelController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel=Artikel::with('kategori')->orderBy('created_at','DESC')->paginate(5);
        return view('artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori=Kategori::orderBy('nama')->get();
        return view('artikel.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     private function saveFile($j,$g){
        $images=str_slug($j).time().'.'.$g->getClientOriginalExtension();
        $path=public_path('uploads');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path,0777,true,true);
    }
        Image::make($g)->save($path.'/'.$images);
        return $images;
    }



    public function store(Request $request)
    {
         $rules=[
            'judul'=>'required|max:50',
            'body'=>'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar'=>'required|mimes:jpg,jpeg,png|max:2084'
        ];
        $pesan=[
            'judul.required'=>'Judul harus diisi..!!!',
            'judul.max'=>'Judul maksimal 50 karakter..!!!',
            'body.required'=>'Body harus diisi..!!!',
            'kategori_id.required'=>'Kategori harus dipilih..!!!',
            'gambar.required'=>'Gambar harus diisi..!!!',
            'gambar.mimes'=>'Format file harus jpg,jpeg atau png..!!!',
            'gambar.max'=>'File terlalu besar..!!!'
        ];
        $this->validate($request,$rules,$pesan);
        $j=$request->judul;
        $b=$request->body;
        $k=$request->kategori_id;
        $g=$request->gambar;


        $gambar=null;
        if ($request->hasFile('gambar')) {
            $gambar=$this->saveFile($request->judul,$request->file('gambar'));
        }
        
        $artikel=Artikel::Create([
            'judul'=> $j,
            'body'=> $b,
            'kategori_id'=> $k,
            'gambar'=> $gambar
        ]);
        return redirect(route('artikel.index'))->with('tambah','Artikel : '.$artikel->judul.' berhasil ditambahkan');
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
        //   if (Auth::user()->role=='pencatat') {
        //     return redirect('home');
        // }
         $artikel= Artikel::findOrFail($id);
         $kategori=Kategori::orderBy('nama')->get();
         return view('artikel.edit',compact('artikel','kategori'));
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
         $rules =[
            'judul'=>'required|max:50',
            'body'=>'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar'=>'required|mimes:jpg,jpeg,png|max:2084'
        ];
        $pesan=[
            'judul.required'=>'Judul harus diisi..!!!',
            'judul.max'=>'Judul maksimal 50 karakter..!!!',
            'body.required'=>'Body harus diisi..!!!',
            'kategori_id.required'=>'Kategori harus dipilih..!!!',
            'gambar.required'=>'Gambar harus diisi..!!!',
            'gambar.mimes'=>'Format file harus jpg,jpeg atau png..!!!',
            'gambar.max'=>'File terlalu besar..!!!'
        ];


        $this->validate($request,$rules,$pesan);
        $j=$request->judul;
        $b=$request->body;
        $k=$request->kategori_id;
        $g=$request->gambar;

        $artikel= Artikel::findOrFail($id);   
        $gambar=$artikel->gambar;

        if ($request->hasFile('gambar')) {
            !empty($gambar) ? File::delete(public_path('uploads/'.$gambar)):null;
            $gambar=$this->saveFile($request->judul,$request->file('gambar'));
        }
        
        Artikel::find($id)->update([
           'judul'=> $j,
            'body'=> $b,
            'kategori_id'=> $k,
            'gambar'=> $gambar
        ]);
        return redirect(route('artikel.index'))->with('edit','Artikel berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          //query select data berdasarkan id
        $artikel= Artikel::findOrFail($id);
        //mengecek jika filed photo tidak kosogn
        if (!empty($artikel->gambar)) {
            //hapus file dari folder
            File::delete(public_path('uploads/'.$artikel->gambar));
        }
        //hapus data dari table
        $artikel->delete();
        return redirect(route('artikel.index'))->with('delete','Artikel : '.$artikel->judul.' berhasil dihapus');
    }
}
