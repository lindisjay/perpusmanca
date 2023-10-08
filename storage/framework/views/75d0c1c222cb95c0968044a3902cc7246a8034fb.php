<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>


<body>
    <table class="table table-bordered" width="100%" align="center">
        <tr align="center">
            <td>
                <h4>Laporan Transaksi<br>Perpusline SMANCA</h4>
                <hr>
            </td>
        </tr>
    </table>
    <table class="table table-bordered" width="100%" align="center">
        <thead>
            <tr>
                <th width="2%">No</th>
                <th width="7%">Nama</th>
                <th width="5%">Kelas</th>
                <th width="5%">Tanggal Pinjam</th>
                <th width="5%">Tanggal Kembali</th>
                <th width="5%">Kode Buku</th>
                <th width="7%">Judul</th>
                <th width="2%">Qty</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr align="center">
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($trs->name); ?></td>
                    <td><?php echo e($trs->kelas); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($trs->created_at)->format('d-m-Y')); ?></td>
                    <td><?php echo e($trs->tgl_kembali); ?></td>
                    <td><?php echo e($trs->kd_buku); ?></td>
                    <td><?php echo e($trs->judul_buku); ?></td>
                    <td><?php echo e($trs->qty_pinjam); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div align="right">
        <h6>Tanda Tangan</h6><br>
        <?php if(auth()->guard()->check()): ?>
            <h6><?php echo e(Auth::user()->name); ?></h6>
        <?php endif; ?>
    </div>
</body>

</html>
<?php /**PATH D:\xampp\xampp\htdocs\Perpusmanca\resources\views/admin/laporan/peminjaman_pdf.blade.php ENDPATH**/ ?>