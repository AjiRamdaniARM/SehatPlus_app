<div id="wrapper">
        <!-- ==== Content Wrapper ==== -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- ==== Main Content ==== -->
            <div id="content">
                <!-- ==== Begin Page Content ==== -->
                <div class="container-fluid">
                    <!-- ==== Alert ==== -->
                    <?php if (session()->has('success')) : ?>
                            <div class="alert alert-success">
                                <?php 
                                $success = session('success');
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
                    <!-- ==== Page Heading ==== -->
                    <h1 class="h3 mb-2 text-gray-800">Manajemen Data Obat</h1>
                    <p class="mb-4">Sistem ini menyediakan fitur untuk mengelola data obat secara efisien. Anda dapat menambahkan, mengedit, menghapus, dan mencari data obat. Untuk petunjuk lebih lanjut tentang penggunaan fitur ini, silakan lihat <a target="_blank" href="https://datatables.net">dokumentasi DataTables</a>.</p>
                    <!-- ==== Card ==== -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tabel obat</h6>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 d-flex" style="gap: 10px;">
                               <!-- ==== Button Tambah Data ==== -->
                               <?php if (in_array($_SESSION['akses'], ['admin', 'owner'])) : ?>
                                    <a href="<?= base_url('tambah_obat') ?>" class="btn btn-primary">Tambah Data</a>
                                <?php endif; ?>
                                <div class="">
                                    <form method="GET" class="flex items-center gap-2">
                                        <input 
                                            type="search" 
                                            name="keywordObat" 
                                            value="<?= esc($_GET['keywordObat'] ?? '') ?>" 
                                            placeholder="Cari..." 
                                            class="w-full px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        >
                                        <button type="submit" style="border: none;" class="px-4 py-1 bg-primary text-white rounded-lg hover:bg-blue-600">
                                            Cari
                                        </button>
                                    </form>
                                </div>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Obat</th>
                                            <th>Kategori</th>
                                            <th>Harga Pembelian Obat</th>
                                            <th>Harga Penjualan Obat</th>
                                            <th>Tanggal Kadaluarsa</th>
                                            <th>Stok Obat</th> 
                                            <th>Status Obat</th> 
                                            <th>Tipe Obat</th> 
                                            <th>Tanggal Masuk</th> 
                                            <th>Aksi</th> 
                                        </tr>
                                    </thead>
                                    <!-- ==== Body ==== -->
                                    <tbody>
                                        <!-- ==== Jika data obat tidak kosong ==== -->
                                        <?php if (!empty($obat)) : ?>
                                            <!-- ==== Looping data obat ==== -->
                                            <?php foreach ($obat as $index => $dataObats): ?>
                                                <tr>
                                                    <td><?= $startNumber++ ?></td>
                                                    <td><?= esc($dataObats['nama']) ?></td>
                                                    <td><?= esc($dataObats['nama_tipe']) ?></td>
                                                    <td><?= format_rupiah($dataObats['harga_pembelian']) ?></td>
                                                    <td><?= format_rupiah($dataObats['harga_penjualan']) ?></td>
                                                    <td><?= esc($dataObats['tanggak_kadaluarsa']) ?></td>
                                                    <td><?= esc($dataObats['stok']) ?></td>
                                                    <td>
                                                        <?php if ($dataObats['status'] == 'terima'): ?>
                                                            <span class="badge badge-success">Terima</span>
                                                        <?php elseif ($dataObats['status'] == 'tolak'): ?>
                                                            <span class="badge badge-danger">Ditolak</span>
                                                        <?php else: ?>
                                                            <span class="badge badge-warning">Proses</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= esc($dataObats['tipe_obat']) ?></td>
                                                    <td><?= tanggal_indo($dataObats['dibuat_di']) ?></td>
                                                    <td>
                                                        <!-- ==== Button Edit ==== -->
                                                        <div class="btn-group" role="group">
                                                            <?php if (in_array($_SESSION['akses'], ['admin', 'owner'])) : ?>
                                                                <a href="<?= base_url('edit_obat/' . $dataObats['kode_obat']) ?>" 
                                                                   class="btn btn-warning btn-sm mr-1" 
                                                                   data-toggle="tooltip" 
                                                                   title="Edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <form action="<?= base_url('delete_data_obat/' . $dataObats['kode_obat']) ?>" 
                                                                      method="POST" 
                                                                      class="d-inline" 
                                                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus obat <?= esc($dataObats['nama']) ?>?');">
                                                                    <?= csrf_field() ?>
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="submit" 
                                                                            class="btn btn-danger btn-sm"
                                                                            title="Hapus">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="11" class="text-center">
                                                    <?php if (!empty($keyword)) : ?>
                                                        Data obat dengan kata kunci "<?= esc($keyword) ?>" tidak ditemukan.
                                                    <?php else : ?>
                                                        Data obat belum ada.
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <!-- Pagination -->
                                <div class="mt-3">
                                    <?= $pager->links('default', 'bootstrap_pagination') ?>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- ==== End of container-fluid ==== -->

            </div>
            <!-- ==== End of Main Content ==== -->

        </div>
        <!-- ==== End of Content Wrapper ==== -->

    </div>