<?php
defined('BASEPATH') or exit('No direct script access allowed');
class produk extends CI_Controller
{
	private $path = "";
	public function __construct()
	{
		parent::__construct();
		if (!$this->auth->current_user()) {
			redirect('auth/index');
		}
		$this->path = FCPATH . "asset/uploads/produk/";
	}
	public function index()
	{
		$data['produk'] = $this->main->get('produk');
		$data['title'] = 'Katalog';
		customer_template('katalog', $data);
	}
	private function validation()
	{
		$this->form_validation->set_rules('nama_produk', 'Nama_Produk', 'required|trim');
		$this->form_validation->set_rules('spesifikasi_produk', 'Spesifikasi_Produk', 'required|trim');
		$this->form_validation->set_rules('harga_produk', 'Harga_Produk', 'required');
	}
	public function create()
	{
		$data['title'] = "Tambah Produk Baru";
		$data['jenis'] = $this->main->get('jenis_produk');
		$this->validation();
		if ($this->form_validation->run() == FALSE) {
			admin_template('produk/create', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$dataInput['slug_produk'] = $this->main->create_slug($dataInput['nama_produk'], 'slug_produk', 'produk');
			$dataInput['gambar_produk'] = empty($_FILES['gambar_produk']['name'])  ? '' : uploadThumbnail($this->path, 'produk/create', 'gambar_produk', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New produk added</div>');
			$this->main->insert('produk', $dataInput);
			redirect('admin/produk');
		}
	}
	public function edit($id_produk)
	{
		$where = ['id_produk' => encode_php_tags($id_produk)];
		$data['title'] = 'Edit Produk';
		$data['jenis'] = $this->main->get('jenis_produk');
		$data['produk'] = $this->main->get_where('produk', $where);

		if (!$data['produk']) redirect('admin/produk');

		$this->validation();

		if ($this->form_validation->run() == false) {
			admin_template('produk/edit', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$dataInput['slug_produk'] = $this->main->create_slug($dataInput['nama_produk'], 'slug_produk', 'produk');
			if (!empty($_FILES['gambar_produk']['name'])) {
				deleteThumbnail($data['produk']['gambar_produk'], $this->path);
				$dataInput['gambar_produk'] = uploadThumbnail($this->path, 'produk/edit', 'gambar_produk', $data);
			} else {
				$dataInput['gambar_produk'] = $data['produk']['gambar_produk'];
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">produk Updated</div>');
			$this->main->update('produk', $dataInput, $where);

			redirect('admin/produk');
		}
	}
	public function delete($id_produk)
	{
		$where = ['id_produk' => encode_php_tags($id_produk)];
		$data['produk'] = $this->main->get_where('produk', $where);
		if (!$data['produk']) redirect('admin/produk');
		deleteImageContent($data['produk']['deskripsi_produk'], $this->path);
		deleteThumbnail($data['produk']['gambar_produk'], $this->path);
		$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Hapus Berhasil</div>');
		$this->main->delete('produk', $where);
		redirect('admin/produk');
	}
}
