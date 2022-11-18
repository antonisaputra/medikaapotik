<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller Keranjang Keluar
 */
class Cartout extends MY_Controller
{
    private $id_user;

    public function __construct()
    {
        parent::__construct();

        $is_login       = $this->session->userdata('is_login');
        $this->id_user  = $this->session->userdata('id_user');

        if (!$is_login) {
            $this->session->set_flashdata('warning', 'Anda belum login');
            redirect(base_url('login'));
            return;
        }
    }

    public function index()
    {
        $this->session->unset_userdata('keyword');

        $data['title']              = 'Apotik Medika - Keranjang Keluar';
        $data['breadcrumb_title']   = "Keranjang Keluar";
        $data['breadcrumb_path']    = 'Barang Keluar / Keranjang Keluar';
        $data['page']               = 'pages/cartout/index';
        $data['content']            = $this->cartout->select([
            'barang.id AS id_barang', 'barang.nama', 'barang.harga',
            'barang.id_satuan', 'keranjang_keluar.id AS id',
            'keranjang_keluar.qty AS qty_barang_keluar'
        ])
            ->where('keranjang_keluar.id_user', $this->id_user)
            ->join('barang')
            ->get();

        $this->view($data);
    }

    /**
     * Menampung barang yang akan dikurangi kuantitasnya
     */
    public function add()
    {
        if (!$_POST || $this->input->post('qty_keluar') < 1) {
            $this->session->set_flashdata('error', 'Kuantitas tidak boleh kosong');
            redirect(base_url('items'));
            return;
        }

        $id_barang =  $this->input->post('id_barang');

        $barang = $this->db->get('barang',['id_barang' => $id_barang])->row_array();

        $data = [
            'id_user' => $this->id_user,
            'id_barang' => $this->input->post('id_barang'),
            'qty' => $this->input->post('qty_keluar'),
            'subtotal' => $this->input->post('qty_keluar') * $barang['harga'],
        ];

        $this->db->insert('keranjang_keluar', $data);

        redirect('Cartout');

    }

    /**
     * Update kuantitas di keranjang belanja
     */
    public function update()
    {
        if (!$_POST || $this->input->post('qty_barang_keluar') < 1) {
            $this->session->set_flashdata('error', 'Kuantitas tidak boleh kosong');
            redirect(base_url('cartout'));
        }

        $id = $this->input->post('id');

        $id_barang =  $this->input->post('id_barang');
        $barang = $this->db->get('barang',['id_barang' => $id_barang])->row_array();

        $data = [
            'id_user' => $this->id_user,
            'id_barang' => $this->input->post('id_barang'),
            'qty' => $this->input->post('qty_barang_keluar'),
            'subtotal' => $this->input->post('qty_barang_keluar') * $barang['harga'],
        ];

        $this->db->where('id', $id);
        $this->db->update('keranjang_keluar', $data);

        $this->session->set_flashdata('success','Kuantitas Berhasil Di Ubah');

        redirect('Cartout');
        
    }

    /**
     * Delete suatu cart di halaman cart
     */
    public function delete()
    {
        if (!$_POST) {
            // Jika diakses tidak dengan menggunakan method post, kembalikan ke home
            $this->session->set_flashdata('error', 'Akses pengeluaran barang dari keranjang ditolak!');
            redirect(base_url('home'));
        }

        $id = $this->input->post('id');

        if (!$this->cartout->where('id', $id)->first()) {  // Jika cart tidak ditemukan
            $this->session->set_flashdata('warning', 'Maaf data tidak ditemukan');
            redirect(base_url('cartout'));
        }

        if ($this->cartout->where('id', $id)->delete()) {  // Jika penghapusan cart berhasil
            $this->session->set_flashdata('success', '1 Barang berhasil dikeluarkan dari keranjang');
        } else {
            $this->session->set_flashdata('error', 'Oops, terjadi suatu kesalahan');
        }

        redirect(base_url('cartout'));
    }

    /**
     * Menghapus seluruh isi keranjang
     */
    public function drop()
    {
        if (!$_POST) {
            $this->session->set_flashdata('error', 'Aksi ditolak');
            redirect(base_url('cartout'));
        }

        if ($this->cartout->where('id_user', $this->id_user)->count() < 1) {
            $this->session->set_flashdata('warning', 'Tidak ada barang di dalam keranjang');
            redirect(base_url('cartout'));
        }

        // Hapus seluruh isi keranjang dari user
        $this->cartout->where('id_user', $this->id_user)->delete();

        // Jika tabel keranjang dari seluruh user kosong, reset autoincrement id keranjang
        if ($this->cartout->count() < 1) {
            $this->cartout->resetIndex();
        }

        $this->session->set_flashdata('success', 'Keranjang keluar anda telah dibersihkan');

        redirect(base_url('cartout'));
    }

    /**
     * Fungsi tombol checkout
     * Fungsi ini memasukan informasi pengeluaran barang ke tabel 'barang_keluar' 
     * dan memindahkan list keranjang keluar ke tabel 'barang_keluar_detail'
     */
    public function checkout()
    {
        if (!isset($this->id_user)) {
            $this->session->set_flashdata('error', 'Akses checkout ditolak!');
            redirect(base_url('home'));
        }else{

        }

        $id = $this->input->post('id');

        $barangUser = $this->db->get_where('keranjang_keluar',['id_user' => $this->id_user])->result_array();

        if($barangUser){
            $idBarangTerakhir = $this->db->query('SELECT * FROM barang_keluar_detail ORDER BY id DESC LIMIT 1 ')->row_array();
            foreach($barangUser as $barang){
                $data_keluar_detail = [
                    'id_barang_keluar' => $idBarangTerakhir['id'] + 2,
                    'id_barang' => $barang['id_barang'],
                    'qty' => $barang['qty'],
                    'subtotal' => $barang['subtotal'],
                ];

                $this->db->insert('barang_keluar_detail', $data_keluar_detail);

                $data_keluar = [
                    'id_user' => $this->id_user,
                    'total_harga' =>  $barang['subtotal'],
                ];

                $this->db->insert('barang_keluar', $data_keluar);

                $this->db->where('id', $id);
                $this->db->delete('keranjang_keluar');
            }

            $this->session->set_flashdata('success','Data Berhasil Tambahkan');
            redirect('Cartout');
        }else{
            $this->session->set_flashdata('error','Data Tidak Di Temukan');
        }
    }
}
