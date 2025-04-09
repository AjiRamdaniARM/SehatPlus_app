<?php

namespace App\Controllers\Admin\data_obat; // Sesuaikan dengan subfolder
use App\Controllers\BaseController; // Pastikan untuk mengimpor BaseController
use App\Models\BarangMasukModel;
use App\Models\KategoriObatModel;
use App\Models\ObatModel;
use App\Models\PenyediaModel;

class DtoController extends BaseController
{
    public function index()
    {
        return view('admin/pages/DataObat'); // Sesuaikan dengan lokasi view
    }

    public function create() {
        $penyediaModel = new PenyediaModel();
        $kategoriObatModel = new KategoriObatModel();
        $getPenyediaModel = $penyediaModel->findAll();
        $getKategoriModel = $kategoriObatModel->findAll();
        return view('admin/components/data_obat/form_create', ['penyedia' => $getPenyediaModel, 'kategoriObat' => $getKategoriModel]); 
    }

    public function storeObat()
    {
        $validation = \Config\Services::validation();
    
        $validation->setRules([
            'nama_obat' => 'required|min_length[3]',
            'kategori_obat' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'tanggal_kedaluwarsa' => 'required|valid_date',
            'stok' => 'required|numeric',
            'tipe_obat' => 'required',
            'supplier' => 'required',
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $session = session();
        $id_pengguna = $session->get('id_pengguna');
    
        $DataObatModel = new ObatModel();
        $BarangMasukModel = new BarangMasukModel();
    
        // Ambil id_produk_obat terakhir
        $last = $DataObatModel->orderBy('id_produk_obat', 'DESC')->first();
    
        if ($last) {
            // Ambil angka dari format contoh: obatn001 -> 001
            $lastNumber = (int)substr($last['id_produk_obat'], 5);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
    
        // Format ID baru: obatn001, obatn002, ...
        $kode_obat = 'obatn' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    
        // Insert ke tabel obat
        $DataObatModel->insert([
            'kode_obat'     => $kode_obat,
            'nama'               => $this->request->getPost('nama_obat'),
            'id_kategori_obat'   => $this->request->getPost('kategori_obat'),
            'harga_pembelian'    => $this->request->getPost('harga_beli'),
            'harga_penjualan'    => $this->request->getPost('harga_jual'),
            'tanggak_kadaluarsa' => $this->request->getPost('tanggal_kedaluwarsa'),
            'stok'               => $this->request->getPost('stok'),
            'tipe_obat'          => $this->request->getPost('tipe_obat'),
            'status'             => 'proses',
        ]);
    
        // Insert ke tabel barang masuk
        $BarangMasukModel->insert([
            'id_penyedia'     => $this->request->getPost('supplier'),
            'id_pengguna'     => $id_pengguna,
            'kode_obat'  => $kode_obat,
        ]);
    
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Data obat berhasil disimpan.',
            'data' => [
                'id_produk_obat' => $kode_obat,
                'nama' => $this->request->getPost('nama_obat'),
                'id_pengguna' => $id_pengguna,
                // Tambahkan data lain jika perlu
            ]
        ]);
        ;
    }
}
