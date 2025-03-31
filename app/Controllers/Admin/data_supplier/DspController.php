<?php

namespace App\Controllers\Admin\data_supplier; // Sesuaikan dengan subfolder
use App\Controllers\BaseController; 
use App\Models\PenyediaModel;// Pastikan untuk mengimpor BaseController
use Carbon\Carbon;

class DspController extends BaseController
{
    public function index()
    {
        helper('format');
        $supplierModel = new PenyediaModel();

        $keyword = $this->request->getGet('keyword');
        $perPage = 5; // Jumlah data per halaman
        $data = [
            'penyedia' => $supplierModel->getPaginatedData($perPage, $keyword),
            'pager' => $supplierModel->pager, // Untuk pagination
            'keyword' => $keyword // Mengembalikan nilai pencarian
        ];
       
        return view('admin/pages/DataSupplier',$data); // Sesuaikan dengan lokasi view
    }

    public function create() {
        return view('admin/components/data_supplier/form_create'); 
    }

    public function store() {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_penyedia' => 'required|alpha_space',
            'no_telp'      => 'required|numeric',
            'alamat'        => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('errors', $validation->getErrors());
        }

        $tglNow = Carbon::now();

        $penyediaModel = new PenyediaModel();
        $penyediaModel->insert([
            'nama_penyedia' => $this->request->getPost('nama_penyedia'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
            'catatan' => $this->request->getPost('catatan'),
            'dibuat_di' => $tglNow
        ]);

        return redirect()->to('data_supplier')->with('msgSuccess','Data Penyedia berhasil ditambahkan!');
    }

    // === controller edit === //
    public function edit($nama_penyedia) {
        $PenyediaModel = new PenyediaModel(); 
        $data = $PenyediaModel->where('nama_penyedia', $nama_penyedia)->first();
        return view('admin/components/data_supplier/edit',['data'=>$data]);
    }

    public function storeEdit($nama_penyedia) {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_penyedia' => 'required|alpha_space',
            'no_telp'      => 'required|numeric|min_length[12]|max_length[13]',
            'alamat'        => 'required',
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('errors', $validation->getErrors());
        }
    
        $tglNow = Carbon::now();
    
        // Ambil model
        $penyediaModel = new PenyediaModel();
    
        // Cari data penyedia berdasarkan nama
        $penyedia = $penyediaModel->where('nama_penyedia', $nama_penyedia)->asObject()->first(); 
    
        if (!$penyedia) {
            return redirect()->back()->with('errors', ['Data penyedia tidak ditemukan']);
        }
    
        // Lakukan update dengan ID
        $penyediaModel->update($penyedia->id_penyedia, [
            'nama_penyedia' => $this->request->getPost('nama_penyedia'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
            'catatan' => $this->request->getPost('catatan'),
            'dibuat_di' => $tglNow
        ]);
    
        return redirect()->to('data_supplier')->with('msgSuccess', 'Data Penyedia berhasil dirubah!');
    }




    public function delete($id_penyedia)
    {
        $penyediaModel = new PenyediaModel();
        
        // Cek apakah data ada
        if ($penyediaModel->find($id_penyedia)) {
            $penyediaModel->delete($id_penyedia);
            return redirect()->back()->with('msgSuccess', 'Data Penyedia berhasil dihapus!');
        }

        return redirect()->back()->with('msgError', 'Data tidak ditemukan!');
    }
}
