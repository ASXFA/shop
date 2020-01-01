<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('category_model');
    }

	public function men()
	{
		$where = array('product_category' =>1);
		$data['clothing'] = $this->product_model->get_by_category($where);
		$this->load->view('user/clothing_men',$data);
	}

	public function women()
	{
		$where = array('product_category' =>2);
		$data['clothing'] = $this->product_model->get_by_category($where);
		$this->load->view('user/clothing_women',$data);
	}

	public function product_single()
	{
		$this->load->view('user/product_single');
	}
	public function custom()
	{
		$this->load->view('user/custom');
	}
}
