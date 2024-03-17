<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Event extends CI_Controller
{
	private $path = "";
	public function __construct()
	{
		parent::__construct();
		if (!$this->auth->current_user()) {
			redirect('auth/index');
		}
		$this->path = FCPATH . "asset/uploads/event/";
	}
	public function index()
	{
		$data['event'] = $this->main->get('events');
		$data['title'] = 'Event';
		customer_template('event', $data);
	}
	private function validation()
	{
		$this->form_validation->set_rules('nama_event', 'Nama Event', 'required|trim');
		$this->form_validation->set_rules('lokasi_event', 'Lokasi Event', 'required|trim');
		$this->form_validation->set_rules('tanggal_event', 'Tanggal Event', 'required');
	}
	public function create()
	{
		$data['title'] = "Buat Event Baru";
		$this->validation();

		if ($this->form_validation->run() == FALSE) {
			admin_template('event/create', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$dataInput['slug_event'] = $this->events->create_slug($dataInput['nama_event']);
			$dataInput['thumbnail_event'] = empty($_FILES['thumbnail_event']['name'])  ? '' : uploadThumbnail($this->path, 'event/create', 'thumbnail_event', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Event added</div>');
			$this->main->insert('events', $dataInput);
			redirect('admin/event');
		}
	}
	public function edit($id_event)
	{
		$where = ['id_event' => encode_php_tags($id_event)];
		$data['title'] = 'Edit Event';
		$data['events'] = $this->main->get_where('events', $where);
		if (!$data['events']) redirect('admin/event');
		$this->validation();
		if ($this->form_validation->run() == false) {
			admin_template('event/edit', $data);
		} else {
			$dataInput = $this->input->post(null, true);
			$dataInput['slug_event'] = $this->main->create_slug($dataInput['nama_event'], 'slug_event', 'events');
			if (!empty($_FILES['thumbnail_event']['name'])) {
				deleteThumbnail($data['events']['thumbnail_event'], $this->path);
				$dataInput['thumbnail_event'] = uploadThumbnail($this->path, 'event/edit', 'thumbnail_event', $data);
			} else {
				$dataInput['thumbnail_event'] = $data['events']['thumbnail_event'];
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Event Updated</div>');
			$this->main->update('events', $dataInput, $where);
			redirect('admin/event');
		}
	}
	public function delete($id_event)
	{
		$where = ['id_event' => encode_php_tags($id_event)];
		$data['events'] = $this->main->get_where('events', $where);
		if (!$data['events']) redirect('admin/event');
		$this->main->delete('events', $where);
		$this->session->set_flashdata('message', '<div class="alert alert-failed" role="alert">Hapus Berhasil</div>');
		redirect('admin/event');
	}
}
