<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

	private $path = "";

	public function __construct()
	{
		parent::__construct();
		$this->path = FCPATH . "assets/img/event/";
	}

	#ini tampilan user
	public function index()
	{
		$data['event'] = $this->main->get('events');
		$data['title'] = 'Event';
		customer_template('event/index', $data);
	}


	private function validation()
	{
		$this->form_validation->set_rules('event_title', 'Event Title', 'required|trim');
		$this->form_validation->set_rules('event_location', 'Event Location', 'required|trim');
		$this->form_validation->set_rules('event_date', 'Event Date', 'required');
		$this->form_validation->set_rules('event_contact', 'Event Contact', 'required');
	}

	public function create()
	{
		$data['title'] = "Buat Event Baru";
		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			admin_template('event/create', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$dataInput['event_title'] = $this->input->post('event_title');
			$dataInput['event_description'] = $this->input->post('event_description');
			$dataInput['event_location'] = $this->input->post('event_location');
			$dataInput['event_slug'] = $this->events->create_slug($dataInput['event_title']);
			$dataInput['event_date'] = $this->input->post('event_date');
			$dataInput['event_time'] = $this->input->post('event_time');
			$dataInput['event_contact'] = $this->input->post('event_contact');
			$dataInput['event_status'] = $this->input->post('event_status');

			if (!empty($_FILES['event_thumbnail']['name'])) {
				$config['upload_path'] = $this->path;
				$config['allowed_types'] = 'gif|jpg|jpeg|png|bmp|svg';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('event_thumbnail')) {
					$img = $this->upload->data();
					$dataInput['event_thumbnail'] = $img['file_name'];
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Upload Gambar Gagal</div>');
					admin_template('event/create', $data);
				}
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Event added</div>');
			$this->main->insert('events', $dataInput);

			redirect('admin/event');
		}
	}

	public function edit($event_id)
	{
		$where = ['event_id' => encode_php_tags($event_id)];
		$data['title'] = 'Edit Artikel';
		$data['events'] = $this->main->get_where('events', $where);

		if (!$data['events']) redirect('admin/event');

		$this->validation();

		if ($this->form_validation->run() == false) {
			admin_template('event/edit', $data);
		} else {
			$dataInput['event_title'] = $this->input->post('event_title');
			$dataInput['event_description'] = $this->input->post('event_description');
			$dataInput['event_location'] = $this->input->post('event_location');
			$dataInput['event_slug'] = $this->events->create_slug($dataInput['event_title']);
			$dataInput['event_date'] = $this->input->post('event_date');
			$dataInput['event_time'] = $this->input->post('event_time');
			$dataInput['event_contact'] = $this->input->post('event_contact');
			$dataInput['event_status'] = $this->input->post('event_status');

			if (!empty($_FILES['event_thumbnail']['name'])) {
				$img = $this->main->get_where('events', $where)->event_thumbnail;
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
				if ($this->upload->do_upload('event_thumbnail')) {
					$img = $this->upload->data();
					$dataInput['event_thumbnail'] = $img['file_name'];
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Upload Gambar Gagal</div>');
					admin_template('event/edit', $data);
					return; // Add return here to stop execution if upload fails
				}
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Event Updated</div>');
			$this->main->update('events', $dataInput, $where);
			redirect('admin/event');
		}
	}

	public function delete($event_id)
	{
		$event_id = encode_php_tags($event_id);
		$where = ['event_id' => $event_id];
		$query = $this->main->get_where('events', $where);
		if (!$query) redirect('event');
		$this->main->delete('events', $where);
		$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Hapus Berhasil</div>');
		redirect('admin/event');
	}
}

/* End of file Controllername.php */
