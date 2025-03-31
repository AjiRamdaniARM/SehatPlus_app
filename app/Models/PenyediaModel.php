<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyediaModel extends Model
{
    protected $table = 'penyedia';

    protected $primaryKey = 'id_penyedia ';
    protected $allowedFields = ['nama_penyedia', 'no_telp','alamat','catatan','dibuat_di', 'diperbarui_di'];

    public function getPaginatedData($perPage, $keyword = null)
    {
        $query = $this;

        if ($keyword) {
            $query = $query->like('nama_penyedia', $keyword)
                           ->orLike('no_telp', $keyword)
                           ->orLike('alamat', $keyword);
        }

        return $query->paginate($perPage);
    }
}



