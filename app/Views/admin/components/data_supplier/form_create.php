<!DOCTYPE html>
<html lang="en">

<head>
    <!-- === component header === -->
    <?= view('admin/components/header_admin') ?>
    <!-- === end component header ==== -->
    <title>Tambah data supplier</title>
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
                        <h4 class="mb-4">Form Input Supplier</h4>
                        <form action="<?= base_url('store_data_supplier') ?>" method="POST">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label for="nama_penyedia" class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" id="nama_penyedia" name="nama_penyedia" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_telp" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <input type="text" class="form-control" id="catatan" name="catatan">
                                </div>
                            </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                    </div>
                    </div>
            </div>
               
                <!-- === /.container-fluid === -->

            </div>
            <!--  === End of Main Content === -->

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