<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	function cari(){
		$query = $this->db->query("select * from tbl_Upload_Ms_Produk order by ObjectID");
		foreach($query->result() as $db){
			$key = $this->db->query("select Grup_Produk, Kategori_Produk, Type_Produk from tbl_UploadSTM_MapProduk where Kode_Produk='".$db->ID_Produk."'");
			foreach($key->result() as $db1){
				$this->db->query("update tbl_Upload_Ms_Produk set Group_produk='".$db1->Grup_Produk."', Kategori_produk='".$db1->Kategori_Produk."', Type_produk='".$db1->Type_Produk."' where ID_Produk='".$db->ID_Produk."'");
			}
		}
	}
	
	function pindah(){
		$key = $this->db->query("select * from tbl_UploadSTM_MapProduk");
		foreach($key->result() as $db){
			$query = $this->db->query("select * from tbl_Upload_Ms_Produk where ID_Produk='".$db->Kode_Produk."'");
			if($query->num_rows() == 0){
				$this->db->query("insert into tbl_Upload_Ms_Produk (ID_Produk,nama_produk,Group_produk,Type_produk,Kategori_produk) values ('".$db->Kode_Produk."','".$db->nama_produk."','".$db->Grup_Produk."','".$db->Type_Produk."','".$db->Kategori_Produk."')");
			}
			
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */