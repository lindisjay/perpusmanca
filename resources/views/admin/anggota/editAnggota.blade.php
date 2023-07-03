@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4"></h5>
                    <div class="card mb-0">
                        <div class="card-body p-4">
                            <form action="{{ route('anggota.update', [$anggota->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <fieldset>
                                    <legend>Ubah Data Anggota</legend>
                                    <div class="form-group row">
                                        <div class="col-md-5">
                                            <label for="addid">No</label>
                                            <input class="form-control" type="text" name="addid"
                                                value="{{ $anggota->id }}" readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addnama">Nama Anggota</label>
                                            <input id="addnama" type="text" name="addnama" class="form-control"
                                                value="{{ $anggota->nama }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addkelas">Kelas</label>
                                            <input id="addkelas" type="text" name="addkelas" class="form-control"
                                                value="{{ $anggota->kelas }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addjenis_kelamin">Jenis Kelamin</label>
                                            <input id="addjenis_kelamin" type="text" name="addjenis_kelamin"
                                                class="form-control" value="{{ $anggota->jenis_kelamin }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addno_hp">No Hp</label>
                                            <input id="addno_hp" type="text" name="addno_hp" class="form-control"
                                                value="{{ $anggota->no_hp }}">
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="card-body p-4">
                                    <div class="col-md-10">
                                        <input type="submit" class="btn btn-success btn-send" value="Update">
                                        <a href="{{ route('anggota.index') }}"><input type="Button"
                                                class="btn btn-primary btn-send" value="Kembali"></a>
                                    </div>
                                    <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
