<?php

namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table = 'obat';

    protected $primaryKey = 'id_produk_obat ';
    protected $allowedFields = ['kode_obat','nama', 'id_kategori_obat ', 'harga_pembelian','harga_penjualan','tanggak_kadaluarsa','stok','dibuat_di','diperbarui_di','id_barang','tipe_obat'];

    
}
