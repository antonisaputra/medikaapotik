<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Outputs_model extends MY_Model 
{
    public $table = 'barang_keluar';

    public function keluar_barang(){
        return $this->db->query("SELECT barang_keluar.id, barang_keluar.id_user, barang_keluar.waktu, barang_keluar.total_harga, barang_keluar_detail.id_barang, barang_keluar_detail.qty FROM barang_keluar_detail JOIN barang_keluar WHERE barang_keluar_detail.id_barang_keluar=barang_keluar.id")->result();
    }
}

/* End of file Outputs_model.php */
