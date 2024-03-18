<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Artikel extends CI_Controller
{
	private $path = "";
	public function __construct()
	{
		parent::__construct();
		if (!$this->auth->current_user()) {
			redirect('auth/index');
		}
		$this->path = FCPATH . "asset/uploads/artikel/";
	}
	public function index()
	{
		$data['artikel'] = $this->main->get('artikel');
		$data['title'] = 'Artikel';
		customer_template('artikel', $data);
	}
	public function detail($slug = "")
	{
		if (!$slug) {
			redirect('artikel');
		}
		$data['title']  = "Detail Artikel";
		$data['artikel']   = $this->artikel->get_artikel_by_slug($slug);
		#$data['selected_category'] = $data['artikel']->id_kategori_artikel;
		$data['recent_posts'] = $this->artikel->recent_blog($slug);

		customer_template('artikel/detail', $data);
	}
	private function validation()
	{
		$this->form_validation->set_rules('judul_artikel', 'Judul_Artikel', 'required|trim');
		$this->form_validation->set_rules('isi_artikel', 'Isi_Artikel', 'required|trim');
	}

	private function validation_kategori()
	{
		$this->form_validation->set_rules('nama_kategori_artikel', 'Nama Kategori Artikel', 'required');
	}

	public function create()
	{
		$data['title'] = "Buat Artikel Baru";
		$data['kategori_artikel'] = $this->main->get('kategori_artikel');
		$this->validation();
		if ($this->form_validation->run() == FALSE) {
			admin_template('artikel/create', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$dataInput['slug_artikel'] = $this->main->create_slug($dataInput['judul_artikel'], 'slug_artikel', 'artikel');
			$dataInput['thumbnail_artikel'] = empty($_FILES['thumbnail_artikel']['name'])  ? '' : uploadThumbnail($this->path, 'artikel/create', 'thumbnail_artikel', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New artikel added</div>');
			$this->main->insert('artikel', $dataInput);
			redirect('admin/artikel');
		}
	}
	public function edit($id_artikel)
	{
		$where = ['id_artikel' => encode_php_tags($id_artikel)];
		$data['title'] = 'Edit Artikel';
		$data['kategori_artikel'] = $this->main->get('kategori_artikel');
		$data['artikel'] = $this->main->get_where('artikel', $where);
		if (!$data['artikel']) redirect('admin/artikel');
		$this->validation();
		if ($this->form_validation->run() == false) {
			admin_template('artikel/edit', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$dataInput['slug_artikel'] = $this->main->create_slug($dataInput['judul_artikel'], 'slug_artikel', 'artikel');
			if (!empty($_FILES['thumbnail_artikel']['name'])) {
				deleteThumbnail($data['artikel']['thumbnail_artikel'], $this->path);
				$dataInput['thumbnail_artikel'] = uploadThumbnail($this->path, 'artikel/edit', 'thumbnail_artikel', $data);
			} else {
				$dataInput['thumbnail_artikel'] = $data['artikel']['thumbnail_artikel'];
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Artikel Updated</div>');
			$this->main->update('artikel', $dataInput, $where);
			redirect('admin/artikel');
		}
	}
	public function delete($id_artikel)
	{
		$where = ['id_artikel' => encode_php_tags($id_artikel)];
		$data['artikel'] = $this->main->get_where('artikel', $where);
		if (!$data['artikel']) redirect('admin/artikel');
		deleteImageContent($data['artikel']['isi_artikel'], $this->path);
		deleteThumbnail($data['artikel']['thumbnail_artikel'], $this->path);
		$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Hapus Berhasil</div>');
		$this->main->delete('artikel', $where);
		redirect('admin/artikel');
	}

	public function create_kategori()
	{
		$data['title'] = "Buat Kategori Baru";
		$this->validation_kategori();
		if ($this->form_validation->run() == FALSE) {
			admin_template('artikel/create_kategori', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Kategori Artikel added</div>');
			$this->main->insert('kategori_artikel', $dataInput);
			redirect('admin/artikel');
		}
	}
	public function edit_kategori($id_kategori)
	{
		$where = ['id_kategori_artikel' => encode_php_tags($id_kategori)];
		$data['title'] = 'Edit Kategori';
		$data['kategori'] = $this->main->get_where('kategori_artikel', $where);
		if (!$data['kategori']) redirect('admin/artikel');
		$this->validation_kategori();
		if ($this->form_validation->run() == false) {
			admin_template('artikel/edit_kategori', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Artikel Updated</div>');
			$this->main->update('kategori_artikel', $dataInput, $where);
			redirect('admin/artikel');
		}
	}
	public function delete_kategori($id_kategori)
	{
		$where = ['id_kategori_artikel' => encode_php_tags($id_kategori)];
		$data['kategori'] = $this->main->get_where('kategori_artikel', $where);
		if (!$data['kategori']) redirect('admin/artikel');
		$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Hapus Berhasil</div>');
		$this->main->delete('kategori_artikel', $where);
		redirect('admin/artikel');
	}
}
