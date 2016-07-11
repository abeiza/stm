			<style>
			.dropbtn {
				background-color: transparent;
				color: #666;
				//padding: 16px 0px;
				font-size: 14px;
				border: none;
				cursor: pointer;
			}

			.dropdown {
				position: relative;
				display: inline-block;
			}

			.dropdown-content {
				display: none;
				position: absolute;
				right: 0;
				background-color: #f9f9f9;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			}

			.dropdown-content a {
				color: #787878;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
				//border-bottom: 1px solid #F4F4F4;
				border-top: 1px solid #F4F4F4;
			}

			.dropdown-content a:hover {background-color: #f1f1f1}

			.dropdown:hover .dropdown-content {
				display: block;
			}

			.dropdown:hover .dropbtn {
				//background-color:#8dc43f;
			}
			</style>
			<div style="background-color:#fff; float:left; width:100%"><!-- Header -->
				<div style="background-color:transparent; width:95%;margin:auto; height:100%;">
					<div style="width:30%;float:left">
						<i class="fa fa-upload fa-3x" style="color:#178ce6; margin-right:10px;padding:10px 0px;float:left;"></i>
						<div style="width:auto;float:left;margin-top:10px;font-family:calibri;">
							<span style="font-size:24px;color:#178ce6">STM Uploader</span><br/>
							<span style="font-size:14px;color:#178ce6">Sales to Market</span>
						</div>
					</div>
					<div style="width:70%;margin-top:30px;float:left">
						<div style="float:right;">
							<?php echo form_open('dashboard/dashboard_c/search/');?>
								<input style="border:1px solid #ccc;border-radius:3px;padding:5px;" type="search" name="search" placeholder="Search"/>
							</form>
						</div>
						<div style="float:right;font-size:14px;color:#666;margin-right:50px;margin-top:5px;margin-bottom:5px;">
							<a href="<?php echo base_url();?>" style="margin:0px 10px;color:#666;text-decoration:none;"><i class="fa fa-home" style="color:#178ce6; margin-right:5px;"></i>Home</a>
							<div class="dropdown" style="margin:0px 10px;color:#666;text-decoration:none;">
								<?php 
									if($log_history->num_rows() == 0){ ?>
									
								<?php 	}else{ ?>
									<strong style="background:red;font-size:12px;margin-top:-5px;position:absolute;color:#fff;border-radius:100%; padding:1px 5px;"><?php echo $history_count->num_rows(); ?></strong>
								<?php	}
								?> 
								<button class="dropbtn"><i class="fa fa-flag" style="color:#178ce6; margin-right:5px;"></i>Outstanding</button>
								<div class="dropdown-content" style="background:#fff;position:absolute;color:#000;width:250px;height:300px;margin-left:93px;z-index:9;">
									<div style="padding-top:10px;position:fixed;background-color:#fff;width:250px;text-align:center">
										<strong style="font-weight:normal;padding:7px 10px;color:#444;font-size:14px;">You have <?php echo $history_count->num_rows();?> data not execution</strong>
									</div>
									<?php if($log_history->num_rows() == 0){ ?>
										
									<?php 	}else{ 
												echo '<div style="margin-top:260px;text-align:center;position:fixed;background-color:#fff;width:250px;">
													<strong style="font-weight:normal;color:#444;font-size:14px;"><a href="'.base_url().'index.php/dashboard/dashboard_c/recent/'.'">See All Data</a></strong>
												</div>';
												echo "<div style='margin:40px 0px;overflow:auto;width:250;height:220px'>";
												foreach($log_history->result() as $db){
													echo "<a href='".base_url().'/index.php/dashboard/dashboard_c/result/'.$db->id_table.'/'.$db->kode.'/'.$db->bulan.'/'.$db->tahun."'><strong style='font-size:12px;'><i class='fa fa-clock-o' style='margin-right:5px'></i>".$db->upload_date."</strong><p>Kode Distributor : ".$db->kode."<br>Period : ".date('F', mktime(0, 0, 0, $db->bulan, 10))." ".$db->tahun."</p></a>";
												}
												echo '</div>';
											}		
									?> 
								</div>
							</div>
							<a href="<?php echo base_url();?>index.php/master/master_produk/" style="margin:0px 10px;color:#666;text-decoration:none;"><i class="fa fa-pencil-square-o" style="color:#178ce6; margin-right:5px;"></i>Product</a>
							<a href="<?php echo base_url();?>index.php/master/master_price/" style="margin:0px 10px;color:#666;text-decoration:none;"><i class="fa fa-desktop" style="color:#178ce6; margin-right:5px;"></i>Monthly Price</a>
							<!--<a href="<?php //echo base_url();?>index.php/history/history_c/data" style="margin:0px 10px;color:#666;text-decoration:none;"><i class="fa fa-database" style="color:#178ce6; margin-right:5px;"></i>All Data</a>-->
							<a href="<?php echo base_url();?>index.php/history/history_c" style="margin:0px 10px;color:#666;text-decoration:none;"><i class="fa fa-history" style="color:#178ce6; margin-right:5px;"></i>History</a>
							<a href="<?php echo base_url();?>index.php/login/proses_logout" style="margin:0px 10px;color:#666;text-decoration:none;"><i class="fa fa-sign-out" style="color:#178ce6; margin-right:5px;"></i>Sign out</a>
						</div>
					</div>
				</div>
			</div><!-- End of Header -->