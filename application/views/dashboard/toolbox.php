			<div style="background-color:#f2faff; border-top: 1px solid #82d0fa; border-bottom: 1px solid #82d0fa; float:left;width:100%;"><!-- ToolBox -->
				<div style="background-color:transparent; width:95%;margin:auto; height:100%;">
					<div style="margin:15px auto;">
						<div style="float:left; margin-right:20px;">
							<span><strong>Hello <?php echo $this->session->userdata('username');?></strong> , Please upload your file</span>
						</div>
						<?php echo $this->session->flashdata('upload_result');?>
						<?php echo form_open_multipart('upload/upload_c/proses');?>
							<div style="margin:auto 10px; float:left">
								<i class="fa fa-calendar" style="color:#82d0fa;margin-right:5px;"></i>
								<select name="bulan" class="select_style">
										<?php foreach(range('1', '12') as $m) : ?>
											<option value="<?php echo $m; ?>" <?php if (date('n') == $m) { echo 'selected="selected"'; } ?>>
												<?php echo date('F', mktime(0, 0, 0, $m, 10)) ?>
											 </option>
										<?php endforeach; ?>
									<!--<option value="1">Januari</option>
									<option value="2">Februari</option>
									<option value="3">Maret</option>
									<option value="4">April</option>
									<option value="5">Mei</option>
									<option value="6">Juni</option>
									<option value="7">Juli</option>
									<option value="8">Agustus</option>
									<option value="9">September</option>
									<option value="10">Oktober</option>
									<option value="11">November</option>
									<option value="12">Desember</option>-->
								</select>
								<input name="tahun" placeholder="YYYY - Year" value="<?php echo date('Y');?>" type="number" style="border-radius:3px;border: solid 1px #DADADA;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);height:18px;padding:1px 10px;"/>
							</div>
							<div style="margin:auto 10px; float:left">
								<i class="fa fa-truck" style="color:#82d0fa;margin-right:5px;"></i>
								<input name="kode" type="text" placeholder="Distributor Code" style="border-radius:3px;border: solid 1px #DADADA;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);height:18px;padding:1px 10px;"/>
							</div>
							<div style="margin:auto 10px; float:left">
								<i class="fa fa-folder-open" style="color:#82d0fa;margin-right:5px;"></i>
								<input type="file" name="excel" />
							</div>
							<button type="submit" style="cursor:pointer;border-radius:3px;border: solid 1px #DADADA;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);height:25px;padding:1px 10px;color:#fff;background-color:#178ce6"><i class="fa fa-check" style="padding-right:5px;"></i>Check</button>
						<?php echo form_close();?>
						<div><span style="color:#aa2e33;font-size:14px;"><?php echo validation_errors();?></span></div>
					</div>
				</div>
			</div><!-- End of Toolbox -->