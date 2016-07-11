			<div style="background-color:#82d0fa; border-bottom:1px solid #fff; float:left;width:100%"><!-- Grid -->
				<div style="background-color:transparent; width:100%;margin:auto; height:100%;">
					<div id="body">
						<?php 
							$phpgrid->enable_edit("INLINE","R"); 
							$phpgrid->set_dimension(1330, false); 
							$phpgrid ->set_sortname('ObjectID', 'asc');
							$phpgrid->set_caption("<h3 style='text-align:center'>History Data</h3>");
							$phpgrid->set_dimension('1349');
							/*$phpgrid->set_col_hidden('Text');
							$phpgrid->set_col_hidden('Coding');
							$phpgrid->set_col_hidden('object_id');
							$phpgrid->set_col_hidden('RecipientID');
							$phpgrid->set_col_hidden('Class');
							$phpgrid->set_col_hidden('SMSCNumber');
							$phpgrid->set_col_width('Processed',10);
							$phpgrid->set_col_width('status',11);
							$phpgrid->set_col_width('UDH',20);
							$phpgrid->set_col_width('SenderNumber',30);
							$phpgrid->set_col_width('ReceivingDateTime',30);
							$phpgrid->set_col_width('ReplySMS',50);*/
							$phpgrid->enable_search(true);
							$phpgrid->set_theme('cobalt-flat');
							
							$phpgrid->set_col_title("ObjectID", "No.");
							$phpgrid->set_col_title("Kode_Distributor", "Distributor Code");
							$phpgrid->set_col_title("Bulan", "Month");
							$phpgrid->set_col_title("Tahun", "Year");
							$phpgrid->set_col_title("Tgl_Transaksi", "Date Trans.");
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
							
							$phpgrid->set_col_currency("Value_HET", "IDR", "", ",", 2, "0.00");
							$phpgrid->set_col_currency("HET", "IDR", "", ",", 2, "0.00");

							
							$phpgrid->enable_export('EXCEL');
						
							$phpgrid->display(); 
						?>
					</div>
				</div>
			</div>