			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			<script>
				
				$(function(){
					$("#bulan").change(function(){
						bln=$("#bulan").val();
						thn=$("#tahun").val();
						$.ajax({
							url:"<?php echo base_url();?>index.php/master/master_price/get_product",
							data:"bln="+bln+"&&thn="+thn,
							cache:false,
							dataType: 'json',
							success:function(result){
								//alert(result);
								$("#kode option").remove();
								$("#kode").append('<option value="" selected disabled> -- Select Product -- </option>');
								$.each(result, function(i, data){
								$('#kode').append("<option value='"+data.ID_Produk+"'>"+data.ID_Produk+" - "+data.nama_produk+"</option>");
								});
							}
						});
					});
					
					$("#tahun").blur(function(){
						bln=$("#bulan").val();
						thn=$("#tahun").val();
						$.ajax({
							url:"<?php echo base_url();?>index.php/master/master_price/get_product",
							data:"bln="+bln+"&&thn="+thn,
							cache:false,
							dataType: 'json',
							success:function(result){
								//alert(result);
								$("#kode option").remove();
								$("#kode").append('<option value="" selected disabled> -- Select Product -- </option>');
								$.each(result, function(i, data){
								$('#kode').append("<option value='"+data.ID_Produk+"'>"+data.ID_Produk+" - "+data.nama_produk+"</option>");
								});
							}
						});
					});
					
					$("#tahun").change(function(){
						bln=$("#bulan").val();
						thn=$("#tahun").val();
						$.ajax({
							url:"<?php echo base_url();?>index.php/master/master_price/get_product",
							data:"bln="+bln+"&&thn="+thn,
							cache:false,
							dataType: 'json',
							success:function(result){
								//alert(result);
								$("#kode option").remove();
								$("#kode").append('<option value="" selected disabled> -- Select Product -- </option>');
								$.each(result, function(i, data){
								$('#kode').append("<option value='"+data.ID_Produk+"'>"+data.ID_Produk+" - "+data.nama_produk+"</option>");
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
						<option value="" selected disabled> -- Select Product -- </option>
						<?php 
						$query = $this->db->query("select DISTINCT tbl_Upload_Ms_Produk.ID_Produk, tbl_Upload_Ms_Produk.nama_produk from tbl_Upload_STM, tbl_Upload_Ms_Produk WHERE tbl_Upload_STM.Kode_Produk=tbl_Upload_Ms_Produk.ID_Produk and tbl_Upload_STM.Tahun='".date('Y')."' AND tbl_Upload_STM.Bulan='".date('n')."' order by ID_Produk");
						foreach($query->result() as $db){?>
							
							<option value="<?php echo $db->ID_Produk;?>">
								<?php echo $db->ID_Produk.' - <h4>'.$db->nama_produk;?></h4>
							</option>
							
						<?php
						}
					   ?>
				   </select>
				   <input type="submit" name="submit" value="Filter"><br>
				</form>
			</div>
			</div>
			<div style="background-color:#fff; border-bottom:1px solid #fff; float:left;width:100%"><!-- Grid -->
				<div style="background-color:transparent; width:100%;margin:auto; height:100%;margin:auto;">
					<div id="body">
						<?php 
							$phpgrid->enable_edit("INLINE",'R'); 
							//$phpgrid->set_dimension(1330, false); 
							$phpgrid ->set_sortname('tahun, bulan, ID_Produk', 'asc');
							$phpgrid->set_caption("<h3 style='text-align:center;'>Table Master Price</h3>");
							$phpgrid->set_dimension('1370');
							$phpgrid->set_col_hidden('ObjectID');
							/*$phpgrid->set_col_hidden('Text');
							$phpgrid->set_col_width('ReplySMS',50);*/
							$phpgrid->enable_search(true);
							$phpgrid->set_theme('cobalt-flat');
							$phpgrid->set_col_title("ID_Produk", "Product ID");
							$phpgrid -> set_col_edittype("Bulan", "autocomplete", "1:January;2:February;3:March;4:April;5:May;6:June;&:July;8:August;9:September;10:October;11:November;12:December;", false);
							
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
									$phpgrid->set_query_filter("Bulan='".$bulan."' and Tahun='".$tahun."' and ID_Produk='".$kode."'");
								}	
							}else{
								$phpgrid->set_query_filter("ID_Produk=''");
							}
							
							$phpgrid->set_col_title("Bulan", "Month");
							$phpgrid->set_col_title("Tahun", "Year");
							
							$phpgrid->set_col_align('Tahun', 'center');
							$phpgrid->set_col_align('Bulan', 'center');
							$phpgrid->set_col_align('ID_Produk', 'center');
							

							$phpgrid->set_col_currency("HET", "IDR ", "", ",", 2, "0.00");
							$phpgrid->enable_export('EXCEL');
						
							$phpgrid->display(); 
						?>
					</div>
				</div>
			</div>