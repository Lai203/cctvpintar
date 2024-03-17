<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Berita extends CI_Controller
{
	private $path = "";
	public function __construct()
	{
		parent::__construct();
		if (!$this->auth->current_user()) {
			redirect('auth/index');
		}
		$this->path = FCPATH . "asset/uploads/berita/";
	}
	public function index()
	{
		$data['berita'] = $this->main->get('berita');
		$data['title'] = 'Berita';
		customer_template('berita', $data);
	}
	private function validation()
	{
		$this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required|trim');
		$this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required|trim');
	}
	public function create()
	{
		$data['title'] = "Buat Berita Baru";
		$this->validation();
		if ($this->form_validation->run() == FALSE) {
			admin_template('berita/create', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$dataInput['slug_berita'] = $this->main->create_slug($dataInput['judul_berita'], 'slug_berita', 'berita');
			$dataInput['thumbnail_berita'] = !empty($_FILES['thumbnail_berita']['name'])  ? uploadThumbnail($this->path, 'berita/create', 'thumbnail_berita', $data) : '';
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New News added</div>');
			$this->main->insert('berita', $dataInput);
			redirect('admin/berita');
		}
	}
	public function edit($id_berita)
	{
		$where = ['id_berita' => encode_php_tags($id_berita)];
		$data['title'] = 'Edit Berita';
		$data['berita'] = $this->main->get_where('berita', $where);

		if (!$data['berita']) redirect('admin/berita');

		$this->validation();
		if ($this->form_validation->run() == false) {
			admin_template('berita/edit', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$dataInput['slug_berita'] = $this->main->create_slug($dataInput['judul_berita'], 'slug_berita', 'berita');
			if (!empty($_FILES['thumbnail_berita']['name'])) {
				deleteThumbnail($data['berita']['thumbnail_berita'], $this->path);
				$dataInput['thumbnail_berita'] = uploadThumbnail($this->path, 'berita/edit', 'thumbnail_berita', $data);
			} else {
				$dataInput['thumbnail_berita'] = $data['berita']['thumbnail_berita'];
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">News Updated</div>');
			$this->main->update('berita', $dataInput, $where);
			redirect('admin/berita');
		}
	}
	public function delete($id_berita)
	{
		$where = ['id_berita' => encode_php_tags($id_berita)];
		$data['berita'] = $this->main->get_where('berita', $where);
		if (!$data['berita']) redirect('admin/berita');
		deleteImageContent($data['berita']['isi_berita'], $this->path);
		deleteThumbnail($data['berita']['thumbnail_berita'], $this->path);
		$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Hapus Berhasil</div>');
		$this->main->delete('berita', $where);
		redirect('admin/berita');
	}
}

/* End of file Controllername.php */
