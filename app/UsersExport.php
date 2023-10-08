<?php

namespace App;

use App\User;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings; // WithHeadings untuk menentukan judul kolom dalam file Excel
use Maatwebsite\Excel\Concerns\WithMapping; // WithMapping untuk menentukan bagaimana data dari model "User" akan dipetakan ke kolom-kolom yang diinginkan.

class UsersExport implements FromCollection, WithHeadings, WithMapping, Responsable
{
    protected $users;

    public function __construct($users)
    {
        $this->users = $users; // pada constructor class "UsersExport", kita menerima parameter $users yang akan digunakan untuk mengambil data user.
    }

    public function collection()
    {
        return $this->users;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Kelas',
            'Jenis Kelamin',
            'Nomor HP',
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->kelas,
            $user->jenis_kelamin,
            $user->no_hp,
        ];
    }

    public function toResponse($request)
    {
        return $this->sheetResponse('laporan_anggota.xlsx');
    }
}
