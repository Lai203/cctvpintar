<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel_model extends CI_Model
{
    private $table = 'artikel';

    public function get_table_post()
    {
        $this->db->join('kategori_artikel', 'id_kategori_artikel');
        #$this->db->join('user', 'user_id');
        $this->db->order_by('id_artikel', 'desc');
        return $this->db->get($this->table)->result_array();
    }
    public function count_data($search = null, $category = null)
    {
        if ($category != null) {
            $this->db->where('a.id_kategori_artikel', $category);
        }
        if ($search != null) {
            $this->db->like('a.judul_artikel', $search);
        }

        $this->db->join('kategori_artikel k', 'k.id_kategori_artikel=a.id_kategori_artikel');
        $this->db->from($this->table . ' a');
        return $this->db->get()->num_rows();
    }
    public function get_all_blog($limit, $start, $search = null, $category = null)
    {
        if ($category != null) {
            $this->db->where('a.id_kategori_artikel', $category);
        }
        if ($search != null) {
            $this->db->like('a.judul_artikel', $search);
        }
        $this->db->select('a.*, k.nama_kategori_artikel');
        $this->db->order_by('id_artikel', 'desc');
        $this->db->join('kategori_artikel k', 'k.id_kategori_artikel=a.id_kategori_artikel');
        $query = $this->db->get($this->table . ' a', $limit, $start)->result_array();
        return $query;
    }
    public function get_article_by_slug($slug = null)
    {
        #$this->db->select('b.*, c.category_title');
        $this->db->select('a.*');
        #$this->db->join('category c', 'c.category_id=b.category_id');
        $query = $this->db->get_where($this->table . ' a', ['a.slug_artikel' => $slug]);
        return $query->row_array();
    }
    public function recent_blog($slug)
    {
        # $this->db->join('category c', 'c.category_id=b.category_id');
        $this->db->where('slug_artikel !=', $slug);
        $this->db->order_by('tanggal_dibuat_artikel', 'desc');
        $this->db->limit(5);
        return $this->db->get($this->table . ' a')->result_array();
    }
}
