<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{
    public function get_table_post()
    {
        $this->db->order_by('news_id', 'desc');
        return $this->db->get('news')->result_array();
    }

    public function create_slug($title)
    {
        $extract = explode(" ", $title, 20);
        unset($extract[5]);
        $combine = implode(" ", $extract);
        $lowercase = strtolower(($combine));
        $preslug = url_title($lowercase);
        $slug = $preslug;
        $this->db->like('news_slug', $preslug, 'after');
        $checkslug = $this->db->get('news');
        if ($checkslug->num_rows() > 0) {
            $num = (int)$checkslug->num_rows() + 1;
            $slug = $preslug . "-" . $num;
        }
        return $slug;
    }

    public function get_all_news($limit, $start, $search = null)
    {
        if ($search != null) {
            $this->db->like('news_title', $search);
        }
        $this->db->select('news');
        $this->db->order_by('news_id', 'desc');
        $query = $this->db->get('news', $limit, $start)->result_array();
        return $query;
    }

    public function get_news_by_slug($slug = null)
    {
        $this->db->select('news');
        $query = $this->db->get_where('news', ['news_slug' => $slug]);
        return $query->row();
    }

    public function recent_news($slug)
    {
        $this->db->where('news_slug !=', $slug);
        $this->db->order_by('news_date', 'desc');
        $this->db->limit(5);
        return $this->db->get('news')->result_array();
    }
}
