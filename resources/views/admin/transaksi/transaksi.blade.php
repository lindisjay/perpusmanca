@extends('layouts.layout')
@section('content')
    @role('admin')
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4"></h5>
                    <div class="card mb-0">
                        <div class="card-body p-4">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
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
                                        <table class="table table-bordered table-striped " id="myDataTable" width="100%"
                                            cellspacing="0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                    <th>Tanggal Pinjam</th>
                                                    <th>Tanggal Kembali</th>
                                                    <th>Kode Buku</th>
                                                    <th>Judul</th>
                                                    <th>QTY</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transaksi as $trs)
                                                    <tr>
                                                        <td>{{ $trs->id }}</td>
                                                        <td>{{ $trs->nama }}</td>
                                                        <td>{{ $trs->kelas }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($trs->created_at)->format('Y-m-d') }}</td>
                                                        <td>{{ $trs->tgl_kembali }}</td>
                                                        <td>{{ $trs->kd_buku }}</td>
                                                        <td>{{ $trs->judul_buku }}</td>
                                                        <td>{{ $trs->qty_pinjam }}</td>
                                                        <td>{{ $trs->status }}</td>
                                                        <td align="center">
                                                            <a href="{{ route('transaksi.edit', [$trs->id]) }}"
                                                                class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                                                <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>

                                                            <a href="/transaksi/hapus/{{ $trs->id }}"
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
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ action('TransaksiController@store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="addnama">Nama</label>
                                                    <input type="text" name="addnama" id="addnama" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="addkelas">Kelas</label>
                                                    <input type="text" name="addkelas" id="addkelas" class="form-control">
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label for="addtgl_pinjam">Tanggal Pinjam</label>
                                                    <input type="date" name="addtgl_pinjam" id="addtgl_pinjam"
                                                        class="form-control">
                                                </div> --}}
                                                <div class="form-group">
                                                    <label for="addtgl_kembali">Tanggal Kembali</label>
                                                    <input type="date" name="addtgl_kembali" id="addtgl_kembali"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="addkd_buku" class="col-form-label">Kode</label>
                                                    <select name="addkd_buku" id="addkd_buku" class="form-control" required>
                                                        <option disabled selected> --Pilih--</option>
                                                        @foreach ($buku as $item)
                                                            @if ($item != null)
                                                                <option value="{{ $item->kd_buku }}">{{ $item->kd_buku }} -
                                                                    {{ $item->judul }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="addjudul_buku" class="col-form-label">Judul</label>
                                                    <select name="addjudul_buku" id="addjudul_buku" class="form-control"
                                                        required>
                                                        <option disabled selected> --Pilih--</option>
                                                        @foreach ($buku as $item)
                                                            @if ($item != null)
                                                                <option value="{{ $item->judul }}">{{ $item->judul }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="addqty_pinjam">QTY</label>
                                                    <input type="number" name="addqty_pinjam" id="addqty_pinjam"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="dipinjam">Dipinjam</option>
                                                        <option value="kembali">Kembali</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole

    <div class="container-fluid" @role('admin') style="display: none;"@endrole>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4"></h5>
                <div class="card mb-0">
                    <div class="card-body p-4">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
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
                                    <table class="table table-bordered table-striped " id="myDataTable" width="100%"
                                        cellspacing="0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Tanggal Pinjam</th>
                                                <th>Tanggal Kembali</th>
                                                <th>Kode Buku</th>
                                                <th>Judul</th>
                                                <th>QTY</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksi->where('id', auth()->id())->where('role', 'user') as $trs)
                                                <tr>
                                                    <td>{{ $trs->id }}</td>
                                                    <td>{{ $trs->nama }}</td>
                                                    <td>{{ $trs->kelas }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($trs->created_at)->format('Y-m-d') }}</td>
                                                    <td>{{ $trs->tgl_kembali }}</td>
                                                    <td>{{ $trs->kd_buku }}</td>
                                                    <td>{{ $trs->judul_buku }}</td>
                                                    <td>{{ $trs->qty_pinjam }}</td>
                                                    <td>{{ $trs->status }}</td>
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
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ action('TransaksiController@store') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="addnama">Nama</label>
                                                <input type="text" name="addnama" id="addnama" class="form-control"
                                                    value="{{ Auth::user()->name }}" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="addkelas">Kelas</label>
                                                <input type="text" name="addkelas" id="addkelas"
                                                    class="form-control" value="{{ Auth::user()->kelas }}"
                                                    readonly>
                                            </div>

                                            {{-- <div class="form-group">
                                                <label for="addtgl_pinjam">Tanggal Pinjam</label>
                                                <input type="date" name="addtgl_pinjam" id="addtgl_pinjam"
                                                    class="form-control">
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="addtgl_kembali">Tanggal Kembali</label>
                                                <input type="date" name="addtgl_kembali" id="addtgl_kembali"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="addkd_buku" class="col-form-label">Kode</label>
                                                <select name="addkd_buku" id="addkd_buku" class="form-control" required>
                                                    <option disabled selected> --Pilih--</option>
                                                    @foreach ($buku as $item)
                                                        @if ($item != null)
                                                            <option value="{{ $item->kd_buku }}">{{ $item->kd_buku }} -
                                                                {{ $item->judul }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="addjudul_buku" class="col-form-label">Judul</label>
                                                <select name="addjudul_buku" id="addjudul_buku" class="form-control"
                                                    required>
                                                    <option disabled selected> --Pilih--</option>
                                                    @foreach ($buku as $item)
                                                        @if ($item != null)
                                                            <option value="{{ $item->judul }}">{{ $item->judul }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="addqty_pinjam">QTY</label>
                                                <input type="number" name="addqty_pinjam" id="addqty_pinjam"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="dipinjam">Dipinjam</option>
                                                    <option value="kembali">Kembali</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
