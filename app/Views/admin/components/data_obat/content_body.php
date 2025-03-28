<div id="wrapper">

    
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Manajemen Data Obat</h1>
                    <p class="mb-4">Sistem ini menyediakan fitur untuk mengelola data obat secara efisien. Anda dapat menambahkan, mengedit, menghapus, dan mencari data obat. Untuk petunjuk lebih lanjut tentang penggunaan fitur ini, silakan lihat <a target="_blank" href="https://datatables.net">dokumentasi DataTables</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tabel obat</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <?php if (in_array($_SESSION['akses'], ['admin', 'owner'])) : ?>
                                    <a href="<?= base_url('tambah_obat') ?>" class="btn btn-primary">Tambah Data</a>
                                <?php endif; ?>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                            <th>Aksi</th> <!-- Tambahan -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm">View</a>
                                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Delete</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>