<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends MY_Model
{
    protected $table = 'kategori';

    public function getDefaultValues()
    {
        return [
            'id'    => '',
            'nama_kategori'  => '',
            'status' => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'nama_kategori',
                'label' => 'Nama Kategori',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => '<h6>%s harus diisi.</h6>'
                ]
            ]
        ];

        return $validationRules;
    }

    /**
     * Melakukan insert barang baru ke db
     */
    public function run($input)
    {
        $data = ['nama_kategori' => $input->nama_kategori];

        $this->create($data);

        return true;
    }
}

/* End of file Kategori_model.php */
