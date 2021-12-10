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
            $sql = sprintf("INSERT INTO inventories(name, category, device_status, jumlah) VALUES('%s', '%s', '%d', '%d')",
                $this->name,
                $this->category,
                $this->device_status,
                $this->jumlah
            );

            $this->db->query($sql);
        }

        public function update(){
            $sql = sprintf("UPDATE inventories SET name='%s', category='%s', device_status='%d', jumlah='%d' WHERE id='%s' ",
                $this->name,
                $this->category,
                $this->device_status,
                $this->jumlah,
				$this->id
            );

            $this->db->query($sql);
        }


        public function delete($kode){
            $sql = sprintf("DELETE FROM inventories WHERE id='%s'", $kode);
            $this->db->query($sql);
        }

		public function GroupByCategory()
		{
			$sql = "SELECT category,SUM(jumlah) as jumlah FROM inventories GROUP BY category";
			$query = $this->db->query($sql);
			$rows = array();
			foreach($query->result() as $row){
				$rows[] = $row;
			}

			$this->rows = $rows;
		}

		public function OrderByJumlah()
		{
			$sql = "SELECT name,jumlah FROM inventories ORDER BY jumlah DESC LIMIT 5";
			$query = $this->db->query($sql);
			$rows = array();
			foreach($query->result() as $row){
				$rows[] = $row;
			}

			$this->rows = $rows;
		}

		public function current_limit(){
			$sql = "SELECT * FROM inventories ORDER BY id DESC LIMIT 5";

			$query = $this->db->query($sql);
			$rows = array();
			foreach($query->result() as $row){
				$rows[] = $row;
			}

			$this->rows = $rows;
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
