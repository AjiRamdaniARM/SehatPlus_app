<?php

namespace App\Controllers\Admin\data_obat; // Sesuaikan dengan subfolder
use App\Controllers\BaseController; // Pastikan untuk mengimpor BaseController


class DtoController extends BaseController
{
    public function index()
    {
        return view('admin/pages/DataObat'); // Sesuaikan dengan lokasi view
    }

    public function create() {
        return view('admin/components/data_obat/form_create'); 
    }
}
