<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    // ==== Table ====
    protected $table = 'obat';
    protected $primaryKey = 'kode_obat';
    protected $useAutoIncrement = false;
    protected $allowedFields = [
        'kode_obat',
        'nama',
        'id_kategori_obat',
        'harga_pembelian',
        'harga_penjualan',
        'tanggak_kadaluarsa',
        'stok',
        'tipe_obat',
        'status',
        'dibuat_di',
        'diperbarui_di'
    ];

    // ==== Dates ====
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'dibuat_di';
    protected $updatedField  = 'diperbarui_di';

    // ==== Validation ====
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    // ==== Callbacks ====
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    // ==== Get data obat dengan kategori ====
    public function getObatWithKategori()
    {
        return $this->select('obat.*, kategori_obat.nama_tipe')
                    ->join('kategori_obat', 'kategori_obat.id_kategori_obat = obat.id_kategori_obat')
                    ->findAll();
    }
}
