<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->model('InventoryModel');
		$this->model = $this->InventoryModel;
	}

	public function index()
	{

		$categories = $this->model->GroupByCategory();
		$category = $this->model->rows;

		$query_current_data = $this->model->current_limit();
		$current_data = $this->model->rows;

		$query_by_jumlah = $this->model->OrderByJumlah();
		$order_jumlah    = $this->model->rows;
		//echo "<pre>"; print_r($this->model->rows); exit;
		$data = [
			'categories' 	=> $category,
			'current_data'	=> $current_data,
			'order_jumlah'	=> $order_jumlah
		];
		$this->load->view('dashboard', $data);
	}
}
