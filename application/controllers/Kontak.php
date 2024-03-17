<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kontak extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->auth->current_user()) {
			redirect('auth/index');
		}
	}
	public function index()
	{
		$data['kontak'] = $this->main->get('kontak');
		$data['title'] = 'Kontak';
		customer_template('kontak/view', $data);
	}
	private function validation()
	{
		$this->form_validation->set_rules('id_jenis_kontak', 'Jenis Kontak', 'required|trim');
		$this->form_validation->set_rules('informasi_kontak', 'Informasi Kontak', 'required|trim');
	}
	public function create()
	{
		$data['title'] = "Buat Kontak Baru";
		$data['jenis_kontak'] = $this->main->get('jenis_kontak');
		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			admin_template('kontak/create', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Kontak added</div>');
			$this->main->insert('kontak', $dataInput);
			redirect('admin/kontak');
		}
	}
	public function edit($id_kontak)
	{
		$where = ['id_kontak' => encode_php_tags($id_kontak)];
		$data['title'] = 'Edit Kontak';
		$data['kontak'] = $this->main->get_where('kontak', $where);
		$data['jenis_kontak'] = $this->main->get('jenis_kontak');

		if (!$data['kontak']) redirect('admin/kontak');

		$this->validation();

		if ($this->form_validation->run() == false) {
			admin_template('kontak/edit', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Contact Updated</div>');
			$this->main->update('kontak', $dataInput, $where);
			redirect('admin/kontak');
		}
	}
}
