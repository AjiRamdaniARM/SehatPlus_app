<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'pengguna';
    public function rules()
	{
		return [
			[
				'field' => 'nama',
				'label' => 'nama',
				'rules' => 'required'
			],
			[
				'field' => 'kata_sandi',
				'label' => 'kata_sandi',
				'rules' => 'required|max_length[255]'
			]
		];
	}

    protected $primaryKey = 'id_pengguna';
    protected $allowedFields = ['nama', 'kata_sandi', 'akses','dibuat_di','diperbarui_di'];

    
}
