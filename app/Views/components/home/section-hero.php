<section class="container d-flex align-items-center min-vh-100">
    <div class="row w-100">
        <!-- === component text === -->
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 class="display-4 fw-bold">Selamat Datang di Kemenkes App</h1>
            <p class="lead">Jelajahi layanan kami yang luar biasa dan temukan solusi terbaik untuk Anda.</p>
            <?php $session = session(); ?>
            <?php if($session->get('akses')): ?>
                <a href="<?= base_url('dashboard')?>" class="btn btn-primary btn-lg mt-3"><?= $_SESSION['akses']; ?></a>
            <?php else: ?>
                <a href="<?= base_url('aksesLogin')?>" class="btn btn-primary btn-lg mt-3">Masuk Pada Aplikasi</a>
            <?php endif; ?>
           
        </div>

        <!-- === component image === -->
        <div class="col-lg-6 d-flex justify-content-center">
            <img src="/components/image/illustrasi_gambar-1.jpg" class="img-fluid" alt="Hero Image">
        </div>
    </div>
</section>