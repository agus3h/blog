<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Artikel;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori=Kategori::all();
        $artikel=Artikel::with('kategori')->latest()->take(2)->get();
        $artikelall=Artikel::with('kategori')->latest()->get();
        $artikelread=Artikel::with('kategori')->latest()->take(5)->get();
        return view('welcome',compact('kategori','artikel','artikelall','artikelread'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $arti)
    {
        $artikel_detail=$arti;
         $kategori=Kategori::withCount('artikel')->get();
         $artikel=Artikel::with('kategori')->latest()->take(3)->get();
        return view('detail',compact('artikel_detail','kategori','artikel'));
    }

     public function kategori(Kategori $kate)
    {
        $kategori=Kategori::all();
        $artikel=Artikel::with('kategori')->latest()->take(2)->get();
        $artikelall=$kate->artikel()->get();
        $artikelread=Artikel::with('kategori')->latest()->take(5)->get();
        return view('welcome',compact('artikel','kategori','artikelall','artikelread'));
    }

    public function about(){
        $kategori=Kategori::all();
        return view('about',compact('kategori'));
    }

    public function contact(){
        $kategori=Kategori::all();
        return view('contact',compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
