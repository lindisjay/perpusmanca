<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukuExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Buku::all();
    }

    public function headings(): array
    {
        return [
            'No Induk',
            'Tanggal Datang',
            'Tahun Terbit',
            'Image',
            'Kode Buku',
            'Judul',
            'Pengarang',
            'Penerbit',
            'Kategori',
            'Sumber',
            'Stok',
            'QTY Buku Datang',
            'Harga'
        ];
    }
}
