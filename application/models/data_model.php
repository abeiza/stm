<?php
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class Data_model extends CI_Model {

		//public $table = 'tbl_Upload_STM';
		//public $id = 'id_pegawai';
		//public $order = 'DESC';

		function __construct() {
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
		}

		//ini untuk memasukkan kedalam tabel pegawai
		function loaddata($dataarray,$tgl) {
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
					Status bit,
					UploadDate datetime,
					UploadUsername varchar(50)
					)
			
			");
			/*$this->db->query("
					CREATE TABLE ".$tgl."(
					ObjectID int auto_increment,
					Kode_Distributor varchar(30),
					Tahun int,
					Bulan int,
					Tgl_Transaksi datetime,
					Salesman varchar(70),
					Type_Outlet varchar(70),
					Kode_Outlet varchar(10),
					Nama_Outlet varchar(150),
					Kode_Produk varchar(15),
					Unit int,
					HET float,
					Value_HET float,
					UploadDate datetime,
					UploadUsername varchar(50),
					PRIMARY KEY(ObjectID)
					)
			
			");*/
			//$temp_count = $this->db->query("select count(ObjectID) from tbl_Upload_Temp");
			//if($temp_count > 0){
			//	$this->db->query("Delete from tbl_Upload_Temp");
			//}
			
			for ($i = 0; $i < count($dataarray); $i++) {
				$data['Kode_Distributor'] = $dataarray[$i]['Kode_Distributor'];
				$data['Tahun'] = $dataarray[$i]['Tahun'];
				$data['Bulan'] = $dataarray[$i]['Bulan'];
				//echo $date = str_replace('/', '-', $dataarray[$i]['Tgl_Transaksi']-2);
				//echo "<br>";
				
				//echo $start_date = date('Y-m-d', strtotime($date));
				//echo "<br>";
				//$data['Tgl_Transaksi'] =$start_date;
				$data['Salesman'] = $dataarray[$i]['Salesman'];
				$data['Type_Outlet'] = $dataarray[$i]['Type_Outlet'];
				$data['Kode_Outlet'] = $dataarray[$i]['Kode_Outlet'];
				$data['Nama_Outlet'] = $dataarray[$i]['Nama_Outlet'];
				$data['Kode_Produk'] = $dataarray[$i]['Kode_Produk'];
				$data['Unit'] = $dataarray[$i]['Unit'];
				$query = $this->db->query("select HET from tbl_Upload_Ms_Price where ID_Produk='".$data['Kode_Produk']."' and Tahun='".$data['Tahun']."' and Bulan='".$data['Bulan']."'");
				if($query->num_rows() != 0){
					foreach($query->result() as $db){
					$data['HET'] = $db->HET;
					$data['Value_HET'] = $data['HET']*$data['Unit'];
					}
				}else{
					$data['HET'] = '0';
					$data['Value_HET'] = $data['HET']*$data['Unit'];
				}
				
				if($dataarray[$i]['HET'] != $data['HET'])
				{
					$data['Status'] = 0;
				}else{
					$data['Status'] = 1;
				}
				//$data['HET'] = $dataarray[$i]['HET'];
				//$data['Value_HET'] = $dataarray[$i]['Value_HET'];
				$data['UploadDate'] = date("Y-m-d H:i:s");
				$data['UploadUsername'] = $this->session->userdata('username');
				/*$data = array(
					'Kode_Distributor' => $dataarray[$i]['Kode_Distributor'],
					'Tahun' => $dataarray[$i]['Tahun'],
					'Bulan' => $dataarray[$i]['Bulan'],
					'Tgl_Transaksi' => $dataarray[$i]['Tgl_Transaksi'],
					'Salesman' => $dataarray[$i]['Salesman'],
					'Type_Outlet' => $dataarray[$i]['Type_Outlet'],
					'Kode_Outlet' => $dataarray[$i]['Kode_Outlet'],
					'Nama_Outlet' => $dataarray[$i]['Nama_Outlet'],
					'Kode_Produk' => $dataarray[$i]['Kode_Produk'],
					'Unit' => $dataarray[$i]['Unit'],
					'HET' => $dataarray[$i]['HET'],
					'Value_HET' => $dataarray[$i]['Value_HET'],
					'UploadDate' => date("Y-m-d H:i:s"),
					'UploadUsername' => $this->session->userdata('username')
				);*/
				//ini untuk menambahkan apakah dalam tabel sudah ada data yang sama
				//apabila data sudah ada maka data di-skip
				// saya contohkan kalau ada data nama yang sama maka data tidak dimasukkan
				//$this->db->where('nama', $this->input->post('nama'));            
				//if ($cek) {
				//$this->db->insert($tgl, $data);
				//}
			}
		}
	}