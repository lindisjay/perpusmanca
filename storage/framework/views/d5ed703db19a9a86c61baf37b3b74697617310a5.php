<!DOCTYPE html>
<html>

<head>
    <title>Laporan Buku</title>
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
                <h4>Laporan Data Buku<br>Perpusline SMANCA</h4>
                <hr>
            </td>
        </tr>
    </table>
    <table class="table table-bordered" width="100%" align="center">
        <thead>
            <tr>
                <th width="2%">No</th>
                <th width="5%">Kode Buku</th>
                <th width="3%">Tahun Masuk</th>
                <th width="7%">Judul</th>
                <th width="5%">Penulis</th>
                <th width="5%">Penerbit</th>
                <th width="5%">Kategori</th>
                <th width="4%">Jumlah</th>
                <th width="5%">Harga/satuan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            <?php $__currentLoopData = $buku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr align="center">
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($bku->kd_buku); ?></td>
                    <td><?php echo e($bku->thn_masuk); ?></td>
                    <td><?php echo e($bku->judul); ?></td>
                    <td><?php echo e($bku->penulis); ?></td>
                    <td><?php echo e($bku->penerbit); ?></td>
                    <td><?php echo e($bku->kategori); ?></td>
                    <td><?php echo e($bku->stok); ?></td>
                    <td><?php echo e($bku->harga); ?></td>
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
<?php /**PATH D:\xampp\xampp\htdocs\Perpusmanca\resources\views/admin/laporan/bukupdf.blade.php ENDPATH**/ ?>