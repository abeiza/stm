<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allow');
	
	class Login extends CI_Controller{
		
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$cek_session = $this->session->userdata('success_data');
			if($cek_session){
				$data5['log_history'] = $this->db->query("select top 5 * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'order by upload_date desc");
				$data5['history_count'] = $this->db->query("select * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'");
				$this->load->view("others/top");
				$this->load->view("others/header",$data5);
				$this->load->view("dashboard/toolbox");
				$this->load->view("dashboard/dashboard_grid");
				$this->load->view("others/footer");
				$this->load->view("others/bottom");
			}else{
				$this->load->view("login/login_view");
			}
		}
		
		function proses_login(){
			$this->form_validation->set_rules('username','username account','required|trim');
			$this->form_validation->set_rules('password','password account','required|trim');
			if($this->form_validation->run()){
				$usr = $this->input->post('username');
				$pass = $this->input->post('password');
				$validation = $this->model_app->validation_login($usr,$pass);
				if($validation->num_rows() == 1){
					foreach($validation->result() as $db){
						$sess_data['success_data'] = 'successlogin';
						$sess_data['ObjectID'] = $db->ObjectID;
						$sess_data['username'] = $db->Username;
						$sess_data['password'] = $db->Password;
						$this->session->set_userdata($sess_data);
					}
					date_default_timezone_set('Asia/Jakarta');
					$date['LastLogin'] = date("Y-m-d H:i:s");
					$last_login = $this->model_app->update_login('tbl_Upload_Login',$date,'ObjectID',$this->session->userdata('ObjectID'));
				?>
					<script>
						window.location.href = '<?php echo base_url();?>index.php/dashboard/dashboard_c';
					</script>
				<?php
				}else if($validation->num_rows() > 1){
					$this->session->set_flashdata('login_result',"<span class='fa fa-exclamation-circle' style='color:#fff; margin-top:10px;background:#aa2e33;padding:10px;border-radius:3px;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);'> <strong style='font-size:14px;font-family:calibri'>Sorry duplicated account. . . Please call IT Division</strong></span>");
					Header('Location:'.base_url().'index.php/login/');
				}else{
					$this->session->set_flashdata('login_result',"<span class='fa fa-exclamation-circle' style='color:#fff; margin-top:10px;background:#aa2e33;padding:10px;border-radius:3px;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);'> <strong style='font-size:14px;font-family:calibri'>Sorry your data is invalid. . . Please try again. . . </strong></span>");
					Header('Location:'.base_url().'index.php/login/');
				}
			}else{
				$this->index();
			}
		}
		
		function proses_logout(){
			$cek = $this->session->userdata('success_data');
			if($cek){
				$this->session->sess_destroy();
				?>
				<script>
					window.location.href = '<?php echo base_url();?>';
				</script>
			<?php
			}
		}
	}
/*End of file login.php*/
/*Location:.application/controllers/login.php*/