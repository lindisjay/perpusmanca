@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4"></h5>
                    <div class="card mb-0">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="cardheader">Laporan Transaksi</div>
                    <div class="card-body">
                        <form action="/laporan/transaksi" method="PUT" target="_blank">
                            @csrf
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="no_hp">Tanggal Awal</label>
                                        <input id="tglawal" type="date" name="tglawal" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="no_hp">Tanggal Akhir</label>
                                        <input id="tglakhir" type="date" name="tglakhir" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-10">
                                    <input type="submit" class="btn btn-success btnsend" value="Cetak">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="cardheader">Laporan Anggota</div>
                    <div class="card-body">
                        <form action="/laporan/anggota" method="PUT" target="_blank">
                            @csrf
                            <fieldset>
                                <div class="col-md-10">
                                    <input type="submit" class="btn btn-success btnsend" value="Cetak">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="cardheader">Laporan Buku</div>
                    <div class="card-body">
                        <form action="/laporan/buku" method="PUT" target="_blank">
                            @csrf
                            <fieldset>
                                <div class="col-md-10">
                                    <input type="submit" class="btn btn-success btnsend" value="Cetak">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
