<?php

namespace App\Controllers\Auth; // Sesuaikan dengan subfolder

use App\Controllers\BaseController; // Pastikan untuk mengimpor BaseController

class Login extends BaseController
{
    public function index()
    {
        return view('auth/pages/login'); // Sesuaikan dengan lokasi view
    }

    public function indexAkses() {
        return view('auth/pages/akses'); // Sesuaikan dengan lokasi view
    }
}
