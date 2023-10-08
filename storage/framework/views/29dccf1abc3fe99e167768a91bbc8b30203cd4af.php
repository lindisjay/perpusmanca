<?php $__env->startSection('content'); ?>
    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
        <div id="wrapper">
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <hr>

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800 m-3" style="font-family: poppins">Selamat Datang, <span
                                    class="text-black fw-bold"><?php echo e(Auth::user()->name); ?>! </span></h1>

                        </div>


                        <!-- Content Row -->
                        <div class="row m-3">

                            <!-- USER -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <b>User</b>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($user); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- BUKU -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><b>Buku</b>
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                            <?php echo e($buku); ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- TRANSAKSI -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    <b>Transaksi</b>
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e($transaksi); ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Grafik Peminjaman</div>
                                        <div class="card-body">
                                            <div id="grafik"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script src="https://code.highcharts.com/highcharts.js"></script>

                        
                        <script type="text/javascript">
                            var jumlah_transaksi = <?php echo json_encode($jumlah_transaksi); ?>;
                            var bulan = <?php echo json_encode($bulan); ?>;
                            var namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
                                'November', 'Desember'
                            ];

                            Highcharts.chart('grafik', {
                                title: {
                                    text: 'Grafik Jumlah Transaksi per Bulan'
                                },
                                xAxis: {
                                    categories: bulan,
                                    labels: {
                                        formatter: function() {
                                            // Mengubah angka bulan menjadi nama bulan
                                            return namaBulan[this.value - 1];
                                        }
                                    }
                                },
                                yAxis: {
                                    title: {
                                        text: 'Jumlah Transaksi per Bulan'
                                    }
                                },
                                plotOptions: {
                                    series: {
                                        allowPointSelect: true
                                    }
                                },
                                series: [{
                                    name: 'Jumlah Transaksi',
                                    data: jumlah_transaksi
                                }]
                            })
                        </script>
                        
                        <hr>

                        <!-- Footer -->
                        <footer class="sticky-footer bg-white">
                            <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                                    <span>Copyright &copy; Perpusline Smanca</span>
                                </div>
                            </div>
                        </footer>
                        <!--     End of Footer -->

                    </div>
                <?php endif; ?>


                <div id="wrapper" <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?> style="display: none;"<?php endif; ?>>
                    <div id="content-wrapper" class="d-flex flex-column">

                        <!-- Main Content -->
                        <div id="content">

                            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                                <hr>

                                <!-- Sidebar Toggle (Topbar) -->
                                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                    <i class="fa fa-bars"></i>
                                </button>

                            </nav>
                            <!-- End of Topbar -->

                            <!-- Begin Page Content -->
                            <div class="container-fluid">

                                <!-- Page Heading -->
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <h1 class="h3 mb-0 text-gray-800 m-3" style="font-family: poppins">Selamat Datang, <span
                                            class="text-black fw-bold"><?php echo e(Auth::user()->name); ?>! </span></h1>
                                </div>

                                <div class="container-fluid">
                                    <div class="card m-3">
                                        <div class="card-body">
                                            <i>"Selamat Datang! Kami dengan senang hati menyambut Anda di Perpustakaan
                                                Digital Kami <b>(PERPUSLINE SMANCA)</b>. Silakan cari buku yang Anda
                                                suka."</i>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <hr>
                                <div class="container-fluid">
                                    <div class="card m-3">
                                        <div class="card-body">
                                            <h5 class="card-title fw-semibold mb-4">Ajukan Peminjaman</h5>
                                            <?php if(session('error')): ?>
                                                <div class="alert alert-danger">
                                                    <?php echo e(session('error')); ?>

                                                </div>
                                            <?php endif; ?>
                                            <div class="card">
                                                <div class="card-body p-4">
                                                    <i>Untuk melakukan transaksi peminjaman, klik</i>
                                                    <a class="btn btn-primary m-1" href="#"
                                                        onclick="openModal()">Tambah Transaksi</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Transaksi -->
                                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Pinjam Buku</h5>
                                                
                                            </div>
                                            <!-- Form Transaksi -->
                                            <form action="<?php echo e(route('transaksi.store')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="modal-body">
                                                    <!-- Input Nama (Menggunakan Auth::user() jika user sudah login) -->
                                                    <div class="form-group">
                                                        <label for="addname">Nama</label>
                                                        <input type="text" name="addname" id="addname"
                                                            class="form-control"
                                                            value="<?php if(auth()->guard()->check()): ?> <?php echo e(Auth::user()->name); ?> <?php endif; ?>" readonly>
                                                    </div>
                                                    <!-- Input Kelas (Menggunakan Auth::user() jika user sudah login) -->
                                                    <div class="form-group">
                                                        <label for="addkelas">Kelas</label>
                                                        <input type="text" name="addkelas" id="addkelas"
                                                            class="form-control"
                                                            value="<?php if(auth()->guard()->check()): ?> <?php echo e(Auth::user()->kelas); ?> <?php endif; ?>" readonly>
                                                    </div>
                                                    <!-- Input Tanggal Kembali -->
                                                    <div class="form-group">
                                                        <label for="addtgl_kembali">Tanggal
                                                            Kembali</label>
                                                        <input type="date" name="addtgl_kembali" id="addtgl_kembali"
                                                            class="form-control">
                                                    </div>
                                                    <!-- Input Kode Buku -->
                                                    <div class="form-group">
                                                        <label for="addkd_buku">Kode Buku</label>
                                                        <select name="addkd_buku" id="addkd_buku" class="form-control"
                                                            required>
                                                            <option disabled selected> --Pilih-- </option>
                                                            <?php $__currentLoopData = $bukuList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($buku->kd_buku); ?>">
                                                                    <?php echo e($buku->kd_buku); ?> - <?php echo e($buku->judul); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <!-- Input Judul Buku (Akan diisi otomatis menggunakan JavaScript) -->
                                                    <div class="form-group">
                                                        <label for="addjudul_buku">Judul Buku</label>
                                                        <select name="addjudul_buku" id="addjudul_buku"
                                                            class="form-control" required>
                                                            <option disabled selected> --Pilih-- </option>
                                                            <?php $__currentLoopData = $bukuList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($buku->judul); ?>">
                                                                    <?php echo e($buku->judul); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <!-- Input Jumlah Pinjam -->
                                                    <div class="form-group">
                                                        <label for="addqty_pinjam">Jumlah Pinjam</label>
                                                        <input type="number" name="addqty_pinjam" id="addqty_pinjam"
                                                            class="form-control">
                                                        <span id="stok-warning" class="text-danger"></span>
                                                    </div>
                                                    <script>
                                                        const stokWarning = document.getElementById('stok-warning');
                                                        const addQtyPinjam = document.getElementById('addqty_pinjam');
                                                        const addKdBook = document.getElementById('addkd_buku');
                                                        const bukuOptions = <?php echo json_encode($buku, 15, 512) ?>; // Mengambil daftar buku dari controller

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
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="dipinjam">Dipinjam</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                        onclick="closeModal()">Batal</button>
                                                    <input type="submit" class="btn btn-primary btn-send"
                                                        value="Simpan">
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function openModal(kd_buku, judul_buku) {
                                        const stokWarning = document.getElementById('stok-warning');
                                        const addQtyPinjam = document.getElementById('addqty_pinjam');
                                        const addKdBook = document.getElementById('addkd_buku');
                                        const addJudulBuku = document.getElementById('addjudul_buku');

                                        addQtyPinjam.addEventListener('input', function() {
                                            const selectedKdBook = addKdBook.value;

                                            const bukuOptions = <?php echo json_encode($bukuList, 15, 512) ?>;
                                            // Memeriksa apakah bukuOptions adalah array sebelum menggunakan .find()
                                            if (Array.isArray(bukuOptions) && bukuOptions.length > 0) {
                                                const selectedBook = bukuOptions.find(book => book.kd_buku === selectedKdBook);

                                                if (selectedBook) {
                                                    if (parseInt(addQtyPinjam.value) > selectedBook.stok) {
                                                        stokWarning.textContent = 'Stok buku tidak mencukupi.';
                                                    } else {
                                                        stokWarning.textContent = '';
                                                    }
                                                }
                                            } else {
                                                console.error('bukuOptions is not an array:', bukuOptions);
                                            }
                                        });

                                        addKdBook.addEventListener('change', function() {
                                            stokWarning.textContent = ''; // Reset peringatan saat buku berubah
                                            addQtyPinjam.value = ''; // Reset input jumlah buku
                                        });


                                        $('#exampleModalScrollable').modal('show'); // Membuka modal
                                    }

                                    function closeModal() {
                                        $('#exampleModalScrollable').modal('hide'); // Menutup modal
                                    }

                                    // Validasi stok sebelum submit form
                                    document.querySelector('form').addEventListener('submit', function(event) {
                                        const selectedKdBook = document.getElementById('addkd_buku').value;
                                        const selectedBook = bukuOptions.find(book => book.kd_buku === selectedKdBook);
                                        const requestedQty = parseInt(document.getElementById('addqty_pinjam').value);

                                        if (selectedBook && requestedQty > selectedBook.stok) {
                                            stokWarning.textContent = 'Stok buku tidak mencukupi.';
                                            event.preventDefault(); // Mencegah pengiriman form jika stok tidak mencukupi
                                        }
                                    });
                                </script>

                                <!-- End of Main Content -->

                            </div>

                            <!-- Footer -->
                            <footer class="sticky-footer bg-white">
                                <div class="container my-auto">
                                    <div class="copyright text-center my-auto">
                                        <span>Copyright &copy; Perpusline Smanca</span>
                                    </div>
                                </div>
                            </footer>
                            <!--     End of Footer -->

                        </div>
                    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\xampp\htdocs\Perpusmanca\resources\views/dashboard/dashboard.blade.php ENDPATH**/ ?>