<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Perpusline</title>
    <!-- Custom fonts for this template-->
    <link href="<?php echo e(asset('asset/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo e(asset('asset/css/sb-admin-2.min.css')); ?>" rel="stylesheet">
</head>

<body class="bg-gradient-light">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="center">
                            <div class="col-lg-6 d-none d-lg-block "></div>
                            <div class="col-lg-20">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb--4">Sistem Perpusline<br>SMA N 1 Cawas<br>
                                            <br><img src="<?php echo e(asset('asset/layout_old/asset/img/Smanca_logo.png')); ?>" width="160">
                                        </h1>
                                    </div>
                                    <form method="POST" action="<?php echo e(route('login')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group row">
                                            <label for="email"
                                                class="col-md-12 col-form-label text-md-left"><?php echo e(__('E-Mail Address')); ?></label>
                                            <div class="col-md-12">
                                                <input id="email" type="email"
                                                    class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="email" value="<?php echo e(old('email')); ?>" required
                                                    autocomplete="email" autofocus>
                                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password"
                                                class="col-md-12 col-form-label text-md-left"><?php echo e(__('Password')); ?></label>
                                            <div class="col-md-12">
                                                <input id="password" type="password"
                                                    class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                    name="password" required autocomplete="current-password">
                                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($message); ?></strong>
                                                    </span>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 offset-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                                    <label class="form-check-label" for="remember">
                                                        <?php echo e(__('Remember Me')); ?>

                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 offset-md-12">
                                                <button type="submit" class="btn btn-primary">
                                                    <?php echo e(__('Login')); ?>

                                                </button>
                                                <hr>
                                                <p>Belum mempunyai akun? <a href="register">Register</a></p>
                                                

                                            </div>
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
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('asset/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('asset/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('asset/js/sb-admin-2.min.js')); ?>"></script>
</body>

</html>
<?php /**PATH D:\xampp\xampp\htdocs\Perpusmanca\resources\views/auth/login.blade.php ENDPATH**/ ?>