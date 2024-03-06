<?php

defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$path = FCPATH . ('assets/img/company');
	}

	#ini tampilan user
	public function index()
	{
		$data['about'] = $this->main->get('about');
		$data['title'] = 'About';
		customer_template('about/index', $data);
	}

	private function validation()
	{
		$this->form_validation->set_rules('about_description', 'About Description', 'required|trim');
	}

	public function edit($about_id)
	{
		$where = ['about_id' => encode_php_tags($about_id)];
		$data['title'] = 'Edit Profil';
		$data['about'] = $this->main->get_where('about', $where);

		if (!$data['about']) redirect('admin/about');

		$this->validation();

		if ($this->form_validation->run() == false) {
			admin_template('about/edit', $data);
		} else {
			$dataInput['about_description'] = $this->input->post('about_description');
			$dataInput['about_history'] = $this->input->post('about_history');
			$dataInput['about_vision'] = $this->input->post('about_vision');
			$dataInput['about_mission'] = $this->input->post('about_mission');
			$dataInput['about_achievement'] = $this->input->post('about_achievement');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">About Updated</div>');
			$this->main->update('about', $dataInput, $where);

			redirect('admin/about');
		}
	}

	public function create_company()
	{
	}

	public function edit_company()
	{
	}

	public function delete_company()
	{
	}
}

/* End of file Controllername.php */
