<?php $__env->startSection('content'); ?>
    <div class="container-fluid" <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?> style="display: none;"<?php endif; ?>>
        <div class="container-fluid">
            <div>
                <br>
                <br>
                <br>
                <h3 class="m-3">Katalog Buku</h3>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                <div id="search-results"></div>
                <!-- Form Pencarian & Paginasi-->
                <form action="<?php echo e(route('buku.index')); ?>" method="GET" id="search-form">
                    <div class="input-group mb-3">
                        <input type="text" name="keyword" id="search-input" class="form-control"
                            placeholder="Cari judul atau penulis...">
                    </div>
                </form>

                <!--Form Pencarian-->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const searchInput = document.getElementById('search-input');
                        const booksContainer = document.querySelector('.grid');
                        const allBooks = Array.from(booksContainer.querySelectorAll('.card'));
                        let sortedBooks = [];

                        searchInput.addEventListener('input', function() {
                            const keyword = this.value.toLowerCase();

                            // Mengurutkan buku berdasarkan relevansi dengan kata kunci pencarian
                            sortedBooks = allBooks.slice().sort((a, b) => {
                                const titleA = a.querySelector('.card-title').innerText.toLowerCase();
                                const authorA = a.querySelector('.card-text:nth-of-type(1)').innerText
                                    .toLowerCase();
                                const titleB = b.querySelector('.card-title').innerText.toLowerCase();
                                const authorB = b.querySelector('.card-text:nth-of-type(1)').innerText
                                    .toLowerCase();

                                const scoreA = (titleA.includes(keyword) ? 1 : 0) + (authorA.includes(keyword) ?
                                    1 : 0);
                                const scoreB = (titleB.includes(keyword) ? 1 : 0) + (authorB.includes(keyword) ?
                                    1 : 0);

                                // Urutkan dari yang paling relevan ke yang kurang relevan
                                return scoreB - scoreA;
                            });

                            // Hapus semua buku dari kontainer
                            booksContainer.innerHTML = '';

                            // Menambahkan buku-buku yang sudah diurutkan kembali ke kontainer
                            sortedBooks.forEach(book => {
                                booksContainer.appendChild(book);
                            });
                        });

                        // Fungsi untuk memindahkan hasil pencarian ke bagian atas
                        function moveSearchResultsToTop() {
                            const searchResults = sortedBooks.filter(book => {
                                return book.style.display !== 'none';
                            });

                            // Hapus semua buku yang ditampilkan
                            booksContainer.innerHTML = '';

                            // Tambahkan hasil pencarian yang relevan ke bagian atas
                            searchResults.forEach(book => {
                                booksContainer.appendChild(book);
                            });
                        }

                        // Pindahkan hasil pencarian ke bagian atas setelah pencarian selesai
                        searchInput.addEventListener('blur', function() {
                            moveSearchResultsToTop();
                        });
                    });
                </script>
                <!--End Form Pencarian-->

                <div class="grid">
                    <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 mb-2 ">
                            <div class="card katalog-card m-2 text-center">
                                <img src="<?php echo e(asset('storage/' . $bku->image)); ?>" alt="..." width="150"
                                    class="gambar">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($bku->judul); ?></h5>
                                    <p class="card-text"><?php echo e($bku->penulis); ?></p>
                                    <p class="card-text"><?php echo e($bku->penerbit); ?></p>
                                    <p class="card-text">Stok: <?php echo e($bku->stok); ?></p>
                                    <div class="tombol">
                                        <button class="btn btn-primary"
                                        onclick="openModal('<?php echo e($bku->kd_buku); ?>', '<?php echo e($bku->judul); ?>')">Pinjam
                                        Buku</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <input type="text" name="addname" id="addname" class="form-control"
                                            value="<?php if(auth()->guard()->check()): ?> <?php echo e(Auth::user()->name); ?> <?php endif; ?>" readonly>
                                    </div>
                                    <!-- Input Kelas (Menggunakan Auth::user() jika user sudah login) -->
                                    <div class="form-group">
                                        <label for="addkelas">Kelas</label>
                                        <input type="text" name="addkelas" id="addkelas" class="form-control"
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
                                        <select name="addkd_buku" id="addkd_buku" class="form-control" required>
                                            <option disabled selected> --Pilih--
                                            </option>
                                            <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item != null): ?>
                                                    <option value="<?php echo e($item->kd_buku); ?>">
                                                        <?php echo e($item->kd_buku); ?> -
                                                        <?php echo e($item->judul); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <!-- Input Judul Buku -->
                                    <div class="form-group">
                                        <label for="addjudul_buku">Judul Buku</label>
                                        <select name="addjudul_buku" id="addjudul_buku" class="form-control" required>
                                            <option disabled selected> --Pilih--
                                            </option>
                                            <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item != null): ?>
                                                    <option value="<?php echo e($item->judul); ?>">
                                                        <?php echo e($item->judul); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <!-- Input Jumlah Pinjam -->
                                    <div class="form-group">
                                        <label for="addqty_pinjam">Jumlah
                                            Pinjam</label>
                                        <input type="number" name="addqty_pinjam" id="addqty_pinjam" class="form-control">
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
                                            stokWarning.textContent =

                                                ''; // Reset peringatan saat buku berubah
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
                                    <input type="submit" class="btn btn-primary btn-send" value="Simpan">
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\xampp\htdocs\Perpusmanca\resources\views/admin/buku/katalog.blade.php ENDPATH**/ ?>