<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inputs_model extends MY_Model 
{
    public $table = 'barang_masuk';

    public function keluar_detail(){
        return $this->db->query("SELECT barang_masuk.id, barang_masuk.id_user, barang_masuk.waktu, barang_masuk.total_harga, barang_masuk_detail.id_barang, barang_masuk_detail.qty FROM barang_masuk_detail JOIN barang_masuk WHERE barang_masuk_detail.id_barang_masuk=barang_masuk.id")->result();
    }
}

/* End of file Inputs_model.php */
