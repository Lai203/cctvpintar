<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{
    public function get($table, $desc_column = null)
    {
        if ($desc_column != null) {
            $this->db->order_by($desc_column, 'desc');
        }
        return $this->db->get($table)->result_array();
    }

    public function get_where($table, $where, $object = false)
    {
        $query = $this->db->get_where($table, $where);

        if ($query->num_rows() <= 1 && $object == false) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function insert_batch($table, $data)
    {
        return $this->db->insert_batch($table, $data);
    }

    public function update($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    public function delete($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    public function create_slug($title, $slug, $table)
    {
        $extract = explode(" ", $title, 20);
        unset($extract[5]);
        $combine = implode(" ", $extract);
        $lowercase = strtolower(($combine));
        $preslug = url_title($lowercase);
        $slug = $preslug;
        $this->db->like($slug, $preslug, 'after');
        $checkslug = $this->db->get($table);
        if ($checkslug->num_rows() > 0) {
            $num = (int)$checkslug->num_rows() + 1;
            $slug = $preslug . "-" . $num;
        }
        return $slug;
    }
}
