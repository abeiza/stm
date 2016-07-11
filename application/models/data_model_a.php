<?php
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class Data_model_a extends CI_Model {

		//public $table = 'tbl_Upload_STM';
		//public $id = 'id_pegawai';
		//public $order = 'DESC';

		function __construct() {
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
		}

		//ini untuk memasukkan kedalam tabel pegawai
		function loaddata($dataarray) {
			/*$this->db->query("
					CREATE TABLE ".$tgl."(
					ObjectID int identity(1,1),
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
					Status bit,
					UploadDate datetime,
					UploadUsername varchar(50)
					)
			
			");*/
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
				$data['ID_Produk'] = $dataarray[$i]['ID_Produk'];
				$data['nama_produk'] = $dataarray[$i]['nama_produk'];
				$data['HET'] = $dataarray[$i]['HET'];
				
				$this->db->insert("tbl_Upload_Ms_Produk", $data);
				//}
			}
		}
	}