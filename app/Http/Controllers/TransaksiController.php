<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;
use App\Buku;
use App\Transaksi;
use App\User;
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
        $user=\App\User::All();
        $buku=\App\Buku::All();
        $transaksi=\App\Transaksi::All();
        return view('admin.transaksi.transaksi', [
            'user' => $user,
            'buku' =>$buku,
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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

        $tambah_transaksi = new Transaksi();

        if (Auth::user()->hasRole('admin')) {
            $tambah_transaksi->user_id = auth()->id();
        } else {
            $tambah_transaksi->user_id = Auth::user()->id;
        }

        $tambah_transaksi->name=$request->input('addname');
        $tambah_transaksi->kelas=$request->input('addkelas');
        $tambah_transaksi->created_at = $request->input('addcreated_at');
        $tambah_transaksi->tgl_kembali = $request->input('addtgl_kembali');
        $tambah_transaksi->kd_buku = $request->input('addkd_buku');
        $tambah_transaksi->judul_buku = $request->input('addjudul_buku');
        $tambah_transaksi->qty_pinjam = $request->input('addqty_pinjam');
        $tambah_transaksi->status = $validatedData['status'];
        $tambah_transaksi->save();

        Alert::success('Pesan', 'Data berhasil disimpan');
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
        $user = User::all();
        return view('admin.transaksi.editTransaksi', compact('transaksi', 'buku', 'user'));
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
        $transaksi->name = $request ->get ('addname');
        $transaksi->kelas = $request ->get ('addkelas');
        $transaksi->created_at = $request ->get ('addcreated_at');
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
