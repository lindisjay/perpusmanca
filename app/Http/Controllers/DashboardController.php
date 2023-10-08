<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Buku;
use App\User;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // if (Auth::user()->hasRole('admin')) {
        //     // Query data untuk admin
        //     $jumlah_pinjam = Transaksi::select(DB::raw("CAST(SUM(qty_pinjam) as int) as jumlah_pinjam"))
        //         ->GroupBy(DB::raw("Month(created_at)"))
        //         ->pluck('jumlah_pinjam');
        // } else {
        //     // Query data untuk user biasa
        //     $user_id = Auth::id(); // ID pengguna yang login
        //     $jumlah_pinjam = Transaksi::where('user_id', $user_id)
        //         ->select(DB::raw("CAST(SUM(qty_pinjam) as int) as jumlah_pinjam"))
        //         ->GroupBy(DB::raw("Month(created_at)"))
        //         ->pluck('jumlah_pinjam');
        // }

        // $bulan = Transaksi::select(DB::raw("MONTHNAME(created_at) as bulan"))
        //     ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        //     ->pluck('bulan');

        // $user = User::count();
        // $buku = Buku::count();
        // $transaksi = Transaksi::count();

        // return view('dashboard.dashboard', compact('jumlah_pinjam', 'bulan', 'user', 'buku', 'transaksi'));

        // $jumlah_pinjam = Transaksi::select(DB::raw("CAST(SUM(qty_pinjam) as int) as jumlah_pinjam"))
        //     ->GroupBy(DB::raw("Month(created_at)"))
        //     ->pluck('jumlah_pinjam');

        // $bulan = Transaksi::select(DB::raw("MONTHNAME(created_at) as bulan"))
        //     ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        //     ->pluck('bulan');

        // $user = User::count();
        // $buku = Buku::count();
        // $transaksi = Transaksi::count();

        // return view('dashboard.dashboard', compact('jumlah_pinjam', 'bulan', 'user', 'buku', 'transaksi'));
    }
}
