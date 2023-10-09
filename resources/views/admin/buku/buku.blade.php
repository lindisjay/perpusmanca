@extends('layouts.layout')
@section('content')
    @role('admin')
        <!--================================================================== BOOK PAGE =====================================================================-->
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="card m-4">
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
                                            <table class="table table-bordered table-striped" id="myDataTable">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>No. Induk</th>
                                                        <th>Tanggal Datang</th>
                                                        <th>Tahun Terbit</th>
                                                        <th>Sampul</th>
                                                        <th>Kode Buku</th>
                                                        <th>Judul</th>
                                                        <th>Penulis</th>
                                                        <th>Penerbit</th>
                                                        <th>Kategori</th>
                                                        <th>Sumber</th>
                                                        <th>Stok</th>
                                                        <th>QTY Buku Datang</th>
                                                        <th>Harga/satuan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($buku as $bku)
                                                        <tr>
                                                            <td>{{ $bku->no_induk}} </td>
                                                            <td>{{ $bku->tgl_dtg}} </td>
                                                            <td>{{ $bku->thn_masuk }}</td>
                                                            <td>
                                                                <img src="{{ asset('storage/' . $bku->image) }}" alt="..." width="30px" class="gambar">

                                                            </td>
                                                            <td>{{ $bku->kd_buku }}</td>
                                                            <td>{{ $bku->judul }}</td>
                                                            <td>{{ $bku->penulis }}</td>
                                                            <td>{{ $bku->penerbit }}</td>
                                                            <td>{{ $bku->kategori }}</td>
                                                            <td>{{ $bku->sumber }}</td>
                                                            <td>{{ $bku->stok }}</td>
                                                            <td>{{ $bku->qty_bku_dtg }}</td>
                                                            <td>Rp. {{ number_format($bku->harga) }}</td>
                                                            <td align="center">
                                                                <a
                                                                    href="{{ route('buku.edit', [$bku->kd_buku]) }}"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                                                    <i class="fas fa-edit fa-sm text-white-50"></i></a>

                                                                <a href="/buku/hapus/{{ $bku->kd_buku }}"
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
                                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data Buku</h5>
                                                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button> --}}
                                            </div>

                                            <form action="{{ action('BukuController@store') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1" class="m-1">No. Induk</label>
                                                        <input type="text" name="addno_induk" id="addno_induk"
                                                            class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1" class="m-1">Tanggal Datang</label>
                                                        <input type="date" name="addtgl_dtg" id="addtgl_dtg"
                                                            class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1" class="m-1">Tahun Terbit</label>
                                                        <input type="text" name="addthn_masuk" id="addthn_masuk"
                                                            class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="addimage" class="m-1">Sampul</label><br>
                                                        <input type="file" name="addimage" id="addimage"
                                                            class="form-control-file">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1" class="m-1">Kode Buku</label>
                                                        <input type="text" name="addkd_buku" id="addkd_buku"
                                                            class="form-control" maxlegth="5" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1" class="m-1">Judul</label>
                                                        <input type="text" name="addjudul" id="addjudul"
                                                            class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1" class="m-1">Penulis</label>
                                                        <input type="text" name="addpenulis" id="addpenulis"
                                                            class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1" class="m-1">Penerbit</label>
                                                        <input type="text" name="addpenerbit" id="addpenerbit"
                                                            class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1" class="m-1">Kategori</label>
                                                        <input type="text" name="addkategori" id="addkategori"
                                                            class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1" class="m-1">Sumber</label>
                                                        <input type="text" name="addsumber" id="addsumber"
                                                            class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="addstok" class="m-1">Stok</label>
                                                        <input type="number" name="addstok" id="addstok"
                                                            class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="addstok" class="m-1">Qty Buku Datang</label>
                                                        <input type="number" name="addqty_bku_dtg" id="addqty_bku_dtg"
                                                            class="form-control" id="exampleFormControlInput1">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="addstok" class="m-1">Harga/satuan</label>
                                                        <input type="number" name="addharga" id="addharga"
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
                            @endrole

                            <!--==================================================== KATALOG PAGE =================================================================-->

                            {{-- <div class="container-fluid" @role('admin') style="display: none;"@endrole>
                                <div class="container-fluid">
                                    <div>
                                        <br>
                                        <br>
                                        <br>
                                        <h3 class="m-3">Katalog Buku</h3>

                                        <!-- Form Pencarian & Paginasi-->
                                        <form action="{{ route('buku.index') }}" method="GET" id="search-form">
                                            <div class="input-group mb-3">
                                                <input type="text" name="keyword" id="search-input"
                                                    class="form-control" placeholder="Cari judul atau penulis...">
                                            </div>
                                        </form>

                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const searchInput = document.getElementById('search-input');
                                                const books = document.querySelectorAll('.card');

                                                searchInput.addEventListener('input', function() {
                                                    const keyword = this.value.toLowerCase();

                                                    books.forEach(function(book) {
                                                        const title = book.querySelector('.card-title').innerText.toLowerCase();
                                                        const author = book.querySelector('.card-text:nth-of-type(1)').innerText
                                                            .toLowerCase();

                                                        if (title.includes(keyword) || author.includes(keyword)) {
                                                            book.style.display = 'block';
                                                        } else {
                                                            book.style.display = 'none';
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                        <!--End Form Pencarian & Paginasi-->

                                        <div class="grid">
                                            @foreach ($buku as $bku)
                                                <div class="col-md-3 mb-2 ">
                                                    <div class="card m-2 text-center">
                                                        <img src="{{ asset('storage/' . $bku->image) }}" alt="..." width="150">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $bku->judul }}</h5>
                                                            <p class="card-text">{{ $bku->penulis }}</p>
                                                            <p class="card-text">{{ $bku->penerbit }}</p>
                                                            <p class="card-text">Stok: {{ $bku->stok }}</p>
                                                            <button class="btn btn-primary"
                                                                onclick="openModal('{{ $bku->kd_buku }}', '{{ $bku->judul }}')">Pinjam
                                                            Buku</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- Modal Transaksi -->
                                        <div class="modal fade" id="exampleModalScrollable" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalScrollableTitle"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="exampleModalScrollableTitle">Pinjam Buku</h5>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <!-- Form Transaksi -->
                                                <form action="{{ route('transaksi.store') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <!-- Input Nama (Menggunakan Auth::user() jika user sudah login) -->
                                                        <div class="form-group">
                                                            <label for="addname">Nama</label>
                                                            <input type="text" name="addname"
                                                                id="addname" class="form-control"
                                                                value="@auth {{ Auth::user()->name }} @endauth"
                                                                readonly>
                                                        </div>
                                                        <!-- Input Kelas (Menggunakan Auth::user() jika user sudah login) -->
                                                        <div class="form-group">
                                                            <label for="addkelas">Kelas</label>
                                                            <input type="text" name="addkelas"
                                                                id="addkelas" class="form-control"
                                                                value="@auth {{ Auth::user()->kelas }} @endauth"
                                                                readonly>
                                                        </div>
                                                        <!-- Input Tanggal Kembali -->
                                                        <div class="form-group">
                                                            <label for="addtgl_kembali">Tanggal
                                                                Kembali</label>
                                                            <input type="date" name="addtgl_kembali"
                                                                id="addtgl_kembali" class="form-control">
                                                        </div>
                                                        <!-- Input Kode Buku -->
                                                        <div class="form-group">
                                                            <label for="addkd_buku">Kode Buku</label>
                                                            <select name="addkd_buku" id="addkd_buku"
                                                                class="form-control" required>
                                                                <option disabled selected> --Pilih--
                                                                </option>
                                                                @foreach ($buku as $item)
                                                                    @if ($item != null)
                                                                        <option
                                                                            value="{{ $item->kd_buku }}">
                                                                            {{ $item->kd_buku }} -
                                                                            {{ $item->judul }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!-- Input Judul Buku -->
                                                        <div class="form-group">
                                                            <label for="addjudul_buku">Judul Buku</label>
                                                            <select name="addjudul_buku"
                                                                id="addjudul_buku" class="form-control"
                                                                required>
                                                                <option disabled selected> --Pilih--
                                                                </option>
                                                                @foreach ($buku as $item)
                                                                    @if ($item != null)
                                                                        <option
                                                                            value="{{ $item->judul }}">
                                                                            {{ $item->judul }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <!-- Input Jumlah Pinjam -->
                                                        <div class="form-group">
                                                            <label for="addqty_pinjam">Jumlah
                                                                Pinjam</label>
                                                            <input type="number" name="addqty_pinjam"
                                                                id="addqty_pinjam" class="form-control">
                                                            <span id="stok-warning"
                                                                class="text-danger"></span>
                                                        </div>
                                                        <script>
                                                            const stokWarning = document.getElementById('stok-warning');
                                                            const addQtyPinjam = document.getElementById('addqty_pinjam');
                                                            const addKdBook = document.getElementById('addkd_buku');
                                                            const bukuOptions = @json($buku); // Mengambil daftar buku dari controller

                                                            addQtyPinjam.addEventListener('input', function() {
                                                                const selectedKdBook = addKdBook.value;
                                                                const selectedBook = bukuOptions.find(book => book.kd_buku === selectedKdBook);

                                                                if (selectedBook) {
                                                                    if (parseInt(addQtyPinjam.value) > selectedBook.stok) {
                                                                        stokWarning.textContent = 'Stok buku tidak mencukupi.';
                                                                    } else {
                                                                        stokWarning.textContent = '';
                                                                    }
                                                                }
                                                            });

                                                            addKdBook.addEventListener('change', function() {
                                                                stokWarning.textContent = ''; // Reset peringatan saat buku berubah
                                                                addQtyPinjam.value = ''; // Reset input jumlah buku
                                                            });
                                                        </script>

                                                        <!-- Input Status -->
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select name="status" id="status"
                                                                class="form-control">
                                                                <option value="dipinjam">Dipinjam</option>
                                                                <option value="kembali">Kembali</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" onclick="closeModal()">Batal</button>
                                                        <input type="submit"
                                                            class="btn btn-primary btn-send"
                                                            value="Simpan">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Script untuk Mengisi Modal -->
                                    <script>
                                        function openModal(kd_buku, judul_buku) {
                                            const stokWarning = document.getElementById('stok-warning');
                                            const addQtyPinjam = document.getElementById('addqty_pinjam');
                                            const addKdBook = document.getElementById('addkd_buku');
                                            const addJudulBuku = document.getElementById('addjudul_buku');

                                            // Mengisi input Kode Buku dan Judul Buku sesuai dengan yang di-klik
                                            addKdBook.value = kd_buku;
                                            addJudulBuku.value = judul_buku;

                                            addQtyPinjam.addEventListener('input', function() {
                                                const selectedKdBook = addKdBook.value;
                                                const selectedBook = bukuOptions.find(book => book.kd_buku === selectedKdBook);

                                                if (selectedBook) {
                                                    if (parseInt(addQtyPinjam.value) > selectedBook.stok) {
                                                        stokWarning.textContent = 'Stok buku tidak mencukupi.';
                                                    } else {
                                                        stokWarning.textContent = '';
                                                    }
                                                }
                                            });

                                            addKdBook.addEventListener('change', function() {
                                                stokWarning.textContent = ''; // Reset peringatan saat buku berubah
                                                addQtyPinjam.value = ''; // Reset input jumlah buku
                                            });

                                            $('#exampleModalScrollable').modal('show'); // Membuka modal
                                        }

                                        function closeModal() {
                                            $('#exampleModalScrollable').modal('hide'); //Menutup modal
                                        }
                                    </script>

                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    @endsection
