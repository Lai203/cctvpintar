<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    public function get_table_post()
    {
        $this->db->order_by('id_berita', 'desc');
        return $this->db->get('berita')->result_array();
    }
    public function get_all_news($limit, $start, $search = null)
    {
        if ($search != null) {
            $this->db->like('judul_berita', $search);
        }
        $this->db->select('berita');
        $this->db->order_by('id_berita', 'desc');
        $query = $this->db->get('berita', $limit, $start)->result_array();
        return $query;
    }
    public function get_news_by_slug($slug = null)
    {
        $this->db->select('berita');
        $query = $this->db->get_where('berita', ['slug_berita' => $slug]);
        return $query->row();
    }
    public function recent_news($slug)
    {
        $this->db->where('slug_berita !=', $slug);
        $this->db->order_by('tanggal_dibuat_berita', 'desc');
        $this->db->limit(5);
        return $this->db->get('berita')->result_array();
    }
}
