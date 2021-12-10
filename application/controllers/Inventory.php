<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        $this->load->view('inventory/edit', ['model' => $this->model->row]);
    }

    public function update(){

        $this->model->id = $this->input->post('id');
        $this->model->name = $this->input->post('txt_name');
        $this->model->category = $this->input->post('category');
        $this->model->device_status = $this->input->post('status');
        $this->model->jumlah = $this->input->post('jumlah');

        $this->model->update();
        $this->load->helper('url');
		redirect('inventory/');
    }

    public function delete()
    {
        $kode = $this->uri->segment(3);
        $this->model->delete($kode);
        redirect('inventory/index');
    }

    public function export_excel()
    {
        $this->model->get_rows();
        $inventories = $this->model;

        $spreadsheet = new Spreadsheet;

        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Nama')
                    ->setCellValue('B1', 'Kategori')
                    ->setCellValue('C1', 'Device Status')
                    ->setCellValue('D1', 'Jumlah');

        $kolom = 2;
        foreach($inventories->rows as $inventory) {
             $spreadsheet->setActiveSheetIndex(0)
                         ->setCellValue('A' . $kolom, $inventory->name)
                         ->setCellValue('B' . $kolom, $inventory->category)
                         ->setCellValue('C' . $kolom, $inventory->device_status)
                         ->setCellValue('D' . $kolom, $inventory->jumlah);

             $kolom++;
        }

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Report Inventory_'.date('Y-m-d').'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function laporan_pdf(){

        $this->model->get_rows();
        $data = ['data' => $this->model];
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan Inventory_".date('Y-m-d').".pdf";
        $this->pdf->load_view('inventory/laporan_pdf', $data);
    
    
    }
}
