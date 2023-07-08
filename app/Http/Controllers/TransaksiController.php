<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Anggota;
use App\Transaksi;
use Alert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota=\App\Anggota::All();
        $buku=\App\Buku::All();
        $transaksi=\App\Transaksi::All();
        return view('admin.transaksi.transaksi', [
            'anggota' => $anggota,
            'buku' =>$buku,
            'transaksi' => $transaksi
        ]);
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
        $validatedData = $request->validate([
            'status' => 'required|in:dipinjam,kembali',
        ]);

        $tambah_transaksi=new \App\Transaksi;
        $tambah_transaksi->id = $request->addid;
        $tambah_transaksi->nama = $request->addnama;
        $tambah_transaksi->kelas = $request->addkelas;
        $tambah_transaksi->tgl_pinjam = $request->addtgl_pinjam;
        $tambah_transaksi->tgl_kembali = $request->addtgl_kembali;
        $tambah_transaksi->kd_buku = $request->addkd_buku;
        $tambah_transaksi->judul_buku = $request->addjudul_buku;
        $tambah_transaksi->qty_pinjam = $request->addqty_pinjam;
        $tambah_transaksi->status = $validatedData['status'];
        $tambah_transaksi->save();
        Alert::success('Pesan ','Data berhasil disimpan');
        return redirect('/transaksi');
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
        $transaksi = Transaksi::find($id);
        $buku = Buku::all();
        $anggota = Anggota::all();
        return view('admin.transaksi.editTransaksi', compact('transaksi', 'buku', 'anggota'));
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
        $validatedData = $request->validate([
            'status' => 'required|in:dipinjam,kembali',
        ]);

        $transaksi = Transaksi::find($id);
        $transaksi->id=$request->get('addid');
        $transaksi->nama = $request ->get ('addnama');
        $transaksi->kelas = $request ->get ('addkelas');
        $transaksi->tgl_pinjam = $request ->get ('addtgl_pinjam');
        $transaksi->tgl_kembali = $request ->get ('addtgl_kembali');
        $transaksi->kd_buku = $request ->get ('addkd_buku');
        $transaksi->judul_buku = $request ->get ('addjudul_buku');
        $transaksi->qty_pinjam = $request ->get ('addqty_pinjam');
        $transaksi->status = $validatedData['status'];
        $transaksi->save();
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = \App\Transaksi::findOrFail($id);
        $transaksi->delete();
        Alert::success('Pesan ', 'Data berhasil dihapus');
        return redirect()->route('transaksi.index');
    }
}
