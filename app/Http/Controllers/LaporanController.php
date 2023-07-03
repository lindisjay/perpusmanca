<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Transaksi;
use Anggota;
use Buku;
use PDF;
use DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.laporan.laporan');
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
    public function show(Request $request)
    {
        $tglawal = $request->get('tglawal');
        $tglakhir = $request->get('tglakhir');

        if ($request->laporan == 'transaksi') {
            $trs = DB::table('peminjaman')
                ->whereBetween('tgl_pinjam', [$tglawal, $tglakhir])
                ->orderBy('tgl_pinjam', 'ASC')
                ->get();

            $pdf = PDF::loadView('admin.laporan.peminjaman_pdf', ['transaksi' => $trs])->setPaper('A4', 'landscape');
            return $pdf->stream();
        } elseif ($request->laporan == 'anggota') {
            $agt = DB::table('anggota')
                ->get();

            $pdf = PDF::loadView('admin.laporan.anggotapdf', ['anggota' => $agt])->setPaper('A4', 'landscape');
            return $pdf->stream();
        } elseif ($request->laporan == 'buku') {
            $bku = DB::table('buku')
                ->get();

            $pdf = PDF::loadView('admin.laporan.bukupdf', ['buku' => $bku])->setPaper('A4', 'landscape');
            return $pdf->stream();
        } else {
            // Tindakan yang akan diambil jika jenis tidak valid
            return redirect()->back()->with('error', 'Jenis laporan tidak valid.');
        }

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
