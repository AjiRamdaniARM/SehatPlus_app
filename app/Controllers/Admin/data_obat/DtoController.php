<?php

namespace App\Controllers\Admin\data_obat; // ==== Sesuaikan dengan subfolder ====
use App\Controllers\BaseController; // ==== Pastikan untuk mengimpor BaseController ====
use App\Models\BarangMasukModel;
use App\Models\KategoriObatModel;
use App\Models\ObatModel;
use App\Models\PenyediaModel;

class DtoController extends BaseController
{
    public function __construct()
    {
        helper('currency');
    }

    // ==== Controller index ====
    public function index()
    {
        // ==== Model ====
        $DataObatModel = new ObatModel();
        $getObatModel = $DataObatModel->getObatWithKategori();
        return view('admin/pages/DataObat', ['dataObat' => $getObatModel]);
    }

    // ==== Controller create ====
    public function create() {
        $penyediaModel = new PenyediaModel();
        $kategoriObatModel = new KategoriObatModel();
        $getPenyediaModel = $penyediaModel->findAll();
        $getKategoriModel = $kategoriObatModel->findAll();
        return view('admin/components/data_obat/form_create', ['penyedia' => $getPenyediaModel, 'kategoriObat' => $getKategoriModel]); 
    }

    public function storeObat()
    {
        // ==== Validasi input ====
        try {
            if (!$this->validateObatData()) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // ==== Get id pengguna ====
            $session = session();
            $id_pengguna = $session->get('id_pengguna');

            // ==== Model ====
            $DataObatModel = new ObatModel();
            $BarangMasukModel = new BarangMasukModel();

            // ==== Generate kode obat ====
            $kode_obat = $this->generateKodeObat($DataObatModel);

            // Insert ke tabel obat
            $DataObatModel->insert([
                'kode_obat'          => $kode_obat,
                'nama'               => $this->request->getPost('nama_obat'),
                'id_kategori_obat'   => $this->request->getPost('kategori_obat'),
                'harga_pembelian'    => $this->request->getPost('harga_beli'),
                'harga_penjualan'    => $this->request->getPost('harga_jual'),
                'tanggak_kadaluarsa' => $this->request->getPost('tanggal_kedaluwarsa'),
                'stok'               => $this->request->getPost('stok'),
                'tipe_obat'          => $this->request->getPost('tipe_obat'),
                'status'             => 'proses',
            ]);

            // ==== Insert ke tabel barang masuk ====
            $BarangMasukModel->insert([
                'id_penyedia'  => $this->request->getPost('supplier'),
                'id_pengguna'  => $id_pengguna,
                'kode_obat'    => $kode_obat,
            ]);

            // ==== Response ====
            return redirect()->route('data_obat')->with('success', 'Data obat berhasil disimpan.');

        } catch (\Exception $e) {
            log_message('error', '[DtoController::storeObat] Error: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat menyimpan data obat.'
            ])->setStatusCode(500);
        }
    }

    // === controller validasi input data obat === 
    private function validateObatData()
    {
        $validation = \Config\Services::validation();
    
        $validation->setRules([
            'nama_obat' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Nama obat harus diisi',
                    'min_length' => 'Nama obat minimal 3 karakter'
                ]
            ],
            'kategori_obat' => [
                'rules' => 'required',
                'errors' => ['required' => 'Kategori obat harus dipilih']
            ],
            'harga_beli' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga beli harus diisi',
                    'numeric' => 'Harga beli harus berupa angka'
                ]
            ],
            'harga_jual' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Harga jual harus diisi',
                    'numeric' => 'Harga jual harus berupa angka'
                ]
            ],
            'tanggal_kedaluwarsa' => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Tanggal kedaluwarsa harus diisi',
                    'valid_date' => 'Format tanggal tidak valid'
                ]
            ],
            'stok' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Stok harus diisi',
                    'numeric' => 'Stok harus berupa angka'
                ]
            ],
            'tipe_obat' => [
                'rules' => 'required',
                'errors' => ['required' => 'Tipe obat harus dipilih']
            ],
            'supplier' => [
                'rules' => 'required',
                'errors' => ['required' => 'Supplier harus dipilih']
            ],
        ]);

        return $validation->withRequest($this->request)->run();
    }

    // === controller generate kode obat === 
    private function generateKodeObat($DataObatModel)
    {
        $last = $DataObatModel->orderBy('id_produk_obat', 'DESC')->first();
        
        if ($last) {
            $lastNumber = (int)substr($last['kode_obat'], 5);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return 'obatn' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }

    // === Controller edit ===
    public function edit($kode_obat)
    {
        try {
            $obatModel = new ObatModel();
            $penyediaModel = new PenyediaModel();
            $kategoriObatModel = new KategoriObatModel();

            $data = [
                'obat' => $obatModel->where('kode_obat', $kode_obat)->first(),
                'penyedia' => $penyediaModel->findAll(),
                'kategoriObat' => $kategoriObatModel->findAll()
            ];

            if (!$data['obat']) {
                throw new \Exception('Data obat tidak ditemukan');
            }

            return view('admin/components/data_obat/form_edit', $data);
        } catch (\Exception $e) {
            return redirect()->route('data_obat')->with('error', $e->getMessage());
        }
    }

    // === Controller update ===
    public function update($kode_obat)
    {
        try {
            if (!$this->validateObatData()) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $obatModel = new ObatModel();
            
            $data = [
                'nama' => $this->request->getPost('nama_obat'),
                'id_kategori_obat' => $this->request->getPost('kategori_obat'),
                'harga_pembelian' => $this->request->getPost('harga_beli'),
                'harga_penjualan' => $this->request->getPost('harga_jual'),
                'tanggal_kadaluarsa' => $this->request->getPost('tanggal_kedaluwarsa'),
                'stok' => $this->request->getPost('stok'),
                'tipe_obat' => $this->request->getPost('tipe_obat'),
            ];

            $obatModel->where('kode_obat', $kode_obat)->set($data)->update();

            return redirect()->route('data_obat')->with('success', 'Data obat berhasil diperbarui');
        } catch (\Exception $e) {
            log_message('error', '[DtoController::update] Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data obat');
        }
    }

    // === Controller delete ===
    public function delete($kode_obat)
    {
        try {
            $obatModel = new ObatModel();
            
            $obat = $obatModel->where('kode_obat', $kode_obat)->first();
            if (!$obat) {
                throw new \Exception('Data obat tidak ditemukan');
            }

            // Soft delete dengan mengubah status
            $obatModel->where('kode_obat', $kode_obat)
                     ->set(['status' => 'nonaktif'])
                     ->update();

            return redirect()->route('data_obat')->with('success', 'Data obat berhasil dihapus');
        } catch (\Exception $e) {
            log_message('error', '[DtoController::delete] Error: ' . $e->getMessage());
            return redirect()->route('data_obat')->with('error', 'Terjadi kesalahan saat menghapus data obat');
        }
    }
}
