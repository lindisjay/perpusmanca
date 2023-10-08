<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class KatalogController extends Controller
{
    public function index()
    {
        $buku=\App\Buku::All();

        return view('admin.buku.katalog', compact('buku'));
    }

    public function store(Request $request)
    {
        $data = [
            'kd_buku' => $request->input('addkd_buku'),
            // 'image' => $request->input('addimage'),
            'thn_masuk' => $request->input('addthn_masuk'),
            'judul' => $request->input('addjudul'),
            'penulis' => $request->input('addpenulis'),
            'penerbit' => $request->input('addpenerbit'),
            'kategori' => $request->input('addkategori'),
            'rak' => $request->input('addrak'),
            'stok' => $request->input('addstok'),
            'harga' => $request->input('addharga'),
        ];

        if ($request->hasFile('addimage')) {
            $image = $request->file('addimage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public', $imageName); // Simpan gambar di direktori 'storage/app/public/img'
            $data['image'] = $imageName; // Simpan nama file gambar ke dalam kolom 'image' di tabel buku
        }

        // dd($request->all());

        $tambah_buku = new \App\Buku;
        $tambah_buku->fill($data); // Mengisi atribut model dengan data dari array $data
        $tambah_buku->save();

        Alert::success('Pesan', 'Data berhasil disimpan');
        return redirect('/buku');
    }

    public function update(Request $request, $kd_buku)
    {
        $buku = \App\Buku::findOrFail($kd_buku);

        // Mengisi atribut model dengan data dari request
        $buku->kd_buku = $request->get('addkd_buku');
        $buku->thn_masuk = $request->get('addthn_masuk');
        $buku->judul = $request->get('addjudul');
        $buku->penulis = $request->get('addpenulis');
        $buku->penerbit = $request->get('addpenerbit');
        $buku->kategori = $request->get('addkategori');
        $buku->rak = $request->get('addrak');
        $buku->stok = $request->get('addstok');
        $buku->harga = $request->get('addharga');

        if ($request->hasFile('addimage')) {
            // Validasi bahwa file yang diunggah adalah gambar
            $request->validate([
                'addimage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $image = $request->file('addimage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public', $imageName); // Simpan gambar baru di direktori 'public/img' menggunakan custom_disk

            // Hapus gambar lama jika ada
            if ($buku->image) {
                Storage::disk('public')->delete($buku->image);
            }

            // Update nama gambar baru ke dalam model
            $buku->image = $imageName;
        }

        $buku->save();
        return redirect()->route('buku.index');
    }

}
