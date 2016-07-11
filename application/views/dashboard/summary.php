			<div style="background-color:#178ce6; margin-top:-20px;float:left;width:100%"><!-- Summary Data -->
				<div style="background-color:transparent; width:95%; height:100%;color:#fff;margin:20px auto;">
					<div><?php echo $warning_kode;?></div>
					<h3 style="margin:3px auto;">Summary</h3>
					<div style="width:100%;float:left;margin:10px auto;">
						<div>
							<ul style="margin:3px auto; font-size:14px;">
							<?php 
									foreach($summary->result() as $db) 
									{
										echo "<li>Count Rows : ".$db->ROWSS."</li>";
										echo "<li>Unit Sales : ".$db->UNIT_SALES."</li>";
										echo "<li>Value HET Sales : IDR ".number_format($db->HET_SALES, 2)."</li>";
										echo "<li>Unit Return: ".$db->UNIT_RETURN."</li>";
										echo "<li>Value HET Return : IDR ".number_format($db->HET_RETURN, 2)."</li>";
										echo "<li>TOTAL : IDR ".number_format($db->TOTAL, 2)."</li>";
									}
										echo "<li>Check Again : ".$check1->num_rows()."</li>";
										echo "<li>Not Available : ".$check2->num_rows()."</li>";
							?>
							</ul>
						</div>
					</div>
					<div style="width:100%;float:left;margin:10px auto;">
						<?php
							if(!$warning_kode){
								echo '<a id="upload" href="'.base_url().'index.php/dashboard/dashboard_c/migrasi/'.$table.'/'.$kode.'/'.$bulan.'/'.$tahun.'"><button style="cursor:pointer;border-radius:3px;border: solid 1px #DADADA;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);height:25px;padding:1px 10px;color:#fff;background-color:#178ce6"><i class="fa fa-upload"  style="padding-right:5px;"></i>Upload</button></a>';
							}else{
								echo '<a style="display:none;" id="upload" href="'.base_url().'"index.php/dashboard/dashboard_c/migrasi/'.$table.'/'.$kode.'/'.$bulan.'/'.$tahun.'"><buttonstyle="cursor:pointer;border-radius:3px;border: solid 1px #DADADA;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);height:25px;padding:1px 10px;color:#fff;background-color:#178ce6"><i class="fa fa-upload"  style="padding-right:5px;"></i>Upload</button></a>';
							}
						?>
						<a href="<?php echo base_url();?>index.php/dashboard/dashboard_c/cancel/<?php echo $table; ?>"><button style="cursor:pointer;border-radius:3px;border: solid 1px #DADADA;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);height:25px;padding:1px 10px;color:#fff;background-color:#178ce6"><i class="fa fa-close"  style="padding-right:5px;"></i>Cancel Upload</button></a>
						<a style="float:right;" href="<?php echo base_url();?>"><button style="cursor:pointer;border-radius:3px;border: solid 1px #DADADA;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);height:25px;padding:1px 10px;color:#fff;background-color:#178ce6"><i class="fa fa-undo"  style="padding-right:5px;"></i>Back</button></a>
					</div>
				</div>
			</div><!-- End of Summary -->