<?php
class Kategori extends MY_Controller
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
        if ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata('warning', 'Anda tidak memiliki akses');
            redirect(base_url('home'));
            return;
        }

        if (!$_POST) {
            $input = (object) $this->kategori->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->kategori->validate()) {
            $data['title'] = 'Apotik Medika - Tambah Kategori';
            $data['input'] = $input;
            $data['page'] = 'pages/kategori/index';
            $data['breadcrumb_title'] = 'Tambah Kategori Obat';
            $data['breadcrumb_path'] = 'Kategori / Tambah Kategori';

            return $this->view($data);
        }

        // Input data
        if ($this->kategori->run($input)) {
            $this->session->set_flashdata('success', 'Barang berhasil ditambahkan');
            redirect(base_url('kategori'));
        } else {
            $this->session->set_flashdata('error', 'Oops terjadi suatu kesalahan');
            redirect(base_url('kategori'));
        }
    }

    public function reset()
    {
        redirect(base_url('kategori'));
    }
}
