<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku=\App\Buku::All();
        return view('admin.buku.buku',['buku'=>$buku]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.buku.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah_buku=new \App\Buku;
        $tambah_buku->kd_buku = $request->addkd_buku;
        $tambah_buku->judul = $request->addjudul;
        $tambah_buku->penulis = $request->addpenulis;
        $tambah_buku->penerbit = $request->addpenerbit;
        $tambah_buku->kategori = $request->addkategori;
        $tambah_buku->rak = $request->addrak;
        $tambah_buku->stok = $request->addstok;
        $tambah_buku->save();
        Alert::success('Pesan ','Data berhasil disimpan');
        return redirect('/buku');
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
    public function edit($kd_buku)
    {
        $buku_edit=\App\Buku::findOrFail($kd_buku);
        return view('admin.buku.editBuku',['buku'=>$buku_edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kd_buku)
    {
        $buku=\App\Buku::findOrFail($kd_buku);
        $buku->kd_buku=$request->get('addkd_buku');
        $buku->judul=$request->get('addjudul');
        $buku->penulis=$request->get('addpenulis');
        $buku->penerbit=$request->get('addpenerbit');
        $buku->kategori=$request->get('addkategori');
        $buku->rak=$request->get('addrak');
        $buku->stok=$request->get('addstok');
        $buku->save();
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_buku)
    {
        $buku=\App\Buku::findOrFail($kd_buku);
        $buku->delete();
        Alert::success('Pesan ','Data berhasil dihapus');
        return redirect()->route('buku.index');
    }
}
