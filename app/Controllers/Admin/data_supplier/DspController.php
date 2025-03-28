<?php

namespace App\Controllers\Admin\data_supplier; // Sesuaikan dengan subfolder
use App\Controllers\BaseController; // Pastikan untuk mengimpor BaseController


class DspController extends BaseController
{
    public function index()
    {
        return view('admin/pages/DataSupplier'); // Sesuaikan dengan lokasi view
    }
}
