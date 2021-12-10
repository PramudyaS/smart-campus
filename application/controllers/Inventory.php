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
        if(isset($_POST['search'])){
            $this->model->name = $_POST['barang'];
            $this->model->get_search();
        }else{
            $this->model->get_rows();
            // echo "<pre>"; print_r($this->model->rows); exit;
        }
        $data = array('model' => $this->model);
        $this->load->view('inventory/index', $data);
    }

    public function create()
    {
        if(isset($_POST['btnSubmit'])){
            #var_dump($_POST); exit;

            $this->model->name = $_POST['txt_name'];
            $this->model->category = $_POST['category'];
            $this->model->device_status = $_POST['status'];
            $this->model->jumlah = $_POST['txt_jumlah'];
            $this->model->insert();

            $this->model->get_rows();
            $this->load->view('inventory/index', ['model' => $this->model]);
        }else{
            $this->load->view('inventory/create', ['model' => $this->model]);
        }
    }

    public function edit(){
        $kode = $this->uri->segment(3);
        $this->model->get_row($kode);

        $this->load->view('inventory/edit', ['model' => $this->model]);
    }

    public function update(){

        $this->model->id = $this->input->post('id');
        $this->model->name = $this->input->post('txt_name');
        $this->model->category = $this->input->post('category');
        $this->model->device_status = $this->input->post('status');
        $this->model->jumlah = $this->input->post('txt_jumlah');

        $this->model->update();
        $this->load->view('inventory/index', ['model' => $this->model]);
    }

    public function delete()
    {
        $kode = $this->uri->segment(3);
        $this->model->delete($kode);
        redirect('inventory/index');
    }
}
