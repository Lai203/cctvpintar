<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->auth->current_user()) {
			redirect('auth/login');
		}
	}
	public function index()
	{
		$data['title'] = 'Administrator';
		$data['menu'] = '';
		admin_template('admin/index', $data);
	}
	public function profil()
	{
		$data['profil'] = $this->main->get('profil');
		$data['rekan'] = $this->main->get('rekan_perusahaan');
		$data['title'] = 'Administrator Profil';
		$data['menu'] = 'Kelola Profil';
		admin_template('admin/profil', $data);
	}
	public function artikel()
	{
		$data['artikel'] = $this->artikel->get_table_post();
		$data['kategori'] = $this->main->get('kategori_artikel');
		$data['title'] = 'Administrator Artikel';
		$data['menu'] = 'Kelola Artikel';
		admin_template('admin/artikel', $data);
	}
	public function home()
	{
		$data['title'] = 'Administrator Home';
		admin_template('admin/home', $data);
	}
	public function berita()
	{
		$data['title'] = 'Administrator Berita';
		$data['berita'] = $this->main->get('berita');
		$data['menu'] = 'Kelola Berita';
		admin_template('admin/berita', $data);
	}
	public function event()
	{
		$data['events'] = $this->main->get('events');
		$data['title'] = 'Administrator Event';
		$data['menu'] = 'Kelola Event';
		admin_template('admin/event', $data);
	}
	public function produk()
	{
		$data['produk'] = $this->produk->get_table_product();
		$data['title'] = 'Administrator Produk';
		$data['menu'] = 'Kelola Produk';
		admin_template('admin/produk', $data);
	}
	public function kontak()
	{
		$data['kontak'] = $this->kontak->get_kontak();
		$data['title'] = 'Administrator Kontak';
		$data['menu'] = 'Kelola Kontak';
		admin_template('admin/kontak', $data);
	}
}
