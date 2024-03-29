<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak_model extends CI_Model
{
    private $table = 'kontak';

    public function get_kontak()
    {
        $this->db->join('jenis_kontak', 'id_jenis_kontak');
        #$this->db->join('user', 'user_id');
        $this->db->order_by('id_jenis_kontak', 'desc');
        return $this->db->get($this->table)->result_array();
    }
}
