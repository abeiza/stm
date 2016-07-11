<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	
	class Master_Produk extends CI_Controller{
		function __contruct(){
			parent::__contruct();
		}
		
		function index(){
			$cek_login = $this->session->userdata('success_data');
			if($cek_login){
				$data5['log_history'] = $this->db->query("select top 5 * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'order by upload_date desc");
				$data5['history_count'] = $this->db->query("select * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'");
				$this->load->library('ci_phpgrid');
				$data['phpgrid'] = $this->ci_phpgrid->master_produk();
				$data1['title'] = "(Modify) Master Product";
				
				$this->load->view("others/top");
				$this->load->view("others/header",$data5);
				$this->load->view("master/header_master_v",$data1);
				$this->load->view("master/master_sync_v");
				$this->load->view("master/master_product_v",$data);
				
				$this->load->view("others/footer");
				$this->load->view("others/bottom");
			}else{
				$this->session->set_flashdata('login_result','Sorry, Please verify your data with login ');
				Header('Location:'.base_url().'index.php/login/');
			}
		}
		
		function sync(){
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$query = $this->db->query("select * from tbl_Upload_Ms_Price where Bulan='".$bulan."' and Tahun='".$tahun."'");
			$query2 = $this->db->query("select * from tbl_Upload_Ms_Produk order by ObjectID");
			if($query->num_rows() > 0){
				//foreach($temp->result() as $db){
					echo '<script type="text/javascript">
						
						 var jawab = confirm("Would you like to replace the existing data?")
						 if (jawab){
						  window.location = "'.base_url().'index.php/master/master_produk/overwrite/'.$bulan.'/'.$tahun.'";
						 }
						 
					</script>';
				//}
			}else{
				foreach($query2->result() as $db){
					$data['Tahun'] = $tahun;
					$data['Bulan'] = $bulan;
					$data['ID_Produk'] = $db->ID_Produk;
					$data['nama_produk'] = $db->nama_produk;
					$data['HET'] = $db->HET;
					
					$insert = $this->model_app->insert_data('tbl_Upload_Ms_Price',$data);
					
				}
				$this->session->set_flashdata("sync_result","<span class='fa fa-check-square-o' style='color:#fff;margin:10px;background:green;padding:10px;border-radius:3px;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);'> <strong style='font-size:14px;font-family:calibri'>Success Upoads Data . . . </strong> </span>");
				Header("Location:".base_url()."index.php/master/master_produk/");
				//echo '<script>alert("Success Upload . . .");window.location.href = '.base_url().';</script>';
			}
		}
		
		function overwrite($bulan,$tahun){
				$bulan = $this->uri->segment(4);
				$tahun = $this->uri->segment(5);
				$temp = $this->db->query("select * from tbl_Upload_Ms_Produk order by ObjectID");
				$delete = $this->db->query("delete from tbl_Upload_Ms_Price where Tahun='".$tahun."' and Bulan='".$bulan."'");

				foreach($temp->result() as $db){					
					$data['Tahun'] = $tahun;
					$data['Bulan'] = $bulan;
					$data['ID_Produk'] = $db->ID_Produk;
					$data['nama_produk'] = $db->nama_produk;
					$data['HET'] = $db->HET;
					
					$insert = $this->model_app->insert_data('tbl_Upload_Ms_Price',$data);
					
				}
				
				$this->session->set_flashdata("sync_result","<span class='fa fa-check-square-o' style='color:#fff;margin:10px;background:green;padding:10px;border-radius:3px;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);'> <strong style='font-size:14px;font-family:calibri'>Success Overwrite Data . . . </strong> </span>");
				Header("Location:".base_url()."index.php/master/master_produk/");

		}
		
		function add(){
			$cek_login = $this->session->userdata('success_data');
			if($cek_login){
				$data5['log_history'] = $this->db->query("select top 5 * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'order by upload_date desc");
				$data5['history_count'] = $this->db->query("select * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'");
				$this->load->library('ci_phpgrid');
				$data['phpgrid'] = $this->ci_phpgrid->master_produk();
				$data1['title'] = "(Modify) Master Product";
				
				$this->load->view("others/top");
				$this->load->view("others/header",$data5);
				$this->load->view("master/header_master_v",$data1);
				$this->load->view("master/master_product_add_v");
				
				$this->load->view("others/footer");
				$this->load->view("others/bottom");
			}else{
				$this->session->set_flashdata('login_result','Sorry, Please verify your data with login ');
				Header('Location:'.base_url().'index.php/login/');
			}
		}
		
		function add_act(){
			$this->form_validation->set_rules('id','ID Product','required');
			$this->form_validation->set_rules('name','Product Name','required');
			$this->form_validation->set_rules('group','Product Group','required');
			$this->form_validation->set_rules('type','Product Type','required');
			$this->form_validation->set_rules('category','Product Category','required');
			if($this->form_validation->run() == false)
			{
				$this->add();
			}else{
				$data['ID_Produk'] = $this->input->post('id');
				$data['nama_produk'] = $this->input->post('name');
				$data['Group_produk'] = $this->input->post('group');
				$data['Type_produk'] = $this->input->post('type');
				$data['Kategori_produk'] = $this->input->post('category');
				$data['HET'] = $this->input->post('het');
				
				$insert = $this->model_app->insert_data('tbl_Upload_Ms_Produk',$data);
				
				if($insert){
					$this->session->set_flashdata("add_result","<span class='fa fa-check-square-o' style='width:95%;color:#fff;background:green;padding:10px;border-radius:3px;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);'> <strong style='font-size:12px;font-family:calibri'>Insert Data is Success</strong> </span>");
					Header("Location:".base_url()."index.php/master/master_produk/add");
				}else{
					$this->session->set_flashdata("add_result","<span class='fa fa-check-square-o' style='width:95%;color:#fff;background:red;padding:10px;border-radius:3px;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);'> <strong style='font-size:12px;font-family:calibri'>Insert Data is Fail Please Try again</strong> </span>");
					Header("Location:".base_url()."index.php/master/master_produk/add/");
				}
			}
		
		}
		
		function export_excel(){
			//load librarynya terlebih dahulu
            //jika digunakan terus menerus lebih baik load ini ditaruh di auto load
            $this->load->library("Excel/PHPExcel");
            $objPHPExcel = new PHPExcel();
 
            //set Sheet yang akan diolah 
            $objPHPExcel->setActiveSheetIndex(0);
			//$objPHPExcel->mergeCells("A1:S1");
			/*$header = 'a4:s4';
			$objPHPExcel->getStyle($header)->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff00');
			$style = array(
				'font' => array('bold' => true,),
				'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,),
				);
			$objPHPExcel->getStyle($header)->applyFromArray($style);*/
			$objPHPExcel->setActiveSheetIndex(0)
                    //mengisikan value pada tiap-tiap cell, A1 itu alamat cellnya 
                    //Hello merupakan isinya
                                        ->setCellValue('A1', 'MASTER DATA PRODUCT')
                                        ->setCellValue('A2', 'STM UPLOADER SYSTEM')
                                        ->setCellValue('A4', 'ID PRODUCT')
										->setCellValue('B4', 'PRODUCT NAME')
										->setCellValue('C4', 'GROUP')
										->setCellValue('D4', 'PRODUCT CATEGORY')
										->setCellValue('E4', 'PRODUCT TYPE')
										->setCellValue('F4', 'HET');
                    //mengisikan value pada tiap-tiap cell, A1 itu alamat cellnya 
                    //Hello merupakan isinya
			
			$query1 = $this->db->query("select * from tbl_Upload_Ms_Produk ORDER by ID_Produk desc");
			$i = 5;

			foreach($query1->result() as $PRODUCT){
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A'.$i, $PRODUCT->ID_Produk)
							->setCellValue('B'.$i, $PRODUCT->nama_produk)
							->setCellValue('C'.$i, $PRODUCT->Group_produk)
							->setCellValue('D'.$i, $PRODUCT->Kategori_produk)
							->setCellValue('E'.$i, $PRODUCT->Type_produk)
							->setCellValue('F'.$i, $PRODUCT->HET);
				$i++;
			}
			
            //set title pada sheet (me rename nama sheet)
            $objPHPExcel->getActiveSheet()->setTitle('Master PRODUCT STM');
 
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
 
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="prdstm"'.date('YMdHis').'".xls"');
            //unduh file
			$objWriter->save("php://output");
            //Mulai dari create object PHPExcel itu ada dokumentasi lengkapnya di PHPExcel, 
            // Folder Documentation dan Example
            // untuk belajar lebih jauh mengenai PHPExcel silakan buka disitu	
		}
	}

/*End of file master_produk.php*/
/*Location:.application/controllers/master/master_produk.php*/