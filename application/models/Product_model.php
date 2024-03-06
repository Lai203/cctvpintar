<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{

    public function get_table_product()
    {
        $this->db->join('category_product', 'category_id');
        #$this->db->join('user', 'user_id');
        $this->db->order_by('product_id', 'desc');
        return $this->db->get('product')->result_array();
    }

    public function create_slug($title)
    {
        $extract = explode(" ", $title, 20);
        unset($extract[5]);
        $combine = implode(" ", $extract);
        $lowercase = strtolower(($combine));
        $preslug = url_title($lowercase);
        $slug = $preslug;
        $this->db->like('product_slug', $preslug, 'after');
        $checkslug = $this->db->get('product');
        if ($checkslug->num_rows() > 0) {
            $num = (int)$checkslug->num_rows() + 1;
            $slug = $preslug . "-" . $num;
        }
        return $slug;
    }

    public function get_all_product($limit, $start, $search = null, $category = null)
    {
        if ($category != null) {
            $this->db->where('p.category_id', $category);
        }
        if ($search != null) {
            $this->db->like('p.product_name', $search);
        }
        $this->db->select('p.*, c.category_title');
        $this->db->order_by('product_id', 'desc');
        $this->db->join('category_product c', 'c.category_id=p.category_id');
        $query = $this->db->get('product p', $limit, $start)->result_array();
        return $query;
    }

    public function get_product_by_slug($slug = null)
    {
        $this->db->select('p.*, c.category_title');
        $this->db->join('category_product c', 'c.category_id=p.category_id');
        $query = $this->db->get_where('product p', ['p.product_slug' => $slug]);
        return $query->row();
    }
}
