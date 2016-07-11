<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allow');
	class Upload_C extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->helper('file');
		}
		
		function index(){
			$data5['log_history'] = $this->db->query("select top 5 * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'order by upload_date desc");
			$data5['history_count'] = $this->db->query("select * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'");
				$this->load->view("others/top");
				$this->load->view("others/header",$data5);
				$this->load->view("dashboard/toolbox");
				$this->load->view("dashboard/dashboard_grid");
				$this->load->view("others/footer");
				$this->load->view("others/bottom");
		}
	 
		public function proses()
		{
			$this->form_validation->set_rules('kode','ID distributor column','required|max_length[6]|trim');
			$this->form_validation->set_rules('tahun','year column','required|numeric|min_length[4]|max_length[4]|trim');
			$this->form_validation->set_rules('bulan','month column','required');
			if (empty($_FILES['excel']['name']))
			{
				$this->form_validation->set_rules('excel', 'Document', 'required');
			}
			if($this->form_validation->run() == false){
				$this->index();
			}else{
				$config['upload_path'] = './temp_upload/';
				$config['allowed_types'] = 'csv';
				$config['max_size'] = '10000';
				$this->load->library('upload', $config);
	 
				if ( ! $this->upload->do_upload('excel')) {
					// jika validasi file gagal, kirim parameter error ke index
					//$error = array('error' => $this->upload->display_errors());
					$this->form_validation->set_message('handle_upload', $this->upload->display_errors());
					return false;
					//$this->index($error);
				} else {
				  // jika berhasil upload ambil data dan masukkan ke database
				  $upload_data = $this->upload->data();
				  
				  
				  // ini script untuk mengimport data CSV ke MySQL
				 $filename=$config['upload_path'].str_replace(" ","_",$_FILES['excel']['name']);
				 $handle = fopen("$filename", "r");
				 
				 $tgl = $this->session->userdata('username').date("YmdHis");
				 $this->db->query("
					CREATE TABLE ".$tgl."(
					ObjectID int identity(1,1),
					Kode_Distributor varchar(30),
					Tahun int,
					Bulan int,
					Salesman varchar(70),
					Type_Outlet varchar(70),
					Kode_Outlet varchar(10),
					Nama_Outlet varchar(150),
					Kode_Produk varchar(15),
					Unit int,
					HET float,
					Value_HET float,
					Status varchar(20),
					UploadDate datetime,
					UploadUsername varchar(50)
					)
			
				");
				 $row = 0;
				 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
				 {
					$num = count($data);
					$row++;
					
					if($row == 1){
						$row++; 
						continue;
					}
					
					$data1['Kode_Distributor'] = $data[0];
					//echo "<br>";
					$data1['Tahun'] = $data[1];
					//echo "<br>";
					$data1['Bulan'] = $data[2];
					//echo "<br>";
					//$date = str_replace('/', '-', $data[3]);
					//echo "<br>";
					//$exp = explode("-", $date);
					
					//echo "<br>";
					//$date1 = date('Y-m-d', mktime(0, 0, 0, $exp[1], $exp[0], $exp[2]));
					//echo "<br>";
					
					//$start_date = date('Y-m-d', strtotime($date1));
					//echo "<br>";
					//$data1['Tgl_Transaksi'] =$start_date;
					//echo "<br>";
					$data1['Salesman'] = $data[3];
					//echo "<br>";
					$data1['Type_Outlet'] = $data[6];
					//echo "<br>";
					$data1['Kode_Outlet'] = $data[4];
					//echo "<br>";
					$simbol = array("'",'"');
					$data1['Nama_Outlet'] = str_replace($simbol,"-",$data[5]);
					
					//echo "<br>";
					$data1['Kode_Produk'] = $data[7];
					//echo "<br>";
					$data1['Unit'] = $data[8];
					//echo "<br>";
					//echo "<br>";
					$query = $this->db->query("select HET from tbl_Upload_Ms_Price where ID_Produk='".$data1['Kode_Produk']."' and Tahun='".$data1['Tahun']."' and Bulan='".$data1['Bulan']."'");
					if($query->num_rows() != 0){
						foreach($query->result() as $db){
						$data1['HET'] = $db->HET;
						$data1['Value_HET'] = $data1['HET']*$data1['Unit'];
						}
					}else{
						$data1['HET'] = 0;
						$data1['Value_HET'] = $data1['HET']*$data1['Unit'];
					}
					
					if($data1['HET'] == 0){
						$data1['Status'] = 'Not Available';
					}else if($data[9] != $data1['HET']){
						$data1['Status'] = 'Check Again';
					}else{
						$data1['Status'] = 'OK';
					}
					//$data['HET'] = $dataarray[$i]['HET'];
					//$data['Value_HET'] = $dataarray[$i]['Value_HET'];
					$data1['UploadDate'] = date("Y-m-d H:i:s");
					$data1['UploadUsername'] = $this->session->userdata('username');
					$this->db->insert($tgl, $data1);
				  //$import="INSERT INTO id_anggota (nik,nama_anggota,tanggal_lahir,jenis_kelamin,no_hp) 
				  //VALUES('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";
				  //mysql_query($import) or die(mysql_error());
				 }
				 fclose($handle);
				 //$msg="";
				 //$this->session->set_flashdata("wow",$msg);
				 //return true;
				  
				  
				  // load library Excell_Reader
				  //$this->load->library('Excel_reader');
	 
				  //tentukan file
				  //$this->excel_reader->setOutputEncoding('230787');
				  //$file = $upload_data['full_path'];
				  //$this->excel_reader->read($file);
				  //error_reporting(E_ALL ^ E_NOTICE);
				  
				  // array data
				  //$data = $this->excel_reader->sheets[0];
				  //$tgl = $this->session->userdata('username').date("YmdHis");
				  //$dataexcel = Array();
				  //for ($i = 2; $i <= $data['numRows']; $i++) {
					//if ($data['cells'][$i][2] == '')
					//   break;
					//   $dataexcel[$i - 2]['Kode_Distributor'] = $data['cells'][$i][1];
					//   $dataexcel[$i - 2]['Tahun'] = $data['cells'][$i][2];
					//   $dataexcel[$i - 2]['Bulan'] = $data['cells'][$i][3];
					//   $dataexcel[$i - 2]['Tgl_Transaksi'] = $data['cells'][$i][4];
					//   $dataexcel[$i - 2]['Salesman'] = $data['cells'][$i][5];
					//   $dataexcel[$i - 2]['Type_Outlet'] = $data['cells'][$i][6];
					//   $dataexcel[$i - 2]['Kode_Outlet'] = $data['cells'][$i][7];
					//   $dataexcel[$i - 2]['Nama_Outlet'] = $data['cells'][$i][8];
					//   $dataexcel[$i - 2]['Kode_Produk'] = $data['cells'][$i][9];
					//   $dataexcel[$i - 2]['Unit'] = $data['cells'][$i][10];
					//   $dataexcel[$i - 2]['HET'] = $data['cells'][$i][11];
					//   $dataexcel[$i - 2]['Value_HET'] = $data['cells'][$i][12];
				  //}
				  
				  //$dataexcel['tgl'] = $tgl; 
				  
				  //load model
				  //$this->load->model('Data_model');
				  //$this->Data_model->loaddata($dataexcel,$tgl);
				  
 
				  $kode = $this->input->post('kode');
				  $bulan = $this->input->post('bulan');
				  $tahun = $this->input->post('tahun');
				  $sess_data['result'] = 'true';
				  $this->session->set_userdata($sess_data);
				  
				  $insert_temp = $this->db->query("insert into tbl_Upload_Temp values ('".$tgl."','".$kode."','".$bulan."','".$tahun."','".$this->session->userdata('username')."','".date("Y-m-d H:i:s")."')");
				  
				  //delete file
				  $file = $upload_data['file_name'];
				  $path = './temp_upload/' . $file;
				  unlink($path);
				  }
			//$this->session->set_flashdata('upload_result','');
			Header('Location:'.base_url().'index.php/dashboard/dashboard_c/result/'.$tgl.'/'.$kode.'/'.$bulan.'/'.$tahun);
			}
		}
	}
/*End of file upload_c.php*/
/*Location:.application/controllers/upload_c.php*/