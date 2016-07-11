<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	
	class History_C extends CI_Controller{
		function __contruct(){
			parent::__contruct();
		}
		
		function index(){
			$cek_login = $this->session->userdata('success_data');
			if($cek_login){
				$data5['log_history'] = $this->db->query("select top 5 * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'order by upload_date desc");
				$data5['history_count'] = $this->db->query("select * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'");
				$this->load->library('ci_phpgrid');
				$data['phpgrid'] = $this->ci_phpgrid->history_data();
				//$date = $this->db->query("SELECT MIN(Tgl_Transaksi) as 'FROM', MAX(Tgl_Transaksi) as 'TOO' FROM tbl_Upload_STM");
				//foreach($date->result() as $db){
				//	$data1['date_period'] = substr($db->FROM,0,10).' s/d '.substr($db->TOO,0,10);
				//}
				
				$this->load->view("others/top");
				$this->load->view("others/header",$data5);
				$this->load->view("history/header_v");
				$this->load->view("history/history_v",$data);
				$this->load->view("others/footer");
				$this->load->view("others/bottom");
			}else{
				$this->session->set_flashdata('login_result','Sorry, Please verify your data with login ');
				Header('Location:'.base_url().'index.php/login/');
			}
		}
		/*<h6 style="margin-top:10px;">Periode : <?php echo $date_period;?></h6>*/
		function get_outlet(){
			$bln=$this->input->get('bln');
			$thn=$this->input->get('thn');
			$query = $this->db->query("select DISTINCT View_ADI_Qlik_SalesOrg.CustomerID, View_ADI_Qlik_SalesOrg.CustomerName from tbl_Upload_STM, View_ADI_Qlik_SalesOrg WHERE tbl_Upload_STM.Kode_Distributor=View_ADI_Qlik_SalesOrg.CustomerID and tbl_Upload_STM.Tahun='".$thn."' AND tbl_Upload_STM.Bulan='".$bln."' order by CustomerID");
			$data = array();
			foreach($query->result() as $db){
				$data[] = $db; 
			}
			echo json_encode($data);
		}
		
		function export_excel(){
			//load librarynya terlebih dahulu
            //jika digunakan terus menerus lebih baik load ini ditaruh di auto load
            $this->load->library("Excel/PHPExcel");
			$from = $this->input->post('from');
			$to = $this->input->post('to');
            //membuat objek PHPExcel
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
                                        ->setCellValue('A1', 'INFORMATION TRANSACTION DATA (INBOX SMS)')
                                        ->setCellValue('A2', 'RESULT SMS GATEWAY')
                                        ->setCellValue('A3', 'period '.$from.' to '.$to)
                                        ->setCellValue('A4', 'RECEIVE DATE')
										->setCellValue('B4', 'SENDER NUMBER')
										->setCellValue('C4', 'BA ID From Message')
										->setCellValue('D4', 'FREQ SMS')
										->setCellValue('E4', 'TEXTSMS')
										->setCellValue('F4', 'PROCESSED STATUS')
										->setCellValue('G4', 'PROCESSED DATE')
										->setCellValue('H4', 'REPLY SMS');
                    //mengisikan value pada tiap-tiap cell, A1 itu alamat cellnya 
                    //Hello merupakan isinya
			if($from == null or $to == null){
				$query1 = $this->db->query("select * from Final_Inbox order by ReceiveDt desc");
			}else if($from == null and $to == null){
				$query1 = $this->db->query("select * from Final_Inbox order by ReceiveDt desc");
			}else{
				$query1 = $this->db->query("select * from Final_Inbox WHERE ReceiveDt >= '".$from."' and ReceiveDt <= DATEADD(day, +1, '".$to."') order by ReceiveDt desc");
			}
			//$query1 = $this->db->query("select * from Final_Inbox WHERE ReceiveDt >= '".$from."' and [ReceiveDt] <= DATEADD(day, +1, '".$to."') order by ReceiveDt desc");
			$i = 5;

			foreach($query1->result() as $inbox){
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A'.$i, $inbox->ReceiveDt)
							->setCellValue('B'.$i, $inbox->SenderNumber)
							->setCellValue('C'.$i, $inbox->ID_BA)
							->setCellValue('D'.$i, $inbox->FreqSMS)
							->setCellValue('E'.$i, $inbox->TextSMS)
							->setCellValue('F'.$i, $inbox->Processed)
							->setCellValue('G'.$i, $inbox->ProcessedDt)
							->setCellValue('H'.$i, $inbox->ReplySMS);
				$i++;
			}
			
            //set title pada sheet (me rename nama sheet)
            $objPHPExcel->getActiveSheet()->setTitle('INBOX SMS');
 
            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
 
            //sesuaikan headernya 
            header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
            header("Cache-Control: no-store, no-cache, must-revalidate");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
            header('Content-Disposition: attachment;filename="inboxsms"'.date('YMdHis').'".xls"');
            //unduh file
			$objWriter->save("php://output");
            //Mulai dari create object PHPExcel itu ada dokumentasi lengkapnya di PHPExcel, 
            // Folder Documentation dan Example
            // untuk belajar lebih jauh mengenai PHPExcel silakan buka disitu	
		}
		
		function data(){
			$cek_login = $this->session->userdata('success_data');
			if($cek_login){
				$this->load->library('ci_phpgrid');
				$data['phpgrid'] = $this->ci_phpgrid->history_data2();
				$data5['log_history'] = $this->db->query("select top 5 * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'order by upload_date desc");
				$data5['history_count'] = $this->db->query("select * from tbl_Upload_Temp where username='".$this->session->userdata('username')."'");

				$date = $this->db->query("SELECT MIN(Tgl_Transaksi) as 'FROM', MAX(Tgl_Transaksi) as 'TOO' FROM Vw_Upload_History");
				foreach($date->result() as $db){
					$data1['date_period'] = $db->FROM.' s/d '.$db->TOO;
				}
				
				$this->load->view("others/top");
				$this->load->view("others/header",$data5);
				$this->load->view("history/header_2v",$data1);
				$this->load->view("history/history_2v",$data);
				$this->load->view("others/footer");
				$this->load->view("others/bottom");
			}else{
				$this->session->set_flashdata('login_result','Sorry, Please verify your data with login ');
				Header('Location:'.base_url().'index.php/login/');
			}
		}
	}

/*End of file history_c.php*/
/*Location:.application/controllers/history/history_c.php*/