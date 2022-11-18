<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller Tambah Barang
 */
class Item extends MY_Controller
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
            $input = (object) $this->item->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->item->validate()) {
            $data['title'] = 'Apotik Medika - Register Obat';
            $data['input'] = $input;
            $data['page']  = 'pages/item/index';
            $data['breadcrumb_title'] = 'Register Obat';
            $data['breadcrumb_path']  = 'Obat Masuk / Register Obat';

            return $this->view($data);
        }

        // Input data
        if ($this->item->run($input)) {
            $this->session->set_flashdata('success', 'Obat berhasil ditambahkan');
            redirect(base_url('item'));
        } else {
            $this->session->set_flashdata('error', 'Oops terjadi suatu kesalahan');
            redirect(base_url('item'));
        }
    }

    public function reset()
    {
        redirect(base_url('item'));
    }
}
