<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= view('components/header') ?>
    <title>Akses Pengguna Aplikasi</title>
</head>
<body>
    <!-- === component navigation === -->
    <?= view('components/navigation-type-one') ?>
    <!-- === end component navigation ==== -->
    <!-- === component card login === -->
    <?= view('auth/components/c-akses-user') ?>

</body>
</html>