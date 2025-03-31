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
        
        // Ambil input dari form
        $nama = $this->request->getPost('nama');
        $kata_sandi = $this->request->getPost('kata_sandi');
    
        // Ambil data pengguna berdasarkan nama
        $data = $penggunaModel->where('nama', $nama)->first();
    
        if ($data) {
            // Periksa apakah kata sandi sudah di-hash
            if (password_verify($kata_sandi, $data['kata_sandi'])) {
                $ses_data = [
                    'id_pengguna' => $data['id_pengguna'],
                    'nama' => $data['nama'],
                    'akses' => $data['akses'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
    
                // Debugging: Periksa apakah session benar-benar tersimpan
                if ($session->has('logged_in')) {
                    return redirect()->to(base_url('dashboard'));
                } else {
                    $session->setFlashdata('msg', 'Session tidak tersimpan.');
                    return redirect()->to(base_url('login/admin'));
                }
            } else {
                $session->setFlashdata('msg', 'Password salah.');
                return redirect()->to(base_url('login/admin'));
            }
        } else {
            $session->setFlashdata('msg', 'Nama pengguna tidak ditemukan.');
            return redirect()->to(base_url('login/admin'));
        }
    }

    public function logout()
    {
        // Hapus session login
        session()->remove('logged_in');
        session()->remove('akses');
        session()->remove('nama');
        
        // Redirect ke halaman login atau halaman lain
        session()->setFlashdata('msgSuccess', 'Anda berhasil logout!');
        return redirect()->to('/');
    }
    
    
    
}
