<!DOCTYPE html>
<html lang="en">

<head>
    <!-- === component header === -->
    <?= view('admin/components/header_admin') ?>
    <!-- === end component header ==== -->
    <title>Tambah data obat</title>
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
               <!-- Contact 1 - Bootstrap Brain Component -->
                <div class="container my-5">
                    <div class="card shadow rounded-4">
                    <div class="card-body">
                        <h4 class="mb-4">Form Input Obat</h4>
                        <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="nama_obat" class="form-label">Nama Obat</label>
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" required>
                        </div>

                        <div class="mb-3">
                            <label for="kategori_obat" class="form-label">Kategori Obat</label>
                            <input type="text" class="form-control" id="kategori_obat" name="kategori_obat" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="harga_beli" class="form-label">Harga Pembelian</label>
                            <input type="number" class="form-control" id="harga_beli" name="harga_beli" required>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="harga_jual" class="form-label">Harga Jual</label>
                            <input type="number" class="form-control" id="harga_jual" name="harga_jual" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="tanggal_kedaluwarsa" class="form-label">Tanggal Kedaluwarsa</label>
                            <input type="date" class="form-control" id="tanggal_kedaluwarsa" name="tanggal_kedaluwarsa" required>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" required>
                            </div>asasasassnaknaksnas
                        </div>

                        <div class="supplier-container">
                            <label for="supplier">Pilih tipe obat</label>
                            <select id="supplier" name="tipe_obat" required>
                                <option value="">Pilih Tipe Obat</option>
                                <option value="tablet">Tablet</option>
                                <option value="kapsul">Kapsul</option>
                                <option value="sirup">Sirup</option>
                                <option value="krim">Salep/Krim</option>
                                <option value="injeksi">Injeksi</option>
                                <option value="tetes">Tetes Mata/Telinga</option>
                            </select>
                        </div>

                        <div class="supplier-container">
                            <label for="supplier">Pilih Supplier</label>
                            <select id="supplier" name="supplier" required>
                                <option value="">Pilih Supplier</option>
                                <option value="1">PT. Sehat Selalu</option>
                                <option value="2">CV. Obat Makmur</option>
                                <option value="3">PT. Farma Medika</option>
                            </select>
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