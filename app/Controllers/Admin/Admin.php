<?php

namespace App\Controllers\Admin; // Sesuaikan dengan subfolder

use App\Controllers\BaseController; // Pastikan untuk mengimpor BaseController
use App\Models\ObatModel;

class Admin extends BaseController
{
    public function index()
    {
        // === variable get count === //
        $obatModel = new ObatModel();
        $totalObat = $obatModel->countAll();
        return view('admin/pages/dashboard',['totalObat' => $totalObat]); // Sesuaikan dengan lokasi view
    }
}
