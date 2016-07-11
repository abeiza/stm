<!DOCTYPE html>
<html>
	<head>
		<title>STM | Portal Uploader</title>
	</head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<body style="background-color:#178ce6;font-family:calibri;">
		<div style="background-color:transparent; width:100%; height:100%; position:absolute; padding:0; margin:0;top:0;left:0">
			<div style="background-color:transparent; width:90%;margin:auto; height:100%;">
				<div style="background-color:transparent;width:350px;float:right;margin-top:20%;padding:20px;">
					<?php echo form_open('login/proses_login');?>
						<div style="width:100%;float:left">
							<h3 style="width:40%;margin-bottom:5px;float:left;color:#fff;font-family:calibri;">Sign In</h3>
							<div style="width:60%;float:left;text-align:right;color:#fff;font-size:12px;padding-top:25px;font-family:calibri">(or Create Account? Please call IT)</div>
						</div>
						<input style="width:97%;float:left;margin:3px 0px;padding:5px;border:none;" name="username" type="text" placeholder="Username"/>
						<input style="width:97%;float:left;margin:3px 0px;padding:5px;border:none;" name="password" type="password" placeholder="Password"/>
						<div style="width:100%;float:left; margin-top:20px;">
							<span style="width:50%;float:left;color:#fff;font-size:12px;font-family:calibri">Forget your password?</span>
							<div style="width:50%;float:left;">
								<button style="float:right;background-color:transparent;border:1px solid #fff;color:#fff;padding:5px 10px;" type="submit"><i class="fa fa-sign-in" style="margin:5px;"></i>Sign In</button>
							</div>
						</div>
					<?php echo form_close();?>
					<div><span style="color:#fff;font-size:14px;"><?php echo validation_errors();?></span></div>
					<div><?php echo $this->session->flashdata('login_result');?></div>
				</div>
				<div style="background-color:transparent;width:350px;float:right;margin-top:20%;padding:20px;font-family:calibri;">
					<span class="fa fa-upload" style="font-size:100px;color:#fff; float:left"></span>
					<div style="width:auto;float:left;margin-top:55px;margin-left:10px;">
						<span style="font-size:32px;color:#fff">STM Uploader</span><br/>
						<span style="font-size:16px;color:#fff">Sales to Market</span>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>