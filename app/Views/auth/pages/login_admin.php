<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= view('components/header') ?>
    <title>Login Aplikasi Kasir</title>
</head>
<body>
    <!-- === component navigation === -->
    <?= view('components/navigation-type-one') ?>
    <!-- === end component navigation ==== -->
    <!-- === component alert === -->
    <div class="box text-center">
        <?php if (session()->getFlashdata('msg')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('msg'); ?>
            </div>
        <?php endif; ?>
    </div>
    <!-- === component card login === -->
    <?= view('auth/components/card-login-admin') ?>
</body>
</html>