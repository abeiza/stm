			<div style="background-color:#82d0fa; border-bottom:1px solid #fff; float:left;width:100%;"><!-- Grid -->
				<div style="background-color:transparent; width:100%;margin:auto; height:100%;margin:auto;">
					<div id="body">
						<?php 
							$phpgrid->enable_edit("INLINE",'RUD'); 
							//$phpgrid->set_dimension(1330, false); 
							$phpgrid ->set_sortname('ObjectID', 'asc');
							$phpgrid->set_caption("<div style='margin-top:30px;margin-left:25px;width:250px;position:absolute'><a href='".base_url().'index.php/master/master_produk/add/'."' style='text-decoration:none;border:1px solid #fff; background-color:#82d0fa;color:#fff;font-size:12px;padding:5px;border-radius:3px;cursor:pointer;'><i style='margin-right:3px;' class='fa fa-plus'></i>Add New Product</a><a href='".base_url().'index.php/master/master_produk/export_excel/'."' style='text-decoration:none;border:1px solid #fff; background-color:#82d0fa;color:#fff;font-size:12px;padding:5px;border-radius:3px;cursor:pointer;margin:0px 10px'><i style='margin-right:3px;' class='fa fa-file-excel-o'></i>Export to Excel</a></div><h3 style='text-align:center;'>Table Master Product</h3>");
							$phpgrid-> enable_autowidth(true);
							$phpgrid->set_col_hidden('ObjectID');
							/*$phpgrid->set_col_hidden('Text');
							$phpgrid->set_col_width('ReplySMS',50);*/
							$phpgrid->enable_search(true);
							$phpgrid->set_theme('cobalt-flat');
							$phpgrid->set_col_title("ID_Produk", "Product ID");
							$phpgrid->set_col_title("Group_produk", "Product Group");
							$phpgrid->set_col_title("Kategori_produk", "Product Category");
							$phpgrid->set_col_title("Type_produk", "Product Type");
							//$phpgrid -> set_col_edittype("Bulan", "autocomplete", "1:January;2:February;3:March;4:April;5:May;6:June;&:July;8:August;9:September;10:October;11:November;12:December;", false);
							
							$phpgrid->set_col_title("nama_produk", "Product Name");
							$phpgrid->set_col_readonly("ID_Produk");

							$phpgrid->set_col_align('ID_Produk', 'center');
							$phpgrid->set_col_align('Group_produk', 'center');
							$phpgrid->set_col_align('Kategori_produk', 'center');
							$phpgrid->set_col_align('Type_produk', 'center');
							

							//$phpgrid->set_col_currency("HET", "IDR ", "", ",", 2, '');
							$phpgrid->enable_export('EXCEL');
						
							$phpgrid->display(); 
						?>
					</div>
				</div>
			</div>