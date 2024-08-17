<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_zero extends CI_Model
{
    public function DeletePinjam($id){
        $this->db->where('id_pinjam', $id);
        $this->db->delete('alat_terpinjam');
    }
    // public function InsertRecord($data){
    //     $this->db->insert('record', $data);
    // }
}