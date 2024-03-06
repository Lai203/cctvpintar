<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

	private $path = "";

	public function __construct()
	{
		parent::__construct();
		$this->path = FCPATH . "assets/img/product/";
	}

	#ini tampilan user
	public function index()
	{
		$data['product'] = $this->main->get('product');
		$data['title'] = 'Katalog';
		customer_template('product/index', $data);
	}


	private function validation()
	{
		$this->form_validation->set_rules('product_name', 'Product Name', 'required|trim');
		$this->form_validation->set_rules('product_specification', 'Product Specification', 'required|trim');
		$this->form_validation->set_rules('product_image', 'Product Image', 'required');
		$this->form_validation->set_rules('product_price', 'Product Price', 'required');
	}

	public function create()
	{
		$data['title'] = "Tambah Produk Baru";
		$data['category'] = $this->main->get('category_product');

		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			admin_template('product/create', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$dataInput['product_name'] = $this->input->post('product_name');
			$dataInput['product_description'] = $this->input->post('product_description');
			$dataInput['product_specification'] = $this->input->post('product_specification', false);
			$dataInput['category_id'] = $this->input->post('category_id');
			$dataInput['product_price'] = $this->input->post('product_price');
			$dataInput['product_slug'] = $this->product->create_slug($dataInput['product_name']);

			if (!empty($_FILES['product_image']['name'])) {
				$config['upload_path'] = $this->path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png|bmp|svg';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('product_image')) {
					$img = $this->upload->data();
					$dataInput['product_image'] = $img['file_name'];
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Upload Gambar Gagal</div>');
					admin_template('product/create', $data);
				}
			}

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Product added</div>');
			$this->main->insert('product', $dataInput);

			redirect('admin/product');
		}
	}

	public function edit($product_id)
	{
		$where = ['product_id' => encode_php_tags($product_id)];
		$data['title'] = 'Edit Produk';
		$data['category'] = $this->main->get('category_product');
		$data['products'] = $this->main->get_where('product', $where);

		if (!$data['products']) redirect('admin/product');

		$this->validation();

		if ($this->form_validation->run() == false) {
			admin_template('product/edit', $data);
		} else {
			$dataInput['product_name'] = $this->input->post('product_name');
			$dataInput['product_description'] = $this->input->post('product_description');
			$dataInput['category_id'] = $this->input->post('category_id');
			$dataInput['product_specification'] = $this->input->post('product_specification', false);
			$dataInput['product_price'] = $this->input->post('product_price');
			$dataInput['product_slug'] = $this->product->create_slug($dataInput['product_name']);

			if (!empty($_FILES['product_image']['name'])) {
				$img = $this->main->get_where('product', $where)->product_image;
				if ($img) {
					if (is_file($this->path . $img)) {
						unlink($this->path . $img);
					}
				}
				$config['upload_path'] = $this->path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png|bmp|svg';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload');
				$this->upload->initialize($config);
				if ($this->upload->do_upload('product_image')) {
					$img = $this->upload->data();
					$dataInput['product_image'] = $img['file_name'];
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Upload Gambar Gagal</div>');
					admin_template('product/edit', $data);
				}
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product Updated</div>');
			$this->main->update('product', $dataInput, $where);

			redirect('admin/product');
		}
	}


	public function delete($product_id)
	{
		$product_id = encode_php_tags($product_id);
		$where = ['product_id' => $product_id];
		$query = $this->main->get_where('product', $where);
		if (!$query) redirect('product');
		deleteImage($query->product_description, $this->path);
		$img = $query->product_image;
		$image = $this->path . $img;

		if ($img) {
			if (is_file($image)) {
				unlink($image);
			}
		}
		$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Hapus Berhasil</div>');
		$this->main->delete('product', $where);
		redirect('admin/product');
	}
}

/* End of file Controllername.php */
