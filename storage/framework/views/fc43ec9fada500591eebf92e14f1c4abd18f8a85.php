<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('user.update', [$user->id])); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_method" value="PUT">
        <fieldset>
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card p-3 m-4">
                        <legend>Ubah Data Anggota</legend>
                        <fieldset>
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <label for="addnama">Nama Anggota</label>
                                    <input id="addname" type="text" name="addname" class="form-control"
                                        value="<?php echo e($user->name); ?>">
                                </div>
                                <div class="col-md-5">
                                    <label for="addkelas">Kelas</label>
                                    <input id="addkelas" type="text" name="addkelas" class="form-control"
                                        value="<?php echo e($user->kelas); ?>">
                                </div>
                                <div class="col-md-5">
                                    <label for="addjenis_kelamin">Jenis Kelamin</label>
                                    <input id="addjenis_kelamin" type="text" name="addjenis_kelamin" class="form-control"
                                        value="<?php echo e($user->jenis_kelamin); ?>">
                                </div>
                                <div class="col-md-5">
                                    <label for="addno_hp">No Hp</label>
                                    <input id="addno_hp" type="text" name="addno_hp" class="form-control"
                                        value="<?php echo e($user->no_hp); ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        <label for="akses">Ubah Akses</label>
                                        <select id="roles" name="role" class="form-control" required>
                                            <option value="">--Pilih Akses--</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="container-fluid">
            <div class="container-fluid">
                <hr class="p-0">
                <div class="card p-0 m-4">
                    <div class="card-body p-4">
                        <div class="col-md-10">
                            <input type="submit" class="btn btn-success btn-send" value="Ubah Akses">
                            <a href="<?php echo e(route('user.index')); ?>"><input type="Button" class="btn btn-primary btn-send"
                                    value="Kembali"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\xampp\htdocs\Perpusmanca\resources\views/admin/user/editUser.blade.php ENDPATH**/ ?>