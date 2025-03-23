<?php

namespace App\Controllers\Admin; // Sesuaikan dengan subfolder

use App\Controllers\BaseController; // Pastikan untuk mengimpor BaseController

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/pages/dashboard'); // Sesuaikan dengan lokasi view
    }
}
