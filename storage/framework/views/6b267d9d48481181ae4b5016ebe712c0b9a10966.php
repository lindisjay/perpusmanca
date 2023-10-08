<?php $__env->startSection('content'); ?>
    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
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
                                                        <th>Tahun Masuk</th>
                                                        <th>Sampul</th>
                                                        <th>Kode Buku</th>
                                                        <th>Judul</th>
                                                        <th>Penulis</th>
                                                        <th>Penerbit</th>
                                                        <th>Kategori</th>
                                                        <th>Rak</th>
                                                        <th>Stok</th>
                                                        <th>Harga/satuan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($bku->thn_masuk); ?></td>
                                                            <td>
                                                                <img src="<?php echo e(asset('storage/' . $bku->image)); ?>" alt="..." width="30px" class="gambar">

                                                            </td>
                                                            <td><?php echo e($bku->kd_buku); ?></td>
                                                            <td><?php echo e($bku->judul); ?></td>
                                                            <td><?php echo e($bku->penulis); ?></td>
                                                            <td><?php echo e($bku->penerbit); ?></td>
                                                            <td><?php echo e($bku->kategori); ?></td>
                                                            <td><?php echo e($bku->rak); ?></td>
                                                            <td><?php echo e($bku->stok); ?></td>
                                                            <td>Rp. <?php echo e(number_format($bku->harga)); ?></td>
                                                            <td align="center">
                                                                <a
                                                                    href="<?php echo e(route('buku.edit', [$bku->kd_buku])); ?>"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                                                    <i class="fas fa-edit fa-sm text-white-50"></i></a>

                                                                <a href="/buku/hapus/<?php echo e($bku->kd_buku); ?>"
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
                                                <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data Buku</h5>
                                                
                                            </div>

                                            <form action="<?php echo e(action('BukuController@store')); ?>" method="POST"
                                                enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1" class="m-1">Tahun Masuk</label>
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
                                                        <label for="exampleFormControlInput1" class="m-1">Rak</label>
                                                        <input type="text" name="addrak" id="addrak"
                                                            class="form-control" id="exampleFormControlInput1">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="addstok" class="m-1">Stok</label>
                                                        <input type="number" name="addstok" id="addstok"
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
                            <?php endif; ?>

                            <!--==================================================== KATALOG PAGE =================================================================-->

                            
                    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\xampp\htdocs\Perpusmanca\resources\views/admin/buku/buku.blade.php ENDPATH**/ ?>