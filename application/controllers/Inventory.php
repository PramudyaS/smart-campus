<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

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
	public function __construct(){
		parent::__construct();
		$this->load->model('InventoryModel');
		$this->model = $this->InventoryModel;
	}

	public function index()
	{
		$this->model->get_rows();		
		// echo "<pre>"; print_r($this->model->rows); exit;
		$data = array('model' => $this->model);
		$this->load->view('inventory/index', $data);
	}

	public function create()
	{
		$this->load->view('inventory/create.php');
	}

	public function edit()
	{
		$this->load->view('inventory/edit.php');
	}
}
