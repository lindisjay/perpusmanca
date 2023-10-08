@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card m-4">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4"></h5>
                    <div class="card mb-0">
                        <div class="card-body p-4">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">User / Anggota</h1>
                            </div>
                            <hr>
                            {{-- <div class="card-header py-3" align="right">
                                <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                    data-toggle="modal" data-target="#exampleModalScrollable">
                                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                                </button>
                            </div> --}}
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myDataTable" width="100%" cellspacing="0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Kelas</th>
                                                    <th>Email</th>
                                                    <th>Roles</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>No Hp</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($user as $agt)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $agt->name }}</td>
                                                        <td>{{ $agt->kelas }}</td>
                                                        <td>{{ $agt->email }}</td>
                                                        <td>
                                                            @foreach ($agt->getRoleNames() as $role)
                                                                @if ($role === 'admin')
                                                                    1
                                                                @elseif($role === 'user')
                                                                    2
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>{{ $agt->jenis_kelamin }}</td>
                                                        <td>{{ $agt->no_hp }}</td>
                                                        <td align="center">
                                                            <a
                                                                href="{{ route('user.edit', [$agt->id]) }}"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                                                <i class="fas fa-edit fa-sm text-white-50"></i>
                                                                </a>

                                                            <a href="/user/hapus/{{ $agt->id }}"
                                                                onclick="return confirm('Yakin Ingin menghapus data?')"
                                                                class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                                                <i class="fas fa-trash-alt fa-sm text-white-50"></i>
                                                                </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                @endsection
