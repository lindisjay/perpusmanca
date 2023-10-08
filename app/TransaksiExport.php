<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings
{
    protected $tglawal;
    protected $tglakhir;

    public function __construct($tglawal, $tglakhir)
    {
        $this->tglawal = $tglawal;
        $this->tglakhir = $tglakhir;
    }

    public function collection()
    {
        return Transaksi::whereBetween('created_at', [$this->tglawal, $this->tglakhir])
            ->orderBy('created_at', 'ASC')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'id',
            'Nama',
            'Kelas',
            'Tanggal Pinjam',
            'Tanggal Kembali',
            'Kode Buku',
            'Judul Buku',
            'Qty Pinjam',
            'status'
        ];
    }
}
