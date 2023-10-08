<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\User;
use App\Buku;
use PDF;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\TransaksiExport;
use App\UsersExport;
use App\BukuExport;

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
        $format = $request->get('cetak'); // Menambahkan pemilihan format cetak

        if ($request->laporan == 'transaksi') {
            // Mengubah tanggal akhir untuk mencakup tanggal 30 dan 31
            $tglakhir = date('Y-m-d', strtotime($tglakhir . ' +2 days'));

            $trs = DB::table('peminjaman')
                ->whereBetween('created_at', [$tglawal, $tglakhir])
                ->orderBy('created_at', 'ASC')
                ->get();

            if ($format == 'pdf') {
                $pdf = PDF::loadView('admin.laporan.peminjaman_pdf', ['transaksi' => $trs])->setPaper('A4', 'landscape');
                return $pdf->stream();
            } elseif ($format == 'excel') {
                return Excel::download(new TransaksiExport($tglawal, $tglakhir), 'laporan_transaksi.xlsx');
            }

        } elseif ($request->laporan == 'user') {
            $users = DB::table('users')
                -> select('id', 'name', 'kelas', 'jenis_kelamin', 'no_hp')
                -> get();

            if ($format == 'pdf') {
                $pdf = PDF::loadView('admin.laporan.anggotapdf', ['users' => $users])->setPaper('A4', 'landscape');
                return $pdf->stream();
            } elseif ($format == 'excel') {
                return Excel::download(new UsersExport($users), 'laporan_anggota.xlsx');
            }

        } elseif ($request->laporan == 'buku') {
            $buku = DB::table('buku')
                -> get();

            if ($format == 'pdf') {
                $pdf = PDF::loadView('admin.laporan.bukupdf', ['buku' => $buku])->setPaper('A4', 'landscape');
                return $pdf->stream();
            } elseif ($format == 'excel') {
                return Excel::download(new BukuExport(), 'laporan_buku.xlsx');
            }
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
