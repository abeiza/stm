			<div style="background-color:#fff; border-bottom:1px solid #fff; float:left;width:100%"><!-- Grid -->
				<div style="background-color:#fff; width:95%;margin:auto; height:100%;">
					<div id="body">
						<div style="margin-bottom:50px;">
							<h3>Recent Upload</h3>
							<span style="font-size:12px">List All Data Upload Not Execution</span>
						</div>
						<?php 
							foreach($history_count->result() as $db){
								echo "<ul>";
								echo "
									<li style='font-size:12px;list-style:none;border-bottom:1px solid #ccc;padding-bottom:20px;'>
										<h3><a style='text-decoration:none;color:#666' href='".base_url().'index.php/dashboard/dashboard_c/result/'.$db->id_table.'/'.$db->kode.'/'.$db->bulan.'/'.$db->tahun.''."'><i class='fa fa-clock-o' style='margin-right:5px;'></i>".$db->upload_date."</a></h3>
										<span>Code Distributor : ".$db->kode."</span><br/>
										<span>Month : ".date('F', mktime(0, 0, 0, $db->bulan, 10))."</span><br/>
										<span>Year : ".$db->tahun."</span><br/>
										<span>Uploader : ".$db->username."</span><br/>
									</li>";
								echo "</ul>";
							}
						?>
					</div>
				</div>
			</div><!-- End of Grid -->