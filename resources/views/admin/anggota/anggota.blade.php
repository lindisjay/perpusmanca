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
                                <h1 class="h3 mb-0 text-gray-800">Anggota</h1>
                            </div>
                            <hr>
                            <div class="card-header py-3" align="right">
                                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                    data-toggle="modal" data-target="#exampleModalScrollable">
                                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                                </button>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myDataTable" width="100%" cellspacing="0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>No Hp</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($anggota as $agt)
                                                    <tr>
                                                        <td>{{ $agt->id }}</td>
                                                        <td>{{ $agt->nama }}</td>
                                                        <td>{{ $agt->kelas }}</td>
                                                        <td>{{ $agt->jenis_kelamin }}</td>
                                                        <td>{{ $agt->no_hp }}</td>
                                                        <td align="center">
                                                            <a
                                                                href="{{ route('anggota.edit', [$agt->id]) }}"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                                                <i class="fas fa-edit fa-sm text-white-50"></i>
                                                                Edit</a>

                                                            <a href="/anggota/hapus/{{ $agt->id }}"
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
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Anggota
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ action('AnggotaController@store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Nama</label>
                                                    <input type="text" name="addnama" id="addnama" class="form-control"
                                                        id="exampleFormControlInput1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Kelas</label>
                                                    <input type="text" name="addkelas" id="addkelas"
                                                        class="form-control" id="exampleFormControlInput1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Jenis Kelamin</label>
                                                    <input type="text" name="addjenis_kelamin" id="addjenis_kelamin"
                                                        class="form-control" id="exampleFormControlInput1">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">No Hp</label>
                                                    <input type="text" name="addno_hp" id="addno_hp"
                                                        class="form-control" id="exampleFormControlInput1">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Batal</button>
                                                <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                                            </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                        <!-- Pagination -->

                        <!-- End Pagination -->
                    </div>
                @endsection
