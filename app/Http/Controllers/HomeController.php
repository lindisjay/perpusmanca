<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Buku;
use App\Anggota;
use App\Transaksi;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::count();
        $anggota = Anggota::count();
        $buku = Buku::count();
        $transaksi = Transaksi::count();

        if (Auth::user()->hasRole('admin')) {
            // Query data untuk admin
            $data = Transaksi::select(DB::raw("Month(created_at) as bulan"), DB::raw("COUNT(*) as jumlah_transaksi"))
                ->groupBy(DB::raw("Month(created_at)"))
                ->orderBy(DB::raw("Month(created_at)"))
                ->get();
        } else {
            // Query data untuk user biasa
            $user_id = Auth::id(); // ID pengguna yang login
            $data = Transaksi::where('user_id', $user_id)
                ->select(DB::raw("Month(created_at) as bulan"), DB::raw("COUNT(*) as jumlah_transaksi"))
                ->groupBy(DB::raw("Month(created_at)"))
                ->orderBy(DB::raw("Month(created_at)"))
                ->get();
        }

        $bulan = $data->pluck('bulan');
        $jumlah_transaksi = $data->pluck('jumlah_transaksi');

        $bukuList = Buku::all(); // Mengambil seluruh data buku

        return view('dashboard.dashboard', compact('user', 'anggota', 'buku', 'transaksi', 'jumlah_transaksi', 'bulan', 'bukuList'));
    }


    // public function grafik()
    // {
    //     $jumlah_pinjam = Transaksi::select(DB::raw("CAST(SUM(qty_pinjam) as int) as jumlah_pinjam"))
    //         ->GroupBy(DB::raw("Month(created_at)"))
    //         ->pluck('jumlah_pinjam');

    //     $bulan = Transaksi::select(DB::raw("MONTHNAME(created_at) as bulan"))
    //         ->GroupBy(DB::raw("MONTHNAME(created_at)"))
    //         ->pluck('bulan');

    //     $user = User::count();
    //     $buku = Buku::count();
    //     $transaksi = Transaksi::count();

    //     return view('dashboard.dashboard', compact('jumlah_pinjam', 'bulan', 'user', 'buku', 'transaksi'));
    // }
}
