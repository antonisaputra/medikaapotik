<?php
class Detail_obat extends CI_Model
{
    public function detail_obat()
    {
        return $this->db->get('detail_obat');
    }
}