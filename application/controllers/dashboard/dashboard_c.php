<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allow');
	
	class Dashboard_C extends CI_Controller{
		function __construct(){
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
		}
		
		function index(){
			$cek_login = $this->session->userdata('success_data');
			if($cek_login){
				$data5['log_history'] = $this->db->query("select top 5 * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'order by upload_date desc");
				$data5['history_count'] = $this->db->query("select * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'");
				$this->load->view("others/top");
				$this->load->view("others/header",$data5);
				$this->load->view("dashboard/toolbox");
				$this->load->view("dashboard/dashboard_grid");
				$this->load->view("others/footer");
				$this->load->view("others/bottom");
			}else{
				$this->session->set_flashdata('login_result','Sorry, Please verify your data with login ');
				Header('Location:'.base_url().'index.php/login/');
			}
		}
		
		function recent(){
			$cek_login = $this->session->userdata('success_data');
			if($cek_login){
				$data5['log_history'] = $this->db->query("select top 5 * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'order by upload_date desc");
				$data5['history_count'] = $this->db->query("select * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'");
				$this->load->view("others/top");
				$this->load->view("others/header",$data5);
				$this->load->view("dashboard/toolbox");
				$this->load->view("dashboard/recent_grid",$data5);
				$this->load->view("others/footer");
				$this->load->view("others/bottom");
			}else{
				$this->session->set_flashdata('login_result','Sorry, Please verify your data with login ');
				Header('Location:'.base_url().'index.php/login/');
			}
		}
		
		function search(){
			$cek_login = $this->session->userdata('success_data');
			if($cek_login){
				$kode = $this->input->post('search');
				$data5['log_history'] = $this->db->query("select top 5 * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'order by upload_date desc");
				$data5['history_count'] = $this->db->query("select * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'");
				$data['search'] = $this->db->query("select distinct(Bulan), Kode_Distributor, UploadUsername, Tahun, UploadDate from tbl_Upload_STM where Kode_Distributor like '%".$kode."%' order by tahun desc, bulan desc");
				
				$this->load->view("others/top");
				$this->load->view("others/header",$data5);
				$this->load->view("dashboard/toolbox");
				$this->load->view("dashboard/search_grid",$data);
				$this->load->view("others/footer");
				$this->load->view("others/bottom");
			}else{
				$this->session->set_flashdata('login_result','Sorry, Please verify your data with login ');
				Header('Location:'.base_url().'index.php/login/');
			}
		}
		
		function result($tgl,$kode,$bulan,$tahun){
			$cek_login = $this->session->userdata('success_data');
			//$cek_result = $this->session->userdata('result');
			if($cek_login){
				$data5['log_history'] = $this->db->query("select top 5 * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'order by upload_date desc");
				$data5['history_count'] = $this->db->query("select * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'");
				$data['table'] = $this->uri->segment(4);
				$data['kode'] = $this->uri->segment(5);
				$data['bulan'] = $this->uri->segment(6);
				$data['tahun'] = $this->uri->segment(7);
				
				$data2['table'] = $this->uri->segment(4);
				$data2['kode'] = $this->uri->segment(5);
				$data2['bulan'] = $this->uri->segment(6);
				$data2['tahun'] = $this->uri->segment(7);
				//$data['query'] = $this->model_app->getData('tbl_Upload_Temp');
				$cek_data = $this->db->query("SELECT * FROM ".$data['table']." WHERE  Kode_Distributor!='".$data['kode']."' or Bulan!='".$data['bulan']."' or Tahun!='".$data['tahun']."'");
				$data2['summary'] = $this->db->query("SELECT count(Kode_Distributor) AS ROWSS, SUM(case when Unit < '0' then Unit end) AS UNIT_RETURN, SUM(case when Unit > '0' then Unit end) AS UNIT_SALES, SUM(case when Unit < '0' then Unit*HET end) AS HET_RETURN, SUM(case when HET > '0' then HET * UNIT end) AS HET_SALES, SUM(Value_HET) AS TOTAL FROM ".$data['table']);
				$data2['check1'] = $this->db->query("select ObjectID FROM ".$data['table']." Where Status='Check Again'");
				$data2['check2'] = $this->db->query("select ObjectID FROM ".$data['table']." Where Status='Not Available'");
				/*if(!$data['query']){
					$data['grid'] = "--- Periksa kembali dokumen anda, data yang telah diproses tidak tersedia ---";
				}else{
					$data['grid'] = "";
				}*/
				
				if($cek_data->num_rows() > 0){
					$data2['warning_kode'] = "<span class='fa fa-exclamation-circle' style='color:#fff; background:#aa2e33;padding:10px;border-radius:3px;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);'> <strong style='font-size:14px;font-family:calibri'>Maaf, Mohon diperiksa kembali parameter kode distributor, tahun dan bulan.</strong> </span>";
				}else{
					$data2['warning_kode'] = '';
				}
				
				$this->load->library('ci_phpgrid');
				$data['phpgrid'] = $this->ci_phpgrid->upload_temp($data['table']);
				
				$this->load->view("others/top");
				$this->load->view("others/header",$data5);
				$this->load->view("dashboard/toolbox");
				$this->load->view("dashboard/grid_v",$data);
				$this->load->view("dashboard/summary",$data2);
				$this->load->view("others/footer");
				$this->load->view("others/bottom");
				
			}else{
				$this->session->set_flashdata('login_result','Sorry, Please verify your data with login ');
				Header('Location:'.base_url().'index.php/login/');
			}
		}
		
		function overwrite($table,$kode,$bulan,$tahun){
				$table = $this->uri->segment(4);
				$kode = $this->uri->segment(5);
				$bulan = $this->uri->segment(6);
				$tahun = $this->uri->segment(7);
				$temp = $this->db->query("select * from ".$table." order by ObjectID");
				$delete = $this->db->query("delete from tbl_Upload_STM where Kode_Distributor='".$kode."'and Tahun='".$tahun."' and Bulan='".$bulan."'");

				foreach($temp->result() as $db){					
					$data['Kode_Distributor'] = $db->Kode_Distributor;
					$data['Tahun'] = $db->Tahun;
					$data['Bulan'] = $db->Bulan;
					//$data['Tgl_Transaksi'] = $db->Tgl_Transaksi;
					$data['Salesman'] = $db->Salesman;
					$data['Type_Outlet'] = $db->Type_Outlet;
					$data['Kode_Outlet'] = $db->Kode_Outlet;
					$data['Nama_Outlet'] = $db->Nama_Outlet;
					$data['Kode_Produk'] = $db->Kode_Produk;
					$data['Unit'] = $db->Unit;
					$data['HET'] = $db->HET;
					$data['Value_HET'] = $db->Value_HET;
					$data['UploadDate'] = date("Y-m-d H:i:s");
					$data['UploadUsername'] = $this->session->userdata('username');
					
					$insert = $this->model_app->insert_data('tbl_Upload_STM',$data);
					
				}
				$this->session->unset_userdata('result');
				$this->session->unset_userdata('Kode_Distributor');
				$this->session->unset_userdata('Bulan');
				$this->session->unset_userdata('Tahun');
				$query = $this->db->query("DROP TABLE ".$table);
				$query2 = $this->model_app->delete_log_history($table);
				
				$this->session->set_flashdata("uploads_result","<span class='fa fa-check-square-o' style='color:#fff;margin:10% 40%;background:green;padding:10px;border-radius:3px;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);'> <strong style='font-size:14px;font-family:calibri'>Success Overwrite Data . . . </strong> </span>");
				Header("Location:".base_url()."index.php/");

		}
		
		function migrasi($table,$kode,$bulan,$tahun){
			$table = $this->uri->segment(4);
			$kode = $this->uri->segment(5);
			$bulan = $this->uri->segment(6);
			$tahun = $this->uri->segment(7);
			$query = $this->db->query("select Kode_Distributor, Bulan, Tahun from tbl_Upload_STM where Kode_Distributor='".$kode."' and Bulan='".$bulan."' and Tahun='".$tahun."'");
			$temp = $this->db->query("select * from ".$table." order by ObjectID");
			if($query->num_rows() > 0){
				//foreach($temp->result() as $db){
					echo '<script type="text/javascript">
						
						 var jawab = confirm("Would you like to replace the existing data?")
						 if (jawab){
						  window.location = "'.base_url().'index.php/dashboard/dashboard_c/overwrite/'.$table.'/'.$kode.'/'.$bulan.'/'.$tahun.'";
						 }
						 else{
						  window.location = "'.base_url().'index.php/dashboard/dashboard_c/result/'.$table.'/'.$kode.'/'.$bulan.'/'.$tahun.'";
						 }
						
					</script>';
				//}
			}else{
				foreach($temp->result() as $db){
					$data['Kode_Distributor'] = $db->Kode_Distributor;
					$data['Tahun'] = $db->Tahun;
					$data['Bulan'] = $db->Bulan;
					//$data['Tgl_Transaksi'] = $db->Tgl_Transaksi;
					$data['Salesman'] = $db->Salesman;
					$data['Type_Outlet'] = $db->Type_Outlet;
					$data['Kode_Outlet'] = $db->Kode_Outlet;
					$data['Nama_Outlet'] = $db->Nama_Outlet;
					$data['Kode_Produk'] = $db->Kode_Produk;
					$data['Unit'] = $db->Unit;
					$data['HET'] = $db->HET;
					$data['Value_HET'] = $db->Value_HET;
					$data['UploadDate'] = date("Y-m-d H:i:s");
					$data['UploadUsername'] = $this->session->userdata('username');
					
					$insert = $this->model_app->insert_data('tbl_Upload_STM',$data);
					
				}
				$query = $this->db->query("DROP TABLE ".$table);
				$query2 = $this->model_app->delete_log_history($table);
				//Header('Location:'.base_url());
				$this->session->set_flashdata("uploads_result","<span class='fa fa-check-square-o' style='color:#fff;margin:10% 32%;background:green;padding:10px;border-radius:3px;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);'> <strong style='font-size:14px;font-family:calibri'>Success Upoads Data . . . </strong> </span>");
				Header("Location:".base_url()."index.php/");
				//echo '<script>alert("Success Upload . . .");window.location.href = '.base_url().';</script>';
			}
			//Header('Location:'.base_url());
		}
		
		function cancel($table){
			$data['table'] = $this->uri->segment(4);
			$query = $this->db->query("DROP TABLE ".$data['table']);
			$this->load->model('model_app');
			$query2 = $this->model_app->delete_log_history($data['table']);
			Header('Location:'.base_url());
		}
		
	}

/*End Of File dashboard_c.php*/
/*Location:.application/controllers/dashboard_c.php*/