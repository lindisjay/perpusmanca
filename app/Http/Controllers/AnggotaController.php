<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=\App\User::All();
        return view('admin.anggota.anggota',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.anggota.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambah_anggota=new \App\User;
        $tambah_anggota->id = $request->addid;
        $tambah_anggota->name = $request->addnama;
        $tambah_anggota->kelas = $request->addkelas;
        $tambah_anggota->email = $request->addemail;
        $tambah_anggota->roles_id = $request->addroles_id;
        $tambah_anggota->jenis_kelamin = $request->addjenis_kelamin;
        $tambah_anggota->no_hp = $request->addno_hp;
        $tambah_anggota->save();
        Alert::success('Pesan ','Data berhasil disimpan');
        return redirect('/user');
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
        $anggota_edit=\App\Anggota::findOrFail($id);
        return view('admin.anggota.editAnggota',['anggota'=>$anggota_edit]);
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
        $anggota=\App\Anggota::findOrFail($id);
        $anggota->id=$request->get('addid');
        $anggota->nama=$request->get('addnama');
        $anggota->kelas=$request->get('addkelas');
        $anggota->jenis_kelamin=$request->get('addjenis_kelamin');
        $anggota->no_hp=$request->get('addno_hp');
        $anggota->save();
        return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota=\App\Anggota::findOrFail($id);
        $anggota->delete();
        Alert::success('Pesan ','Data berhasil dihapus');
        return redirect()->route('anggota.index');
    }
}
