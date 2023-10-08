<?php $__env->startSection('content'); ?>
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
                                                <?php
                                                    $i = 1;
                                                ?>
                                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($i++); ?></td>
                                                        <td><?php echo e($agt->name); ?></td>
                                                        <td><?php echo e($agt->kelas); ?></td>
                                                        <td><?php echo e($agt->email); ?></td>
                                                        <td>
                                                            <?php $__currentLoopData = $agt->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($role === 'admin'): ?>
                                                                    1
                                                                <?php elseif($role === 'user'): ?>
                                                                    2
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                        <td><?php echo e($agt->jenis_kelamin); ?></td>
                                                        <td><?php echo e($agt->no_hp); ?></td>
                                                        <td align="center">
                                                            <a
                                                                href="<?php echo e(route('user.edit', [$agt->id])); ?>"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                                                <i class="fas fa-edit fa-sm text-white-50"></i>
                                                                </a>

                                                            <a href="/user/hapus/<?php echo e($agt->id); ?>"
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
                            </form>
                        </div>
                    </div>
                <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\xampp\htdocs\Perpusmanca\resources\views/admin/user/user.blade.php ENDPATH**/ ?>