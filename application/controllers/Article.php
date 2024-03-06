<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Article extends CI_Controller
{

	private $path = "";

	public function __construct()
	{
		parent::__construct();
		$this->path = FCPATH . "assets/img/article/";
	}

	#ini tampilan user
	public function index()
	{
		$data['articles'] = $this->main->get('blog');
		$data['title'] = 'Article';
		customer_template('article/index', $data);
	}


	private function validation()
	{
		$this->form_validation->set_rules('blog_title', 'Blog Title', 'required|trim');
		$this->form_validation->set_rules('blog_body', 'Blog Body', 'required|trim');
		$this->form_validation->set_rules('category_id', 'Category Id', 'required');
		$this->form_validation->set_rules('blog_date', 'Blog Date', 'required');
	}

	public function create()
	{
		$data['title'] = "Buat Artikel Baru";
		$data['category'] = $this->main->get('category');

		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			admin_template('article/create', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$dataInput['blog_title'] = $this->input->post('blog_title');
			$dataInput['blog_description'] = $this->input->post('blog_description');
			$dataInput['blog_body'] = $this->input->post('blog_body', false);
			$dataInput['category_id'] = $this->input->post('category_id');
			$dataInput['blog_tags'] = $this->input->post('blog_tags');
			$dataInput['blog_slug'] = $this->article->create_slug($dataInput['blog_title']);
			$dataInput['blog_date'] = $this->input->post('blog_date');

			if (!empty($_FILES['blog_thumbnail']['name'])) {
				$config['upload_path'] = $this->path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png|bmp|svg';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('blog_thumbnail')) {
					$img = $this->upload->data();
					$dataInput['blog_thumbnail'] = $img['file_name'];
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Upload Gambar Gagal</div>');
					admin_template('article/create', $data);
				}
			}

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Article added</div>');
			$this->main->insert('blog', $dataInput);

			redirect('admin/article');
		}
	}

	public function edit($blog_id)
	{
		$where = ['blog_id' => encode_php_tags($blog_id)];
		$data['title'] = 'Edit Artikel';
		$data['category'] = $this->main->get('category');
		$data['articles'] = $this->main->get_where('blog', $where);

		if (!$data['articles']) redirect('admin/article');

		$this->validation();

		if ($this->form_validation->run() == false) {
			admin_template('article/edit', $data);
		} else {
			$dataInput['blog_title'] = $this->input->post('blog_title');
			$dataInput['blog_description'] = $this->input->post('blog_description');
			$dataInput['blog_body'] = $this->input->post('blog_body', false);
			$dataInput['category_id'] = $this->input->post('category_id');
			$dataInput['blog_tags'] = $this->input->post('blog_tags');
			$dataInput['blog_slug'] = $this->article->create_slug($dataInput['blog_title']);
			$dataInput['blog_date'] = $this->input->post('blog_date');

			if (!empty($_FILES['blog_thumbnail']['name'])) {
				$img = $this->main->get_where('blog', $where)->blog_thumbnail;
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
				if ($this->upload->do_upload('blog_thumbnail')) {
					$img = $this->upload->data();
					$dataInput['blog_thumbnail'] = $img['file_name'];
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Upload Gambar Gagal</div>');
					admin_template('article/edit', $data);
					return; // Add return here to stop execution if upload fails
				}
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Article Updated</div>');
			$this->main->update('blog', $dataInput, $where);

			redirect('admin/article');
		}
	}


	public function delete($blog_id)
	{
		$blog_id = encode_php_tags($blog_id);
		$where = ['blog_id' => $blog_id];
		$query = $this->main->get_where('blog', $where);
		if (!$query) redirect('blog');
		$this->deleteImage($query->blog_body);
		$img = $query->blog_thumbnail;
		$image = $this->path . $img;

		if ($img) {
			if (is_file($image)) {
				unlink($image);
			}
		}
		$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Hapus Berhasil</div>');
		$this->main->delete('blog', $where);
		redirect('admin/article');
	}
}

/* End of file Controllername.php */
