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

    public function storeObat() {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_obat' => 'required|min_length[3]',
            'kategori_obat' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'tanggal_kedaluwarsa' => 'required|date',
            'stok' => 'required|numeric|min_length[1]',
            'tipe_obat' => 'required',
            'supplier' => 'required',
        ]);

        $id_pengguna = session()->get('id_pengguna'); // Mengambil ID pengguna dari session


        if(!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $DataObatModel = new ObatModel();
        $BarangMasukModel = new BarangMasukModel();
        $DataObatModel -> insert([
            'nama' => $this->request->getPost('nama_obat'),
            'id_kategori_obat' => $this->request->getPost('kategori_obat'),
            'harga_pembelian' => $this->request->getPost('harga_beli'),
            'harga_penjualan' => $this->request->getPost('harga_jual'),
            'tanggak_kadaluarsa' => $this->request->getPost('tanggal_kedaluwarsa'),
            'stok' => $this->request->getPost('stok'),
            'tipe_obat' => $this->request->getPost('tipe_obat'),
            'status' => 'proses',
        ]);
        $BarangMasukModel->insert([
            'id_penyedia' => $this->request->getPost('supplier'),
            'id_pengguna' => $id_pengguna,
            'id_produk_obat' => $id_pengguna,
        ]);
    }
}
