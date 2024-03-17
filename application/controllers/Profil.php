<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->auth->current_user()) {
			redirect('auth/index');
		}
		$this->path = FCPATH . ('asset/uploads/profil/');
	}
	public function index()
	{
		$data['profil'] = $this->main->get('profil');
		$data['title'] = 'Profil';
		customer_template('profil', $data);
	}
	private function validation()
	{
		$this->form_validation->set_rules('profil', 'Profil', 'required|trim');
	}

	private function validation_rekan()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
	}

	public function edit($id)
	{
		$where = ['id' => encode_php_tags($id)];
		$data['title'] = 'Edit Profil';
		$data['profil'] = $this->main->get_where('profil', $where);
		if (!$data['profil']) redirect('admin/profil');
		$this->validation();
		if ($this->form_validation->run() == false) {
			admin_template('profil/edit', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil Updated</div>');
			$this->main->update('profil', $dataInput, $where);
			redirect('admin/profil');
		}
	}

	public function create_rekan()
	{
		$data['title'] = "Tambah Rekan";
		$this->validation_rekan();
		if ($this->form_validation->run() == FALSE) {
			admin_template('profil/create_rekan', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$dataInput['logo'] = empty($_FILES['logo']['name'])  ? '' : uploadThumbnail($this->path, 'profil/create_rekan', 'logo', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Rekan added</div>');
			$this->main->insert('rekan_perusahaan', $dataInput);
			redirect('admin/profil');
		}
	}
	public function edit_rekan($id)
	{
		$where = ['id' => encode_php_tags($id)];
		$data['title'] = 'Edit Rekan';
		$data['rekan'] = $this->main->get_where('rekan_perusahaan', $where);
		if (!$data['rekan']) redirect('admin/profil');
		$this->validation_rekan();
		if ($this->form_validation->run() == false) {
			admin_template('profil/edit_rekan', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			if (!empty($_FILES['logo']['name'])) {
				deleteThumbnail($data['rekan']['logo'], $this->path);
				$dataInput['logo'] = uploadThumbnail($this->path, 'profil/edit_rekan', 'logo', $data);
			} else {
				$dataInput['logo'] = $data['rekan_perusahaan']['logo'];
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Rekan Updated</div>');
			$this->main->update('rekan_perusahaan', $dataInput, $where);
			redirect('admin/profil');
		}
	}
	public function delete_rekan($id)
	{
		$where = ['id' => encode_php_tags($id)];
		$data['rekan'] = $this->main->get_where('rekan_perusahaan', $where);
		if (!$data['rekan']) redirect('admin/profil');
		deleteThumbnail($data['rekan']['logo'], $this->path);
		$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Hapus Berhasil</div>');
		$this->main->delete('rekan_perusahaan', $where);
		redirect('admin/profil');
	}
}
