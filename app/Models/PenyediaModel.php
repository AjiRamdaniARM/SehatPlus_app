<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyediaModel extends Model
{
    protected $table = 'penyedia';

    protected $primaryKey = 'id_penyedia ';
    protected $allowedFields = ['nama_penyedia', 'no_telp','alamat','catatan','dibuat_di', 'diperbarui_di'];
}
