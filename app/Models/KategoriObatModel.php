<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriObatModel extends Model
{
    protected $table = 'kategori_obat';

    protected $primaryKey = 'id_kategori_obat';
    protected $allowedFields = ['nama_tipe', 'deksripsi','dibuat_di', 'diperbarui_di'];
}



