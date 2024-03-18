<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Home';
		$this->load->view('frontend_template\header', $data);
		$this->load->view('frontend_template\topbar');
		$this->load->view('user');
		$this->load->view('frontend_template\footer');
	}
}
