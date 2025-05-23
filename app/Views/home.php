<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kemenkes</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <?= view('components/header') ?>
    <link rel="stylesheet" href="<?= base_url('components/css/fontGlobal.css') ?>">
</head>
<body>
    <!-- === component navigation === -->
    <?= view('components/navigation-type-one') ?>
    <!-- === end component navigation ==== -->

    <!-- === component section hero === -->
    <?= view('components/home/section-hero') ?>
</body>
</html>