<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	
	class Master_Price extends CI_Controller{
		function __contruct(){
			parent::__contruct();
		}
		
		function index(){
			$cek_login = $this->session->userdata('success_data');
			if($cek_login){
				$data5['log_history'] = $this->db->query("select top 5 * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'order by upload_date desc");
				$data5['history_count'] = $this->db->query("select * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'");
				$this->load->library('ci_phpgrid');
				$data['phpgrid'] = $this->ci_phpgrid->master_price();
				$data1['title'] = "(Month) Price Posting";
				
				$this->load->view("others/top");
				$this->load->view("others/header",$data5);
				$this->load->view("master/header_master_v",$data1);
				$this->load->view("master/master_price_v",$data);
				$this->load->view("others/footer");
				$this->load->view("others/bottom");
			}else{
				$this->session->set_flashdata('login_result','Sorry, Please verify your data with login ');
				Header('Location:'.base_url().'index.php/login/');
			}
		}
		
		function get_product(){
			$bln=$this->input->get('bln');
			$thn=$this->input->get('thn');
			//$query = $this->db->query("select [ID_Produk], [nama_produk] from [Live].[dbo].[tbl_Upload_Ms_Price] where [Bulan]='3' and [Tahun]='2016' order by [ID_Produk]");
			$query = $this->db->query("select DISTINCT tbl_Upload_Ms_Produk.ID_Produk, tbl_Upload_Ms_Produk.nama_produk from tbl_Upload_STM, tbl_Upload_Ms_Produk WHERE tbl_Upload_STM.Kode_Produk=tbl_Upload_Ms_Produk.ID_Produk and tbl_Upload_STM.Tahun='".$thn."' AND tbl_Upload_STM.Bulan='".$bln."' order by ID_Produk");
			$data = array();
			foreach($query->result() as $db){
				$data[] = $db; 
			}
			echo json_encode($data);
		}
	}

/*End of file master_price.php*/
/*Location:.application/controllers/master/master_price.php*/