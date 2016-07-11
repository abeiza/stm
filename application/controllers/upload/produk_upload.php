<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allow');
	class Produk_Upload extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->helper('file');
		}
		
		function index(){
			//$data5['log_history'] = $this->db->query("select top 5 * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'order by upload_date desc");
			//$data5['history_count'] = $this->db->query("select * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'");
				$this->load->view("others/upload");
			//	$this->load->view("others/header",$data5);
			//	$this->load->view("dashboard/toolbox");
			//	$this->load->view("dashboard/dashboard_grid");
			//	$this->load->view("others/footer");
			//	$this->load->view("others/bottom");
		}
	 
		public function proses()
		{
			//$this->form_validation->set_rules('kode','ID distributor column','required|max_length[6]|trim');
			//$this->form_validation->set_rules('tahun','year column','required|numeric|min_length[4]|max_length[4]|trim');
			//$this->form_validation->set_rules('bulan','month column','required');
			//if($this->form_validation->run() == false){
			//	$this->index();
			//}else{
				$config['upload_path'] = './temp_upload/';
				$config['allowed_types'] = 'xls';
				$config['max_size'] = '10000';
				$this->load->library('upload', $config);
	 
				if ( ! $this->upload->do_upload('excel')) {
					// jika validasi file gagal, kirim parameter error ke index
					$error = array('error' => $this->upload->display_errors());
					//$this->index($error);
				} else {
				  // jika berhasil upload ambil data dan masukkan ke database
				  $upload_data = $this->upload->data();
	 
				  // load library Excell_Reader
				  $this->load->library('Excel_reader');
	 
				  //tentukan file
				  $this->excel_reader->setOutputEncoding('230787');
				  $file = $upload_data['full_path'];
				  $this->excel_reader->read($file);
				  error_reporting(E_ALL ^ E_NOTICE);
				  
				  // array data
				  $data = $this->excel_reader->sheets[0];
				  //$tgl = $this->session->userdata('username').date("YmdHis");
				  $dataexcel = Array();
				  for ($i = 2; $i <= $data['numRows']; $i++) {
					if ($data['cells'][$i][2] == '')
					   break;
					   $dataexcel[$i - 2]['ID_Produk'] = $data['cells'][$i][1];
					   $dataexcel[$i - 2]['nama_produk'] = $data['cells'][$i][2];
					   $dataexcel[$i - 2]['HET'] = $data['cells'][$i][3];
				  }
				  
				  //$dataexcel['tgl'] = $tgl; 
				  
				  //load model
				  $this->load->model('Data_model_a');
				  $this->Data_model_a->loaddata($dataexcel);
				  
 
				  //$kode = $this->input->post('kode');
				  //$bulan = $this->input->post('bulan');
				  //$tahun = $this->input->post('tahun');
				  //$sess_data['result'] = 'true';
				  //$this->session->set_userdata($sess_data);
				  
				  //$insert_temp = $this->db->query("insert into tbl_Upload_Temp values ('".$tgl."','".$kode."','".$bulan."','".$tahun."','".$this->session->userdata('username')."','".date("Y-m-d H:i:s")."')");
				  
				  //delete file
				  $file = $upload_data['file_name'];
				  $path = './temp_upload/' . $file;
				  unlink($path);
				  }
			//$this->session->set_flashdata('upload_result','');
			//Header('Location:'.base_url().'index.php/dashboard/dashboard_c/result/'.$tgl.'/'.$kode.'/'.$bulan.'/'.$tahun);
			}
		}
	
/*End of file upload_c.php*/
/*Location:.application/controllers/upload_c.php*/