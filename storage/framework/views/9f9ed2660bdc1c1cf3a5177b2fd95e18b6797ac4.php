<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="container-fluid">
            <div class="card m-4">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">LAPORAN</h5>
                    
        <div class="row justify-content-center mt-3">
            <div class="col-md-12">
                <div class="card m-3">
                    <div class="cardheader m-3">Laporan Transaksi</div>
                    <div class="card-body">
                        <form action="/laporan/transaksi" method="PUT" target="_blank">
                            <?php echo csrf_field(); ?>
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label for="tglawal">Tanggal Awal</label>
                                        <input id="tglawal" type="date" name="tglawal" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tglakhir">Tanggal Akhir</label>
                                        <input id="tglakhir" type="date" name="tglakhir" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-success btnsend" name="cetak" value="pdf">Cetak PDF</button>
                                    <button type="submit" class="btn btn-success btnsend" name="cetak" value="excel">Cetak Excel</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div><br>

        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card m-1">
                    <div class="cardheader m-3">Laporan Anggota</div>
                    <div class="card-body">
                        <form action="/laporan/user" method="PUT" target="_blank">
                            <?php echo csrf_field(); ?>
                            <fieldset>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-success btnsend" name="cetak" value="pdf">Cetak PDF</button>
                                    <button type="submit" class="btn btn-success btnsend" name="cetak" value="excel">Cetak Excel</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-md-12">
                <div class="card m-3">
                    <div class="cardheader m-3">Laporan Buku</div>
                    <div class="card-body">
                        <form action="/laporan/buku" method="PUT" target="_blank">
                            <?php echo csrf_field(); ?>
                            <fieldset>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-success btnsend" name="cetak" value="pdf">Cetak PDF</button>
                                    <button type="submit" class="btn btn-success btnsend" name="cetak" value="excel">Cetak Excel</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\xampp\htdocs\Perpusmanca\resources\views/admin/laporan/laporan.blade.php ENDPATH**/ ?>