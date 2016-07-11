<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allow');
	
	class Model_App extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		function validation_login($usr,$pass){
			$query = $this->db->query("select * from tbl_Upload_Login where Username='".$usr."'  and Password='".$pass."'");
			return $query;
		}
		
		function update_login($table,$data,$pk,$id){
			$this->db->where($pk,$id);
			return $this->db->update($table,$data);
		}
		
		function update_data($table,$data,$pk1,$id1,$pk2,$id2,$pk1,$id2){
			$this->db->where($pk,$id);
			return $this->db->update($table,$data);
		}
		
		function insert_data($table,$data){
			return $this->db->insert($table,$data);
		}
		
		function getData($table){
			return $this->db->get($table);
		}
		
		function delete_log_history($id){
			$this->db->where('id_table',$id);
			return $this->db->delete('tbl_Upload_Temp');
		}
	}
	
/*End of file model_app.php*/
/*Location:.application/models/model_app.php*/