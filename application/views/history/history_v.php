			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			<script>
				
				$(function(){
					$("#bulan").change(function(){
						bln=$("#bulan").val();
						thn=$("#tahun").val();
						$.ajax({
							url:"<?php echo base_url();?>index.php/history/history_c/get_outlet",
							data:"bln="+bln+"&&thn="+thn,
							cache:false,
							dataType: 'json',
							success:function(result){
								//alert(result);
								$("#kode option").remove();
								$("#kode").append('<option value="" selected disabled> -- Select Distributor -- </option>');
								$.each(result, function(i, data){
								$('#kode').append("<option value='"+data.CustomerID+"'>"+data.CustomerID+" - "+data.CustomerName+"</option>");
								});
							}
						});
					});
					
					$("#tahun").blur(function(){
						bln=$("#bulan").val();
						thn=$("#tahun").val();
						$.ajax({
							url:"<?php echo base_url();?>index.php/history/history_c/get_outlet",
							data:"bln="+bln+"&&thn="+thn,
							cache:false,
							dataType: 'json',
							success:function(result){
								//alert(result);
								$("#kode option").remove();
								$("#kode").append('<option value="" selected disabled> -- Select Distributor -- </option>');
								$.each(result, function(i, data){
								$('#kode').append("<option value='"+data.CustomerID+"'>"+data.CustomerID+" - "+data.CustomerName+"</option>");
								});
							}
						});
					});
					
					$("#tahun").change(function(){
						bln=$("#bulan").val();
						thn=$("#tahun").val();
						$.ajax({
							url:"<?php echo base_url();?>index.php/history/history_c/get_outlet",
							data:"bln="+bln+"&&thn="+thn,
							cache:false,
							dataType: 'json',
							success:function(result){
								//alert(result);
								$("#kode option").remove();
								$("#kode").append('<option value="" selected disabled> -- Select Distributor -- </option>');
								$.each(result, function(i, data){
								$('#kode').append("<option value='"+data.CustomerID+"'>"+data.CustomerID+" - "+data.CustomerName+"</option>");
								});
							}
						});
					});
				});
			</script>
			<div style="margin:30px;">
			<div style="float:left;padding:20px 5px;">
				<span>Filter Data</span>
			</div>
			<div style="float:left;padding:20px 5px;">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				   <select id="bulan" name="bulan" class="select_style">
						<?php foreach(range('1', '12') as $m) : ?>
							<option value="<?php echo $m; ?>" <?php if (date('n') == $m) { echo 'selected="selected"'; } ?>>
								<?php echo date('F', mktime(0, 0, 0, $m, 10)) ?>
							 </option>
						<?php endforeach; ?>
				   </select>
				   <input id="tahun" name="tahun" placeholder="YYYY - Year" value="<?php echo date('Y');?>" type="number" style="border-radius:3px;border: solid 1px #DADADA;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);height:18px;padding:1px 10px;"/>
				   <select id="kode" name="kode" class="select_style">
						<option value="" selected disabled> -- Select Distributor -- </option>
						<?php 
						$query = $this->db->query("select View_ADI_Qlik_SalesOrg.CustomerID, View_ADI_Qlik_SalesOrg.CustomerName from tbl_Upload_STM, View_ADI_Qlik_SalesOrg WHERE tbl_Upload_STM.Kode_Distributor=View_ADI_Qlik_SalesOrg.CustomerID and tbl_Upload_STM.Tahun='".date('Y')."' AND tbl_Upload_STM.Bulan='".date('n')."' order by CustomerID");
						foreach($query->result() as $db){?>
							
							<option value="<?php echo $db->CustomerID;?>">
								<?php echo $db->CustomerID.' - <h4>'.$db->CustomerName;?></h4>
							</option>
							
						<?php
						}
					   ?>
				   </select>
				   <input type="submit" name="submit" value="Filter"><br>
				</form>
			</div>
			</div>
			<div style="background-color:#82d0fa; border-bottom:1px solid #fff; float:left;width:100%"><!-- Grid -->
				<div style="background-color:transparent; width:100%;margin:auto; height:100%;">
					<div id="body">
						<?php 
							$phpgrid->enable_edit("INLINE","R"); 
							$phpgrid->set_dimension(1330, false); 
							$phpgrid->set_sortname('ObjectID', 'asc');
							$phpgrid->set_caption("<h3 style='text-align:center'>History Data</h3>");
							$phpgrid->set_dimension('1370');
							$phpgrid->enable_search(true);
							$phpgrid->set_theme('cobalt-flat');
							if(isset($_POST['submit'])) 
							{ 
								if(empty($_POST['kode'])){
									$bulan = $_POST['bulan'];
									$tahun = $_POST['tahun'];
									$phpgrid->set_query_filter("Bulan='".$bulan."' and Tahun='".$tahun."'");
								}else{
									$bulan = $_POST['bulan'];
									$tahun = $_POST['tahun'];
									$kode = $_POST['kode'];
									$phpgrid->set_query_filter("Bulan='".$bulan."' and Tahun='".$tahun."' and Kode_Distributor='".$kode."'");
								}
							}else{
								$phpgrid->set_query_filter("Kode_Produk=''");
							}
							$phpgrid->set_col_title("ObjectID", "No.");
							$phpgrid->set_col_title("Kode_Distributor", "Distributor Code");
							$phpgrid->set_col_title("Bulan", "Month");
							$phpgrid->set_col_title("Tahun", "Year");
							//$phpgrid->set_col_title("Tgl_Transaksi", "Date Trans.");
							$phpgrid->set_col_title("Salesman", "Salesman");
							$phpgrid->set_col_title("Type_Outlet", "Outlet Type");
							$phpgrid->set_col_title("Kode_Outlet", "Outlet Code");
							$phpgrid->set_col_title("Nama_Outlet", "Outlet Name");
							$phpgrid->set_col_title("Kode_Produk", "Product Code");
							$phpgrid->set_col_title("Value_HET", "Value HET");
							$phpgrid->set_col_hidden("UploadDate");
							$phpgrid->set_col_hidden("UploadUsername");
							
							$phpgrid->set_col_align('ObjectID', 'center');
							$phpgrid->set_col_align('Tahun', 'center');
							$phpgrid->set_col_align('Bulan', 'center');
							$phpgrid->set_col_align('Unit', 'center');
							$phpgrid->set_col_align('Kode_Distributor', 'center');
							
							$phpgrid->set_col_width("ObjectID",40);
							$phpgrid->set_col_width("Unit",40);
							$phpgrid->set_col_width("Bulan",50);
							$phpgrid->set_col_width("Tahun",50);
							$phpgrid->set_col_width("Nama_Outlet",300);
							
							$phpgrid->set_col_currency("Value_HET", "IDR ", "", ",", 2, "0.00");
							$phpgrid->set_col_currency("HET", "IDR ", "", ",", 2, "0.00");

							
							$phpgrid->enable_export('EXCEL');
						
							$phpgrid->display(); 
						?>
					</div>
				</div>
			</div>