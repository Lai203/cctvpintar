<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
	private function validation()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
	}

	public function index()
	{
		return $this->load->view('auth/login');
	}
	public function login()
	{
		$this->validation();
		if ($this->form_validation->run() == FALSE) {
			return $this->load->view('auth/login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			if ($this->auth->login($username, $password)) {
				redirect('admin');
			} else {
				$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username dan passwrod benar!');
				redirect('auth/index');
			}
		}
	}
	public function logout()
	{
		$this->auth->logout();
		redirect('auth/login');
	}
	public function register_admin()
	{
		$this->validation();
		if ($this->form_validation->run() == FALSE) {
			return $this->load->view('auth/register_admin');
		} else {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$nama_admin = $this->input->post('nama_admin');

			$password = password_hash($password, PASSWORD_DEFAULT);
			$data = array(
				'username' => $username,
				'email' => $email,
				'password' => $password,
				'nama_admin' => $nama_admin
			);

			$this->main->insert('admin', $data);
			redirect('auth/index');
		}
	}
}
