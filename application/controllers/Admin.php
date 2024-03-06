<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Administrator';
		admin_template('admin/index', $data);
	}
	public function about()
	{
		$data['about'] = $this->main->get('about');
		$data['title'] = 'Administrator About';
		admin_template('admin/about', $data);
	}
	public function article()
	{
		$data['articles'] = $this->article->get_table_post();
		$data['title'] = 'Administrator Article';
		admin_template('admin/article', $data);
	}
	public function home()
	{
		$data['title'] = 'Administrator Home';
		admin_template('admin/home', $data);
	}
	public function news()
	{
		$data['title'] = 'Administrator News';
		$data['news'] = $this->main->get('news');
		admin_template('admin/news', $data);
	}
	public function event()
	{
		$data['events'] = $this->main->get('events');
		$data['title'] = 'Administrator Event';
		admin_template('admin/event', $data);
	}
	public function product()
	{
		$data['products'] = $this->product->get_table_product();
		$data['title'] = 'Administrator Product';
		admin_template('admin/product', $data);
	}
	public function contact()
	{
		$data['contacts'] = $this->main->get('contact');;
		$data['title'] = 'Administrator Contact';
		admin_template('admin/contact', $data);
	}
}

/* End of file Controllername.php */
