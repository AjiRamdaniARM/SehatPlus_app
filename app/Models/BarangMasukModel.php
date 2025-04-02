<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $table = 'barang_masuk';

    protected $primaryKey = 'id_barang_masuk ';
    protected $allowedFields = ['id_penyedia', 'id_pengguna ', 'id_produk_obat','dibuat_di','diperbarui_di'];

    
}
