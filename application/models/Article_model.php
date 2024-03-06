<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Article_model extends CI_Model
{
    public function get_table_post()
    {
        $this->db->join('category', 'category_id');
        #$this->db->join('user', 'user_id');
        $this->db->order_by('blog_id', 'desc');
        return $this->db->get('blog')->result_array();
    }

    public function create_slug($title)
    {
        $extract = explode(" ", $title, 20);
        unset($extract[5]);
        $combine = implode(" ", $extract);
        $lowercase = strtolower(($combine));
        $preslug = url_title($lowercase);
        $slug = $preslug;
        $this->db->like('blog_slug', $preslug, 'after');
        $checkslug = $this->db->get('blog');
        if ($checkslug->num_rows() > 0) {
            $num = (int)$checkslug->num_rows() + 1;
            $slug = $preslug . "-" . $num;
        }
        return $slug;
    }

    public function count_data($search = null, $category = null)
    {
        if ($category != null) {
            $this->db->where('b.category_id', $category);
        }
        if ($search != null) {
            $this->db->like('b.blog_title', $search);
        }

        $this->db->join('category c', 'c.category_id=b.category_id');
        $this->db->from('blog b');
        return $this->db->get()->num_rows();
    }

    public function get_all_blog($limit, $start, $search = null, $category = null)
    {
        if ($category != null) {
            $this->db->where('b.category_id', $category);
        }
        if ($search != null) {
            $this->db->like('b.blog_title', $search);
        }
        $this->db->select('b.*, c.category_title');
        $this->db->order_by('blog_id', 'desc');
        $this->db->join('category c', 'c.category_id=b.category_id');
        $query = $this->db->get('blog b', $limit, $start)->result_array();
        return $query;
    }

    public function get_post_by_slug($slug = null)
    {
        $this->db->select('b.*, c.category_title');
        $this->db->join('category c', 'c.category_id=b.category_id');
        $query = $this->db->get_where('blog b', ['b.blog_slug' => $slug]);
        return $query->row_array();
    }

    public function recent_blog($slug)
    {
        $this->db->join('category c', 'c.category_id=b.category_id');
        $this->db->where('blog_slug !=', $slug);
        $this->db->order_by('blog_date', 'desc');
        $this->db->limit(5);
        return $this->db->get('blog b')->result_array();
    }
}
