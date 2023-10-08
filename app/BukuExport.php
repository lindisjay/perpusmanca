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
            'Kode Buku',
            'Tahun Masuk',
            'Judul',
            'Pengarang',
            'Penerbit',
            'Kategori',
            'Rak',
            'Stok',
            'Harga',
            'Image'
        ];
    }
}
