<!DOCTYPE html>
<html lang="en">

<head>
    <!-- === component header === -->
    <?= view('admin/components/header_admin') ?>
    <!-- === end component header ==== -->
    <title>Edit Data Obat</title>
</head>

<body id="page-top">

    <!-- === component wrapper === -->
    <div id="wrapper">
        <!-- === component sidebar === -->
        <?= view('admin/components/sidebar') ?>
        <!-- === end component sidebar ==== -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- === component header ==== -->
                <?= view('admin/components/header_bar') ?>
                <!-- === end component header ==== -->

                <!-- === Begin Page Content === -->
                <div class="container my-5">
                    <!-- === component alert error validation === -->
                    <?php if (session()->has('errors')) : ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php foreach (session('errors') as $error) : ?>
                                    <li><?= esc($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <!-- === component alert error validation === -->
                    
                    <div class="card shadow rounded-4">
                        <div class="card-body">
                            <h4 class="mb-4">Form Edit Data Obat</h4>
                            <form action="<?= base_url('update_data_obat/' . $obat['kode_obat']) ?>" method="POST">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama_obat" class="form-label">Nama Obat</label>
                                        <input type="text" 
                                               class="form-control" 
                                               id="nama_obat" 
                                               name="nama_obat" 
                                               value="<?= old('nama_obat', $obat['nama']) ?>" 
                                               required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="kategori_obat" class="form-label">Kategori Obat</label>
                                        <select class="form-control" id="kategori_obat" name="kategori_obat" required>
                                            <option value="">Pilih Kategori</option>
                                            <?php foreach ($kategoriObat as $kategori): ?>
                                                <option value="<?= $kategori['id_kategori_obat'] ?>" 
                                                        <?= ($kategori['id_kategori_obat'] == $obat['id_kategori_obat']) ? 'selected' : '' ?>>
                                                    <?= esc($kategori['nama_tipe']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="harga_beli" class="form-label">Harga Beli</label>
                                        <input type="number" 
                                               class="form-control" 
                                               id="harga_beli" 
                                               name="harga_beli" 
                                               value="<?= old('harga_beli', $obat['harga_pembelian']) ?>" 
                                               required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="harga_jual" class="form-label">Harga Jual</label>
                                        <input type="number" 
                                               class="form-control" 
                                               id="harga_jual" 
                                               name="harga_jual" 
                                               value="<?= old('harga_jual', $obat['harga_penjualan']) ?>" 
                                               required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_kedaluwarsa" class="form-label">Tanggal Kedaluwarsa</label>
                                        <input type="date" 
                                               class="form-control" 
                                               id="tanggal_kedaluwarsa" 
                                               name="tanggal_kedaluwarsa" 
                                               value="<?= old('tanggal_kedaluwarsa', $obat['tanggak_kadaluarsa']) ?>" 
                                               required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="stok" class="form-label">Stok</label>
                                        <input type="number" 
                                               class="form-control" 
                                               id="stok" 
                                               name="stok" 
                                               value="<?= old('stok', $obat['stok']) ?>" 
                                               required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tipe_obat" class="form-label">Tipe Obat</label>
                                        <select class="form-control" id="tipe_obat" name="tipe_obat" required>
                                            <option value="">Pilih Tipe</option>
                                            <option value="tablet" <?= ($obat['tipe_obat'] == 'tablet') ? 'selected' : '' ?>>Tablet</option>
                                            <option value="kapsul" <?= ($obat['tipe_obat'] == 'kapsul') ? 'selected' : '' ?>>Kapsul</option>
                                            <option value="sirup" <?= ($obat['tipe_obat'] == 'sirup') ? 'selected' : '' ?>>Sirup</option>
                                            <option value="salep" <?= ($obat['tipe_obat'] == 'salep') ? 'selected' : '' ?>>Salep</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="proses" <?= ($obat['status'] == 'proses') ? 'selected' : '' ?>>Proses</option>
                                            <option value="terima" <?= ($obat['status'] == 'terima') ? 'selected' : '' ?>>Terima</option>
                                            <option value="tolak" <?= ($obat['status'] == 'tolak') ? 'selected' : '' ?>>Tolak</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('data_obat') ?>" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- === /.container-fluid === -->

            </div>
            <!-- === End of Main Content === -->

            <!-- === Footer === -->
            <?= view('admin/components/footer') ?>
            <!-- === End of Footer === -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?= view('admin/components/script') ?>

</body>

</html> 