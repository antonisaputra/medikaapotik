<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Kontroller list kategori
 */
class Kategories extends MY_Controller
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

    public function index($page = null)
    {
        $this->session->unset_userdata('keyword');

        $data['title']              = 'Apotik Medika - List Kategori';
        $data['breadcrumb_title']   = 'List Kategori';
        $data['breadcrumb_path']    = 'Manajemen Barang / List Kategori';
        $data['content']            = $this->kategories->paginate($page)->get();
        $data['total_rows']         = $this->kategories->count();
        $data['pagination']         = $this->kategories->makePagination(base_url('kategories'), 2, $data['total_rows']);
        $data['page']               = 'pages/kategories/index';

        $this->view($data);
    }

    /**
     * Mencari berdasarkan nama Kategori
     */
    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        }

        $keyword = $this->session->userdata('keyword');

        if (empty($keyword)) {
            redirect(base_url('kategories'));
        }

        $keyword = $this->session->userdata('keyword');

        $data['title']              = 'Apotik Medika - Cari Kategori';
        $data['breadcrumb_title']   = "Daftar Kategori";
        $data['breadcrumb_path']    = "Daftar Kategori / Cari / $keyword";
        $data['content']            = $this->kategories->like('nama_kategori', $keyword)
            ->paginate($page)
            ->get();
        $data['total_rows']         = $this->kategories->like('nama_kategori', $keyword)
            ->count();
        $data['pagination']         = $this->kategories->makePagination(base_url('kategories/search'), 3, $data['total_rows']);
        $data['page']               = 'pages/kategories/index';

        $this->view($data);
    }

    /**
     * Edit data Kategori oleh admin
     */
    public function edit($id)
    {
        if ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata('error', 'Akses edit ditolak!');
            redirect(base_url('home'));
        }

        $data['content'] = $this->kategories->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf data tidak ditemukan');
            redirect(base_url('kategories'));
        }

        if (!$_POST) {
            $data['input'] = $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!$this->kategories->validate()) {
            $data['title']              = 'Apotik Medika - Edit Kategori';
            $data['page']               = 'pages/kategories/edit';
            $data['breadcrumb_title']   = 'Edit Kategori';
            $data['breadcrumb_path']    = "Manajemen Kategori / Edit Kategori / " . $data['input']->nama_kategori;

            return $this->view($data);
        }

        if ($this->kategories->where('id', $id)->update($data['input'])) {   // Update data
            $this->session->set_flashdata('success', 'Data Kategori berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Oops! Terjadi suatu kesalahan');
        }

        redirect(base_url('kategories'));
    }

    public function unique_Kategori()
    {
        $nama = $this->input->post('nama_kategori');
        $id   = $this->input->post('id');
        $kategori = $this->kategories->where('nama_kategori', $nama)->first();

        if ($kategori) {
            if ($id == $kategori->id) return true;
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_Kategori', '%s sudah digunakan');
            return false;
        }

        return true;
    }
    
    public function hapus($id)
    {
        if($this->db->where('id', $id)->delete('kategori')){
            $this->session->set_flashdata('success', 'Kategori Berhasil Dihapus');
        }
        else {
        $this->session->set_flashdata('error', 'Oops, terjadi suatu kesalahan');
        }
        redirect(base_url('kategories'));
    }
}
