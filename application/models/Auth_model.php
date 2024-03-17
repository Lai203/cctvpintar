<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    private $table = 'admin';
    const SESSION_KEY = 'id_admin';

    public function login($username, $password)
    {
        $this->db->where('email', $username)->or_where('username', $username);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            $admin = $query->row();
            if (!password_verify($password, $admin->password)) {
                return FALSE;
            }
            $this->session->set_userdata([self::SESSION_KEY => $admin->id_admin]);
            $this->session->set_userdata('is_login', TRUE);
            return $this->session->has_userdata(self::SESSION_KEY);
        }
    }
    public function current_user()
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }
        $admin_id = $this->session->userdata(self::SESSION_KEY);
        $query = $this->db->get_where('admin', ['id_admin' => $admin_id]);
        return $query->row();
    }
    public function logout()
    {
        $this->session->unset_userdata(self::SESSION_KEY);
        return !$this->session->has_userdata(self::SESSION_KEY);
    }
}
