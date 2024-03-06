<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{

	private $path = "";

	public function __construct()
	{
		parent::__construct();
		$this->path = FCPATH . "assets/img/news";
	}

	public function index()
	{
		$data['news'] = $this->main->get('news');
		$data['title'] = 'News';
		customer_template('news/index', $data);
	}

	private function validation()
	{
		$this->form_validation->set_rules('news_title', 'News Title', 'required|trim');
		$this->form_validation->set_rules('news_body', 'News Body', 'required|trim');
		$this->form_validation->set_rules('news_type', 'News Type', 'required');
		$this->form_validation->set_rules('news_date', 'News Date', 'required');
	}

	public function create()
	{
		$data['title'] = "Buat Berita Baru";
		$this->validation();
		if ($this->form_validation->run() == FALSE) {
			admin_template('news/create', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$dataInput['news_title'] = $this->input->post('news_title');
			$dataInput['news_description'] = $this->input->post('news_description');
			$dataInput['news_body'] = $this->input->post('news_body', false);
			$dataInput['news_type'] = $this->input->post('news_type');
			$dataInput['news_date'] = $this->input->post('news_date');
			$dataInput['news_slug'] = $this->news->create_slug($dataInput['news_title']);

			if (!empty($_FILES['news_thumbnail']['name'])) {
				$config['upload_path'] = $this->path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png|bmp|svg';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('news_thumbnail')) {
					$img = $this->upload->data();
					$dataInput['blog_thumbnail'] = $img['file_name'];
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Upload Gambar Gagal</div>');
					admin_template('news/create', $data);
				}
			}

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New News added</div>');
			$this->main->insert('news', $dataInput);

			redirect('admin/news');
		}
	}

	public function edit($news_id)
	{
		$where = ['news_id' => encode_php_tags($news_id)];
		$data['title'] = 'Edit Berita';
		$data['news'] = $this->main->get_where('news', $where);

		if (!$data['news']) redirect('admin/news');

		$this->validation();
		if ($this->form_validation->run() == false) {
			admin_template('news/edit', $data);
		} else {
			$dataInput['news_title'] = $this->input->post('news_title');
			$dataInput['news_description'] = $this->input->post('news_description');
			$dataInput['news_body'] = $this->input->post('news_body', false);
			$dataInput['news_type'] = $this->input->post('news_type');
			$dataInput['news_date'] = $this->input->post('news_date');
			$dataInput['news_slug'] = $this->news->create_slug($dataInput['news_title']);

			if (!empty($_FILES['news_thumbnail']['name'])) {
				$img = $this->main->get_where('news', $where)->news_thumbnail;
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
				if ($this->upload->do_upload('news_thumbnail')) {
					$img = $this->upload->data();
					$dataInput['news_thumbnail'] = $img['file_name'];
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Upload Gambar Gagal</div>');
					admin_template('news/edit', $data);
				}
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">News Updated</div>');
			$this->main->update('news', $dataInput, $where);

			redirect('admin/news');
		}
	}

	public function delete($news_id)
	{
		$news_id = encode_php_tags($news_id);
		$where = ['news_id' => $news_id];
		$query = $this->main->get_where('news', $where);
		if (!$query) redirect('blog');
		deleteImage($query->news_body, $this->path);
		$img = $query->news_thumbnail;
		$image = $this->path . $img;

		if ($img) {
			if (is_file($image)) {
				unlink($image);
			}
		}
		$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Hapus Berhasil</div>');
		$this->main->delete('news', $where);
		redirect('admin/news');
	}
}


/* End of file Controllername.php */
