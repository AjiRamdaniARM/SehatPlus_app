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
        $data['penyedia'] = $supplierModel->findAll();
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
}
