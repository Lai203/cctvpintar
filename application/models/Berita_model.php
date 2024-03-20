<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    private $table = 'berita';
    public function get_table_post()
    {
        $this->db->order_by('id_berita', 'desc');
        return $this->db->get($this->table)->result_array();
    }
    public function get_all_news($limit, $start, $search = null)
    {
        if ($search != null) {
            $this->db->like('judul_berita', $search);
        }
        $this->db->select($this->table);
        $this->db->order_by('id_berita', 'desc');
        $query = $this->db->get($this->table, $limit, $start)->result_array();
        return $query;
    }
    public function get_news_by_slug($slug = null)
    {
        $this->db->select($this->table);
        $query = $this->db->get_where($this->table, ['slug_berita' => $slug]);
        return $query->row();
    }
    public function recent_news($slug)
    {
        $this->db->where('slug_berita !=', $slug);
        $this->db->order_by('tanggal_dibuat_berita', 'desc');
        $this->db->limit(5);
        return $this->db->get($this->table)->result_array();
    }
}
