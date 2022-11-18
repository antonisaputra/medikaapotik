<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller Dashboard
 */
class Home extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        
        $is_login = $this->session->userdata('is_login');

        if (!$is_login) {
            $this->session->set_flashdata('warning', 'Anda belum login');
            redirect(base_url('login'));
            return;
        }
    }

    public function index()
    {
        $nama = $this->session->userdata('nama');

        $data['title']              = 'Apotik Medika - Dashboard';
        $data['breadcrumb_title']   = "Halo $nama 😊";
        $data['breadcrumb_path']    = 'Home / Dashboard';
        $data['barang_masuk']       = $this->home->select([
                                        'barang_masuk.id', 'user.nama', 
                                        'barang_masuk.waktu'
                                    ])
                                    ->join('user')
                                    ->orderBy('barang_masuk.waktu', 'DESC')
                                    ->limit(5)
                                    ->get();
        $this->home->table          = "barang_keluar";
        $data['barang_keluar']      = $this->home->select([
                                        'barang_keluar.id', 'user.nama', 
                                        'barang_keluar.waktu'
                                    ])
                                    ->join('user')
                                    ->orderBy('barang_keluar.waktu', 'DESC')
                                    ->limit(5)
                                    ->get();
        $data['page']               = 'pages/home/index';

        $bulan = ['januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember'];

        for($i = 0; $i < 12; $i++ ){
            $mount = $i + 1;
            
            $namaBulan = $bulan[$i];

            $data[$namaBulan] = $this->db->query("SELECT * FROM barang_keluar WHERE month(waktu) = $mount")->num_rows();

        }
        
        $this->view($data);
    }
}
