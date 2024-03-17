<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events_model extends CI_Model
{
    public function get_table_event()
    {
        $this->db->order_by('id_event', 'asc');
        return $this->db->get('events')->result_array();
    }
    public function get_all_event($limit, $start)
    {
        $this->db->select('events');
        $this->db->order_by('id_event', 'asc');
        $query = $this->db->get('events', $limit, $start)->result_array();
        return $query;
    }
    public function get_event_by_slug($slug = null)
    {
        $query = $this->db->get_where('events', ['slug_event' => $slug]);
        return $query->row_array();
    }
    public function recent_event($slug)
    {
        $this->db->where('slug_event !=', $slug);
        $this->db->order_by('tanggal_event', 'asc');
        $this->db->limit(5);
        return $this->db->get('events')->result_array();
    }
}
