<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events_model extends CI_Model
{
    public function get_table_event()
    {
        $this->db->order_by('event_id', 'asc');
        return $this->db->get('events')->result_array();
    }

    public function create_slug($title)
    {
        $extract = explode(" ", $title, 20);
        unset($extract[5]);
        $combine = implode(" ", $extract);
        $lowercase = strtolower(($combine));
        $preslug = url_title($lowercase);
        $slug = $preslug;
        $this->db->like('event_slug', $preslug, 'after');
        $checkslug = $this->db->get('events');
        if ($checkslug->num_rows() > 0) {
            $num = (int)$checkslug->num_rows() + 1;
            $slug = $preslug . "-" . $num;
        }
        return $slug;
    }


    public function get_all_event($limit, $start)
    {
        $this->db->select('events');
        $this->db->order_by('event_id', 'asc');
        $query = $this->db->get('events', $limit, $start)->result_array();
        return $query;
    }

    public function get_event_by_slug($slug = null)
    {
        $query = $this->db->get_where('events', ['event_slug' => $slug]);
        return $query->row_array();
    }

    public function recent_event($slug)
    {
        $this->db->where('event_slug !=', $slug);
        $this->db->order_by('event_date', 'asc');
        $this->db->limit(5);
        return $this->db->get('events')->result_array();
    }
}
