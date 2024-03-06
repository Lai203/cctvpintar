<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	#ini tampilan user
	public function index()
	{
		$data['contact'] = $this->main->get('contact');
		$data['title'] = 'Article';
		customer_template('article/index', $data);
	}

	private function validation()
	{
		$this->form_validation->set_rules('contact_number1', 'Contact Number1', 'required|trim');
		$this->form_validation->set_rules('contact_email', 'Contact Email', 'required|trim');
		$this->form_validation->set_rules('contact_address', 'Contact Address', 'required');
		$this->form_validation->set_rules('contact_website', 'Contact Website', 'required');
	}

	public function edit($contact_id)
	{
		$where = ['contact_id' => encode_php_tags($contact_id)];
		$data['title'] = 'Edit Kontak';
		$data['contacts'] = $this->main->get_where('contact', $where);

		if (!$data['contacts']) redirect('admin/contact');

		$this->validation();

		if ($this->form_validation->run() == false) {
			admin_template('contact/edit', $data);
		} else {
			$dataInput['contact_number1'] = $this->input->post('contact_number1');
			$dataInput['contact_number2'] = $this->input->post('contact_number2');
			$dataInput['contact_number3'] = $this->input->post('contact_number3');
			$dataInput['contact_number4'] = $this->input->post('contact_number4');
			$dataInput['contact_whatsapp'] = $this->input->post('contact_whatsapp');
			$dataInput['contact_email'] = $this->input->post('contact_email');
			$dataInput['contact_address'] = $this->input->post('contact_address');
			$dataInput['contact_facebook'] = $this->input->post('contact_facebook');
			$dataInput['contact_instagram'] = $this->input->post('contact_instagram');
			$dataInput['contact_twitter'] = $this->input->post('contact_twitter');
			$dataInput['contact_website'] = $this->input->post('contact_website');
			$dataInput['contact_linkedin'] = $this->input->post('contact_linkedin');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Contact Updated</div>');
			$this->main->update('contact', $dataInput, $where);

			redirect('admin/contact');
		}
	}
}
/* End of file Controllername.php */
