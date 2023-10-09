<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card m-4">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4"></h5>
                    <div class="card mb-0">
                        <div class="card-body p-4">
                            <form action="<?php echo e(route('buku.update', [$buku->kd_buku])); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="_method" value="PUT">
                                <fieldset>
                                    <legend>Ubah Data Buku</legend>
                                    <div class="form-group row">
                                        <div class="col-md-5">
                                            <label for="addno_induk">No. Induk</label>
                                            <input class="form-control" type="text" name="addno_induk"
                                                value="<?php echo e($buku->no_induk); ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addtgl_dtg">Tanggal Datang</label>
                                            <input class="form-control" type="date" name="addtgl_dtg"
                                                value="<?php echo e($buku->tgl_dtg); ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addthn_masuk">Tahun Terbit</label>
                                            <input class="form-control" type="text" name="addthn_masuk"
                                                value="<?php echo e($buku->thn_masuk); ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addkd_buku">Kode Buku</label>
                                            <input class="form-control" type="text" name="addkd_buku"
                                                value="<?php echo e($buku->kd_buku); ?>" readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addimage">Sampul</label><br>
                                            <input type="file" name="addimage" id="addimage">
                                            <img src="<?php echo e(asset('storage/' . $buku->image)); ?>" alt="" style="max-width: 100px;">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addjudul">Judul</label>
                                            <input id="addjudul" type="text" name="addjudul" class="form-control"
                                                value="<?php echo e($buku->judul); ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addpenulis">Penulis</label>
                                            <input id="addpenulis" type="text" name="addpenulis" class="form-control"
                                                value="<?php echo e($buku->penulis); ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addpenerbit">Penerbit</label>
                                            <input id="addaddpenerbit" type="text" name="addpenerbit"
                                                class="form-control" value="<?php echo e($buku->penerbit); ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addkategori">Kategori</label>
                                            <input id="addkategori" type="text" name="addkategori" class="form-control"
                                                value="<?php echo e($buku->kategori); ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addsumber">Sumber</label>
                                            <input id="addsumber" type="text" name="addsumber" class="form-control"
                                                value="<?php echo e($buku->sumber); ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addstok">Stok</label>
                                            <input id="addstok" type="text" name="addstok" class="form-control"
                                                value="<?php echo e($buku->stok); ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addqty_bku_dtg">QTY Buku Datang</label>
                                            <input id="addqty_bku_dtg" type="text" name="addqty_bku_dtg" class="form-control"
                                                value="<?php echo e($buku->qty_bku_dtg); ?>">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addharga">Harga/satuan</label>
                                            <input id="addharga" type="text" name="addharga" class="form-control"
                                                value="<?php echo e($buku->harga); ?>">
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="container-fluid">
                                    <div class="card-body m-0 p-0">
                                        <div class="col-md-10">
                                            <hr>
                                            <input type="submit" class="btn btn-success btn-send" value="Update">
                                            <a href="<?php echo e(route('buku.index')); ?>"><input type="Button"
                                                    class="btn btn-primary btn-send" value="Kembali"></a>
                                        </div>

                                    </div>
                            </form>
                        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\xampp\htdocs\Perpusmanca\resources\views/admin/buku/editBuku.blade.php ENDPATH**/ ?>