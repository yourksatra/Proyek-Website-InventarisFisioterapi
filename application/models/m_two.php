<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_two extends CI_Model
{
    public function InsertRecord($data){
        $this->db->insert('record', $data);
    }
}