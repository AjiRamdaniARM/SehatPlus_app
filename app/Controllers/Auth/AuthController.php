<?php

namespace App\Controllers\Auth; // Sesuaikan dengan subfolder

use App\Controllers\BaseController; // Pastikan untuk mengimpor BaseController
use App\Models\PenggunaModel;

class AuthController extends BaseController
{
    public function MasukAdmin()
{
    $session = session();
    $penggunaModel = new PenggunaModel();

    $nama = $this->request->getPost('nama');
    $kata_sandi = $this->request->getPost('kata_sandi');

    $pengguna = $penggunaModel->where('nama', $nama)->first();

    if ($pengguna) {
        if (password_verify($kata_sandi, $pengguna['kata_sandi'])) {
            // Simpan data pengguna ke session
            $session->set([
                'id'    => $pengguna['id_pengguna'],
                'nama'  => $pengguna['nama'],
                'role'  => $pengguna['akses'],
                'logged_in' => true
            ]);

            return redirect()->to('dashboard'); // Arahkan ke dashboard
        } else {
            return redirect()->back()->with('error', 'Password salah!');
        }
    } else {
        return redirect()->back()->with('error', 'Email tidak ditemukan!');
    }
}
}
