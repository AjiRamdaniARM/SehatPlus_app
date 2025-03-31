<nav class="navbar navbar-expand-lg">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPillsExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><img src="http://kemkes.go.id/app_asset/file_content_download/170619174165b26b7d195019.13538774.png" width="100" /></a>
    <div class="collapse navbar-collapse" id="navbarPillsExample">
      <ul class="navbar-nav navbar-nav-pills">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/'); ?>">Beranda</a>
        </li>
        <li class="nav-item">
          <?php $session = session(); ?>
          <?php if($session->get('akses')): ?>
            <a class="nav-link" href="<?= base_url('dashboard') ?>"> <?= $_SESSION['akses']; ?></a>
          <?php else: ?>
            <a class="nav-link" href="<?= base_url('aksesLogin'); ?>">Masuk</a>
          <?php endif; ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Informasi</a>
        </li>
      </ul>
    </div>
  </div>
</nav>