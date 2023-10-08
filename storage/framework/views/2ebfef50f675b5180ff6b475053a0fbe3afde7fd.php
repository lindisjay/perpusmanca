<?php $__env->startSection('content'); ?>
    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
        <div class="container-fluid">
            <div class="card m-4">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4"></h5>
                    <div class="card mb-0">
                        <div class="card-body p-4">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
                            </div>
                            <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                            <?php endif; ?>
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
                                                <?php
                                                    $i = 1;
                                                ?>
                                                <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($i++); ?></td>
                                                        <td><?php echo e($trs->name); ?></td>
                                                        <td><?php echo e($trs->kelas); ?></td>
                                                        <td><?php echo e(\Carbon\Carbon::parse($trs->created_at)->format('Y-m-d')); ?></td>
                                                        <td><?php echo e($trs->tgl_kembali); ?></td>
                                                        <td><?php echo e($trs->kd_buku); ?></td>
                                                        <td><?php echo e($trs->judul_buku); ?></td>
                                                        <td><?php echo e($trs->qty_pinjam); ?></td>
                                                        <td><?php echo e($trs->status); ?></td>
                                                        <td align="center">
                                                            <a href="<?php echo e(route('transaksi.edit', [$trs->id])); ?>"
                                                                class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                                                <i class="fas fa-edit fa-sm text-white-50"></i> </a>

                                                            <a href="/transaksi/hapus/<?php echo e($trs->id); ?>"
                                                                onclick="return confirm('Yakin Ingin menghapus data?')"
                                                                class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                                                <i class="fas fa-trash-alt fa-sm text-white-50"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah</h5>
                                            
                                        </div>
                                        <form action="<?php echo e(action('TransaksiController@store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="addname" class="p-2">Nama</label>
                                                    <input type="text" name="addname" id="addname" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="addkelas" class="p-2">Kelas</label>
                                                    <input type="text" name="addkelas" id="addkelas" class="form-control">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="addtgl_kembali" class="p-2">Tanggal Kembali</label>
                                                    <input type="date" name="addtgl_kembali" id="addtgl_kembali"
                                                        class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="addkd_buku" class="col-form-label">Kode</label>
                                                    <select name="addkd_buku" id="addkd_buku" class="form-control" required>
                                                        <option disabled selected> --Pilih--</option>
                                                        <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($item != null): ?>
                                                                <option value="<?php echo e($item->kd_buku); ?>"><?php echo e($item->kd_buku); ?> -
                                                                    <?php echo e($item->judul); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="addjudul_buku" class="col-form-label p-2">Judul</label>
                                                    <select name="addjudul_buku" id="addjudul_buku" class="form-control"
                                                        required>
                                                        <option disabled selected> --Pilih--</option>
                                                        <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($item != null): ?>
                                                                <option value="<?php echo e($item->judul); ?>"><?php echo e($item->judul); ?>

                                                                </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="addqty_pinjam" class="p-2">QTY</label>
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
                                                <div class="form-group">
                                                    <label for="status" class="p-2">Status</label>
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
    <?php endif; ?>


    <div class="container-fluid" <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?> style="display: none;"<?php endif; ?>>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4"></h5>
                <div class="card mb-0">
                    <div class="card-body p-4">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
                        </div>
                        <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>
                        <hr>
                        
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
                                            <?php $i=1 ?>
                                            <?php $__currentLoopData = $transaksi->where('user_id', auth()->id()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($i++); ?></td>
                                                    <td><?php echo e($trs->name); ?></td>
                                                    <td><?php echo e($trs->kelas); ?></td>
                                                    <td><?php echo e(\Carbon\Carbon::parse($trs->created_at)->format('Y-m-d')); ?></td>
                                                    <td><?php echo e($trs->tgl_kembali); ?></td>
                                                    <td><?php echo e($trs->kd_buku); ?></td>
                                                    <td><?php echo e($trs->judul_buku); ?></td>
                                                    <td><?php echo e($trs->qty_pinjam); ?></td>
                                                    <td><?php echo e($trs->status); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="<?php echo e(action('TransaksiController@store')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="addname" class="p-2">Nama</label>
                                                <input type="text" name="addname" id="addname" class="form-control"
                                                    value="<?php if(auth()->guard()->check()): ?> <?php echo e(Auth::user()->name); ?> <?php endif; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="addkelas" class="p-2">Kelas</label>
                                                <input type="text" name="addkelas" id="addkelas"
                                                    class="form-control" value="<?php if(auth()->guard()->check()): ?> <?php echo e(Auth::user()->kelas); ?> <?php endif; ?>"
                                                    readonly>
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="addtgl_kembali" class="p-2">Tanggal Kembali</label>
                                                <input type="date" name="addtgl_kembali" id="addtgl_kembali"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="addkd_buku" class="col-form-label">Kode</label>
                                                <select name="addkd_buku" id="addkd_buku" class="form-control" required>
                                                    <option disabled selected> --Pilih--</option>
                                                    <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($item != null): ?>
                                                            <option value="<?php echo e($item->kd_buku); ?>"><?php echo e($item->kd_buku); ?> -
                                                                <?php echo e($item->judul); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="addjudul_buku" class="col-form-label p-2">Judul</label>
                                                <select name="addjudul_buku" id="addjudul_buku" class="form-control"
                                                    required>
                                                    <option disabled selected> --Pilih--</option>
                                                    <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($item != null): ?>
                                                            <option value="<?php echo e($item->judul); ?>"><?php echo e($item->judul); ?>

                                                            </option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="addqty_pinjam" class="p-2">QTY</label>
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

                                            <div class="form-group">
                                                <label for="status" class="p-2">Status</label>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\xampp\htdocs\Perpusmanca\resources\views/admin/transaksi/transaksi.blade.php ENDPATH**/ ?>