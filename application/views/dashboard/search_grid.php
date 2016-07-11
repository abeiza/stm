			<div style="background-color:#fff; border-bottom:1px solid #fff; float:left;width:100%"><!-- Grid -->
				<div style="background-color:#fff; width:95%;margin:auto; height:100%;">
					<div id="body">
						<div style="margin-bottom:50px;">
							<h3>Result : Search Data</h3>
							<span style="font-size:12px">Find data with column search</span>
						</div>
						<?php 
							echo "<ul>";
							if($search->num_rows() == 0){
								echo "<div style='text-align:center'>Result data not found.</div>";
							}else{
								foreach($search->result() as $db){
								
								echo "
									<li style='font-size:12px;list-style:none;border-bottom:1px solid #ccc;padding-bottom:20px;'>
										<h3><i class='fa fa-building-o' style='margin-right:5px;'></i>Code Distributor : ".$db->Kode_Distributor."</h3>
										<span>Month : ".date('F', mktime(0, 0, 0, $db->Bulan, 10))."</span><br/>
										<span>Year : ".$db->Tahun."</span><br/>
										<span>Uploader : ".$db->UploadUsername."</span><br/>
										<span>Upload Date : ".$db->UploadDate."</span><br/>
										<span>Status : Success Upload</span><br/>
									</li>";
							
								}
							}
							echo "</ul>";
						?>
					</div>
				</div>
			</div><!-- End of Grid -->