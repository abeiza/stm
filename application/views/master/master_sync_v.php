			<div style="background-color:#fff; margin-top:0px;float:left;width:100%;"><!-- Summary Data -->
				<div style="background-color:transparent; width:95%; height:100%;color:#666;margin:20px auto;">
					<h3 style="margin:3px auto;">Form Sync For Price</h3>
					<div style="width:100%;float:left;margin:10px auto;">
						<div>
							<?php echo form_open('master/master_produk/sync');?>
								<select name="bulan" class="select_style">
									<?php foreach(range('1', '12') as $m) : ?>
										<option value="<?php echo $m; ?>" <?php if (date('n') == $m) { echo 'selected="selected"'; } ?>>
											<?php echo date('F', mktime(0, 0, 0, $m, 10)) ?>
										 </option>
									<?php endforeach; ?>
								</select>
								<input name="tahun" placeholder="YYYY - Year" value="<?php echo date('Y');?>" type="number" style="border-radius:3px;border: solid 1px #DADADA;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);height:18px;padding:1px 10px;"/>
								<button type="submit" style="cursor:pointer;border-radius:3px;border: solid 1px #DADADA;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);height:25px;padding:1px 10px;color:#fff;background-color:#178ce6"><i class="fa fa-refresh"  style="padding-right:5px;"></i>Sync</button>
							<?php echo form_close(); ?>
						</div>
						<?php echo $this->session->flashdata('sync_result');?>
					</div>
				</div>
			</div><!-- End of Summary -->