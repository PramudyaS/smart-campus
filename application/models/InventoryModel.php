<?php
    class InventoryModel extends CI_Model {
        public $id;
        public $name;
        public $category;
        public $device_status;
        public $jumlah;
        public $rows;
        public $row;
        
        public $labels = [];
        
        public function __construct(){
            parent::__construct();
            $this->labels = $this->_attributeLabels();
            
            //panggil lib database
            $this->load->database();
        }

        public function get_row($kode){
            $sql = sprintf("SELECT * FROM inventories WHERE id='%s'", $kode);
            
            $query = $this->db->query($sql);
            $this->row = $query->row();		
        }
        
        public function get_rows(){
            $sql = "SELECT * FROM inventories ORDER BY id DESC";
            
            $query = $this->db->query($sql);
            $rows = array();
            foreach($query->result() as $row){
                $rows[] = $row;
            }
            
            $this->rows = $rows;
        }

        public function get_search(){
            $sql = "Select * from inventories where name like '%$this->name%'";

            $query = $this->db->query($sql);
            $rows = array();
            foreach($query->result() as $row){
                $rows[] = $row;
            }

            $this->rows = $rows;
        }

        public function insert(){
            $sql = sprintf("INSERT INTO inventories(name) VALUES('%s')",
                $this->name
            );

            $this->db->query($sql);
        }
        public function _attributeLabels(){
		return [
			'id' => 'ID: ',
			'name' => 'Nama: ',
            'category' => 'Kategori: ',
			'device_status' => 'Device Status: ',
			'jumlah' => 'Jumlah: '
		 ];
	}  
    }
?>