<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{

    public function get_table_product()
    {
        $this->db->join('jenis_produk', 'id_jenis_produk');
        #$this->db->join('user', 'user_id');
        $this->db->order_by('id_produk', 'desc');
        return $this->db->get('produk')->result_array();
    }
    public function get_all_product($limit, $start, $search = null, $category = null)
    {
        if ($category != null) {
            $this->db->where('p.id_jenis_produk', $category);
        }
        if ($search != null) {
            $this->db->like('p.nama_produk', $search);
        }
        $this->db->select('p.*, j.nama_jenis_produk');
        $this->db->order_by('id_produk', 'desc');
        $this->db->join('jenis_produk j', 'j.id_jenis_produk=p.id_jenis_produk');
        $query = $this->db->get('produk p', $limit, $start)->result_array();
        return $query;
    }
    public function get_product_by_slug($slug = null)
    {
        $this->db->select('p.*, j.nama_jenis_produk');
        $this->db->join('jenis_produk j', 'j.id_jenis_produk=p.id_jenis_produk');
        $query = $this->db->get_where('produk p', ['p.slug_produk' => $slug]);
        return $query->row();
    }
}
