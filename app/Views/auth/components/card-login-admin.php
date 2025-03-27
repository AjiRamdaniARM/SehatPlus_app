<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card my-5">
                <form action="<?= base_url('AuthProses') ?>" method="POST" class="card-body p-lg-5" >
                    <?= csrf_field() ?>
                    <!-- === component breadcumb === -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= esc(base_url('/')) ?>">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="<?= esc(base_url('aksesLogin')) ?>">Masuk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admin</li>
                        </ol>
                    </nav>

                   <!-- === profile image === -->
                    <div class="text-center">
                        <img src="https://i.pinimg.com/736x/13/44/88/1344881a0b7b7b4a766621adbaafa811.jpg" 
                            class="img-fluid img-thumbnail rounded-circle my-3"
                            width="200px" alt="Foto Profil Admin">
                    </div>

                    <!-- === input role admin === -->
                    <input type="hidden" name="akses" value="admin">

                   <!-- === nama input === -->
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Anda" required>
                    </div>

                   <!-- === password input === -->
                    <div class="mb-3">
                        <input type="password" name="kata_sandi" class="form-control" id="kata_sandi" placeholder="Kata Sandi Anda" required>
                    </div>

                    <!-- === Submit Button === -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </div>

                    <!-- === Lupa Password === -->
                    <div class="text-center mt-3">
                        <small class="text-muted">Lupa Kata Sandi? 
                            <a href="#" class="fw-bold">Hubungi Admin</a>
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
