<div style="margin-left:35px;margin-top:180px;">
	<div style="border:1px solid #82d0fa;position:relative;float:left;">
		<div style="background-color:#82d0fa;padding:10px;color:#fff;">
			Form Add
		</div>
		<div style="padding:10px;font-size:12px;color:red;">
			<?php echo validation_errors();?>
			<?php echo $this->session->flashdata('add_result');?>
		</div>
		<div style="padding:20px 10px; width:400px;font-size:12px;">
		<?php echo form_open('master/master_produk/add_act/');?>
		   <div style="width:100%;float:left;margin:5px 0px;">
			<label style="width:40%;float:left;">ID Product : </label>
			<input style="width:50%;float:left;" type="text" name="id"/>
		   </div>
		   <div style="width:100%;float:left;margin:5px 0px;">
			<label style="width:40%;float:left;">Product Name : </label>
			<input style="width:50%;float:left;" type="text" name="name"/>
		   </div>
		   <div style="width:100%;float:left;margin:5px 0px;">
			<label style="width:40%;float:left;">Product Group : </label>
			<input style="width:50%;float:left;" type="text" name="group"/>
		   </div>
		   <div style="width:100%;float:left;margin:5px 0px;">
			<label style="width:40%;float:left;">Product Category : </label>
			<input style="width:50%;float:left;" type="text" name="category"/>
		   </div>
		   <div style="width:100%;float:left;margin:5px 0px;">
			<label style="width:40%;float:left;">Product Type : </label>
			<input style="width:50%;float:left;" type="text" name="type"/>
		   </div>
		   <div style="width:100%;float:left;margin:5px 0px;">
			<label style="width:40%;float:left;">HET : </label>
			<input style="width:50%;float:left;" type="text" name="het"/>
		   </div>
		   
		   <div style="width:100%;float:left;margin-top:5px;margin-bottom:20px;">
			<div style="width:40%;float:left;">&nbsp;</div>
			<div style="width:50%;float:left;">
			<button type="submit" style="border:1px solid #fff; background-color:#82d0fa;color:#fff;font-size:12px;padding:5px;border-radius:3px;cursor:pointer;"><i style="margin-right:5px;" class="fa fa-plus"></i>Add</button></a>
			<a href="<?php echo base_url().'index.php/master/master_produk/'?>" style="text-decoration:none;color:#fff;border:1px solid #fff; background-color:#82d0fa;font-size:12px;padding:5px;border-radius:3px;cursor:pointer;"><i style="margin-right:5px;" class="fa fa-undo"></i>Back</a>
			</div>
		   </div>
		<?php echo form_close();?>
		</div>
	</div>
</div>