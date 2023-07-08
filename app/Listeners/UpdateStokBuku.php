<?php

namespace App\Listeners;

use App\Events\TransaksiUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Buku;

class UpdateStokBuku
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TransaksiUpdated  $event
     * @return void
     */
    public function handle(TransaksiUpdated $event)
    {
        $transaksi = $event->transaksi;

        // Periksa jika status transaksi adalah "dipinjam"
        if ($transaksi->status === 'dipinjam') {
            $buku = Buku::where('kd_buku', $transaksi->kd_buku)->first();

            if ($buku) {
                $buku->stok -= $transaksi->qty_pinjam;
                $buku->save();
            }
        }

        // Periksa jika status transaksi adalah "kembali"
        if ($transaksi->status === 'kembali') {
            $buku = Buku::where('kd_buku', $transaksi->kd_buku)->first();

            if ($buku) {
                $buku->stok += $transaksi->qty_pinjam;
                $buku->save();
            }
        }
    }
}
