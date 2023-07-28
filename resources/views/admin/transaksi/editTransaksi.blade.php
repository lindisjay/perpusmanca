@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card m-4">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4"></h5>
                    <div class="card mb-0">
                        <div class="card-body p-4">
                            <form action="{{ route('transaksi.update', [$transaksi->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <fieldset>
                                    <legend>Ubah Data Peminjaman</legend>
                                    <div class="form-group row">
                                        <div class="col-md-5">
                                            <label for="addid" class="m-1">No</label>
                                            <input class="form-control" type="text" name="addid"
                                                value="{{ $transaksi->id }}" readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addname" class="m-1">Nama</label>
                                            <input class="form-control" type="text" name="addname"
                                                value="{{ $transaksi->name }}" >
                                        </div>
                                        <div class="col-md-5">
                                            @role('admin')
                                            <label for="addkelas" class="m-1">Kelas</label>
                                            <input id="addkelas" type="text" name="addkelas" class="form-control"
                                                value="{{ $transaksi->kelas }}">
                                        </div>
                                        {{-- <div class="col-md-5">
                                            <label for="addtgl_pinjam">Tanggal Pinjam</label>
                                            <input id="addtgl_pinjam" type="text" name="addtgl_pinjam" class="form-control"
                                                value="{{ $transaksi->tgl_pinjam }}">
                                        </div> --}}
                                        <div class="col-md-5">
                                            <label for="addtgl_kembali" class="m-1">Tanggal Kembali</label>
                                            <input id="addtgl_kembali" type="text" name="addtgl_kembali" class="form-control"
                                                value="{{ $transaksi->tgl_kembali }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addkd_buku" class="m-1">Kode Buku</label>
                                            <input id="addkd_buku" type="text" name="addkd_buku" class="form-control"
                                                value="{{ $transaksi->kd_buku }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addjudul_buku" class="m-1">Judul</label>
                                            <input id="addjudul_buku" type="text" name="addjudul_buku" class="form-control"
                                                value="{{ $transaksi->judul_buku }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addqty_pinjam" class="m-1">QTY</label>
                                            <input id="addqty_pinjam" type="number" name="addqty_pinjam" class="form-control"
                                                value="{{ $transaksi->qty_pinjam }}">
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="status" class="m-1">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="dipinjam" @if($transaksi->status === 'dipinjam') selected @endif>Dipinjam</option>
                                                <option value="kembali" @if($transaksi->status === 'kembali') selected @endif>Kembali</option>
                                            </select>
                                        </div>
                                        @endrole
                                    </div>
                                </fieldset>

                                    <div class="card-body p-4">
                                        <hr>
                                        <div class="col-md-10">
                                            <input type="submit" class="btn btn-success btn-send" value="Update">
                                            <a href="{{ route('transaksi.index') }}"><input type="Button"
                                                    class="btn btn-primary btn-send" value="Kembali"></a>
                                        </div>

                            </form>
                        @endsection
