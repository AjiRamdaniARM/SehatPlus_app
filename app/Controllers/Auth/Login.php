<?php

namespace App\Controllers\Auth; // Sesuaikan dengan subfolder

use App\Controllers\BaseController; // Pastikan untuk mengimpor BaseController

class Login extends BaseController
{

    // === controller page login admin === //
    public function index()
    {
        return view('auth/pages/login_admin'); 
    }

    // === controller page login kasir === //
    public function loginKasir() {
        return view('auth/pages/login_kasir'); 
    }

    // === controller page login owner === //
    public function loginOwner() {
        return view('auth/pages/login_owner'); 
    }


    // === controller page hak akses login === //
    public function indexAkses() {
        return view('auth/pages/akses'); 
    }

    
    // === controller page hak akses login === //
    public function passwordHash() {
        return view('auth/pages/passwordHash'); 
    }

}
