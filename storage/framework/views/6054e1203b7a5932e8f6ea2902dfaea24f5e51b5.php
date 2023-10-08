<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card m-4">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4"></h5>
                    <div class="card mb-0">
                        <div class="card-body p-4">
                            <form action="<?php echo e(route('transaksi.update', [$transaksi->id])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="_method" value="PUT">
                                <fieldset>
                                    <legend>Ubah Data Peminjaman</legend>
                                    <div class="form-group row">
                                        <div class="col-md-5">
                                            <label for="addid" class="m-1">No</label>
                                            <input class="form-control" type="text" name="addid"
                                                value="<?php echo e($transaksi->id); ?>" readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addname" class="m-1">Nama</label>
                                            <input class="form-control" type="text" name="addname"
                                                value="<?php echo e($transaksi->name); ?>" readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                                            <label for="addkelas" class="m-1">Kelas</label>
                                            <input id="addkelas" type="text" name="addkelas" class="form-control"
                                                value="<?php echo e($transaksi->kelas); ?>" readonly>
                                        </div>
                                        
                                        <div class="col-md-5">
                                            <label for="addtgl_kembali" class="m-1">Tanggal Kembali</label>
                                            <input id="addtgl_kembali" type="text" name="addtgl_kembali" class="form-control"
                                                value="<?php echo e($transaksi->tgl_kembali); ?>" readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addkd_buku" class="m-1">Kode Buku</label>
                                            <input id="addkd_buku" type="text" name="addkd_buku" class="form-control"
                                                value="<?php echo e($transaksi->kd_buku); ?>" readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addjudul_buku" class="m-1">Judul</label>
                                            <input id="addjudul_buku" type="text" name="addjudul_buku" class="form-control"
                                                value="<?php echo e($transaksi->judul_buku); ?>" readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="addqty_pinjam" class="m-1">QTY</label>
                                            <input id="addqty_pinjam" type="number" name="addqty_pinjam" class="form-control"
                                                value="<?php echo e($transaksi->qty_pinjam); ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="status" class="m-1">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="dipinjam" <?php if($transaksi->status === 'dipinjam'): ?> selected <?php endif; ?>>Dipinjam</option>
                                                <option value="kembali" <?php if($transaksi->status === 'kembali'): ?> selected <?php endif; ?>>Kembali</option>
                                            </select>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </fieldset>

                                    <div class="card-body p-4">
                                        <hr>
                                        <div class="col-md-10">
                                            <input type="submit" class="btn btn-success btn-send" value="Update">
                                            <a href="<?php echo e(route('transaksi.index')); ?>"><input type="Button"
                                                    class="btn btn-primary btn-send" value="Kembali"></a>
                                        </div>

                            </form>
                        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\xampp\htdocs\Perpusmanca\resources\views/admin/transaksi/editTransaksi.blade.php ENDPATH**/ ?>