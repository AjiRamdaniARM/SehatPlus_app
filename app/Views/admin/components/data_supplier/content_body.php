<div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php if (session()->has('msgSuccess')) : ?>
                        <div class="alert alert-success">
                            <?php 
                            $success = session('msgSuccess');
                            if (is_array($success)) : ?>
                                <ul>
                                    <?php foreach ($success as $msg) : ?>
                                        <li><?= esc($msg) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else : ?>
                                <?= esc($success) ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pengelolaan Data Supplier</h1>
                    <p class="mb-4">Sistem ini menyediakan fitur untuk mengelola data supplier secara efisien. Anda dapat menambahkan, mengedit, menghapus, dan mencari data supplier. Untuk petunjuk lebih lanjut tentang penggunaan fitur ini, silakan lihat <a target="_blank" href="https://datatables.net">dokumentasi DataTables</a>.</p>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tabel supplier</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <a href="<?= base_url('tambah_supplier') ?>" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Supplier</th>
                                            <th>Telepone</th>
                                            <th>Alamat</th>
                                            <th>Catatan</th>
                                            <th>Tanggal Masuk </th>
                                            <th>Aksi</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($penyedia)) : ?>
                                            <?php $no = 1; ?>
                                            <?php foreach ($penyedia as $supplier) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= esc($supplier['nama_penyedia']) ?></td>
                                                    <td><?= esc($supplier['no_telp']) ?></td>
                                                    <td><?= esc($supplier['alamat']) ?></td>
                                                    <td><?= esc($supplier['catatan']) ?></td>
                                                    <td><?= tanggal_indo($supplier['dibuat_di']) ?></td>
                                                    <td>
                                                        <!-- Tombol Edit -->
                                                        <a class="btn btn-warning btn-sm" href="<?= base_url('edit_supplier/'. $supplier['nama_penyedia']) ?>">
                                                            Edit
                                                        </a>
                                                        <form action="<?= base_url('hapus_penyedia/' . $supplier['id_penyedia']) ?>" method="post" style="display:inline;">
                                                            <?= csrf_field() ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="6" class="text-center">Data supplier belum ada.</td>
                                            </tr>
                                        <?php endif; ?>
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