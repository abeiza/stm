		<a href="<?php echo base_url();?>index.php/login/proses_logout"><button>Logout</button></a>
		<?php ?>
		<?php echo $this->session->flashdata('upload_result');?>
		<?php echo form_open_multipart('upload/upload_c/proses');?>
		<label>Bulan :</label>
		<select name="bulan">
			<option value="1">Januari</option>
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
			<option value="12">Desember</option>
		</select>
		<label>Tahun :</label>
		<input name="tahun" type="text" placeholder="Tahun Laporan"/>
		<label>Kode Distributor :</label>
		<input name="kode" type="text" placeholder="Kode Distributor"/>
		<input type="file" name="excel"/>
		<button type="submit">Periksa</button>
		<?php echo form_close();?>
		<div><?php echo validation_errors();?></div>