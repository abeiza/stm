			<div style="background-color:#fff; border-bottom:1px solid #fff; float:left;width:100%"><!-- Grid -->
				<div style="background-color:transparent; width:100%;margin:auto; height:100%;">
					<div id="body">
						<?php 
							$phpgrid->enable_edit("INLINE",'R'); 
							$phpgrid->enable_search(true);
							//$phpgrid->enable_edit('FORM', 'R');
							$phpgrid->set_theme('cobalt-flat');
							$phpgrid->set_caption('<h3>Data Upload File</h3>Code Distributor : '.$kode.' | Month : '.$bulan.' | Year : '.$tahun);
							$phpgrid->set_dimension('1349');
							
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
							
							//$phpgrid -> set_col_edittype("Status", "autocomplete", "0:Check Again;1:OK;", false);
							
							$phpgrid->set_col_currency("Value_HET", "IDR ", "", ",", 2, "0.00");
							$phpgrid->set_col_currency("HET", "IDR ", "", ",", 2, "0.00");

							
							$phpgrid->enable_export('EXCEL');
							//$phpgrid->enable_export('PDF');
							$phpgrid->display(); 
						?>
					</div>
				</div>
			</div><!-- End of Grid -->