@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4"></h5>
                    <div class="card mb-0">
                        <div class="card-body p-4">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Data Buku</h1>
                            </div>
                            <hr>
                            <div class="card-header py-3" align="right">
                                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                    data-toggle="modal" data-target="#exampleModalScrollable">
                                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                                </button>
                            </div>

                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-responsive" id="myDataTable"
                                            width="100%" cellspacing="0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Kode Buku</th>
                                                    <th>Judul</th>
                                                    <th>Penulis</th>
                                                    <th>Penerbit</th>
                                                    <th>Kategori</th>
                                                    <th>Rak</th>
                                                    <th>Jumlah</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($buku as $bku)
                                                    <tr>
                                                        <td>{{ $bku->kd_buku }}</td>
                                                        <td>{{ $bku->judul }}</td>
                                                        <td>{{ $bku->penulis }}</td>
                                                        <td>{{ $bku->penerbit }}</td>
                                                        <td>{{ $bku->kategori }}</td>
                                                        <td>{{ $bku->rak }}</td>
                                                        <td>{{ $bku->stok }}</td>
                                                        <td align="center">
                                                            <a
                                                                href="{{ route('buku.edit', [$bku->kd_buku]) }}"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                                                <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>

                                                            <a href="/buku/hapus/{{ $bku->kd_buku }}"
                                                                onclick="return confirm('Yakin Ingin menghapus data?')"
                                                                class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                                                <i class="fas fa-trash-alt fa-sm text-white-50"></i>
                                                                Hapus</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data Buku</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ action('BukuController@store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Kode Buku</label>
                                                    <input type="text" name="addkd_buku" id="addkd_buku"
                                                        class="form-control" maxlegth="5" id="exampleFormControlInput1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Judul</label>
                                                    <input type="text" name="addjudul" id="addjudul"
                                                        class="form-control" id="exampleFormControlInput1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Penulis</label>
                                                    <input type="text" name="addpenulis" id="addpenulis"
                                                        class="form-control" id="exampleFormControlInput1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Penerbit</label>
                                                    <input type="text" name="addpenerbit" id="addpenerbit"
                                                        class="form-control" id="exampleFormControlInput1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Kategori</label>
                                                    <input type="text" name="addkategori" id="addkategori"
                                                        class="form-control" id="exampleFormControlInput1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Rak</label>
                                                    <input type="text" name="addrak" id="addrak" class="form-control"
                                                        id="exampleFormControlInput1">
                                                </div>

                                                <div class="form-group">
                                                    <label for="addstok">Jumlah</label>
                                                    <input type="number" name="addstok" id="addstok"
                                                        class="form-control" id="exampleFormControlInput1">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Batal</button>
                                                <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        @endsection
