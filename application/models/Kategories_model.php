<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategories_model extends MY_Model
{
    protected $table = 'kategori';

    public function getDefaultValues()
    {
        return ['nama_kategori' => ''];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'nama_kategori',
                'label' => 'Nama Kategori',
                'rules' => 'trim|required|callback_unique_kategori',
                'errors' => [
                    'required' => '<h6>%s harus diisi.</h6>'
                ]
            ]
        ];

        return $validationRules;
    }
}

/* End of file Kategori_model.php */
