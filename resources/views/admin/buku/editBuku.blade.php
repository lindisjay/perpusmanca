@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4"></h5>
                    <div class="card mb-0">
                        <div class="card-body p-4">
                            <form action="{{ route('buku.update', [$buku->kd_buku]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <fieldset>
                                    <legend>Ubah Data Buku</legend>
                                    <div class="form-group row">
                                        <div class="col-md-5">
                                            <label for="addkd_buku">Kode Buku</label>
                                            <input class="form-control" type="text" name="addkd_buku"
                                                value="{{ $buku->kd_buku }}" readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addjudul">Judul</label>
                                            <input id="addjudul" type="text" name="addjudul" class="form-control"
                                                value="{{ $buku->judul }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addpenulis">Penulis</label>
                                            <input id="addpenulis" type="text" name="addpenulis" class="form-control"
                                                value="{{ $buku->penulis }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addpenerbit">Penerbit</label>
                                            <input id="addaddpenerbit" type="text" name="addpenerbit" class="form-control"
                                                value="{{ $buku->penerbit }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addkategori">Kategori</label>
                                            <input id="addkategori" type="text" name="addkategori" class="form-control"
                                                value="{{ $buku->kategori }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addrak">Rak</label>
                                            <input id="addrak" type="text" name="addrak" class="form-control"
                                                value="{{ $buku->rak }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addstok">Stok</label>
                                            <input id="addstok" type="text" name="addstok" class="form-control"
                                                value="{{ $buku->stok }}">
                                        </div>
                                    </div>
                                </fieldset>

                                    <div class="card-body p-4">
                                        <div class="col-md-10">
                                            <input type="submit" class="btn btn-success btn-send" value="Update">
                                            <a href="{{ route('buku.index') }}"><input type="Button"
                                                    class="btn btn-primary btn-send" value="Kembali"></a>
                                        </div>
                                        <hr>
                            </form>
                        @endsection

