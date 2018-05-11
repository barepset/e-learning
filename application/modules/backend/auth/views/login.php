<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>Hiwell | Admin</title>
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bootstrap/css/bootstrap.min.css">
	  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bootstrap/fonts/font-awesome.min.css">
	  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bootstrap/css/ionicons.min.css">
	  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/AdminLTE.min.css">
	  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/iCheck/square/blue.css">
	</head>
		<body class="hold-transition login-page">
			<div class="login-box">
			  <div class="login-logo">
			    <a href="#"><b>Hiwell</b>&nbsp;Admin</a>
			  </div>
			  <br><br><br>
			  <div class="login-box-body">
			  	<?php show_alert('success',$this->session->flashdata('delete_msg'));?>
			    <p class="login-box-msg">Silahkan login terlebih dahulu</p>

			    <form action="<?php echo base_url(); ?>backend/auth/getlogin" onsubmit="return cekform();" method="post">
			      <div class="form-group has-feedback">
			        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
			        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			      </div>
			      <div class="form-group has-feedback">
			        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
			        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
			      </div>
			      <div class="row">
			        <div class="col-xs-8">
			        </div>
			        <div class="col-xs-4">
			          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
			        </div>
			      </div>
			    </form>
			  </div>
			</div>
		<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/adminlte/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/adminlte/plugins/iCheck/icheck.min.js"></script>
		<script>
		  $(function () {
		    $('input').iCheck({
		      checkboxClass: 'icheckbox_square-blue',
		      radioClass: 'iradio_square-blue',
		      increaseArea: '20%'
		    });
		  });
		</script>
	</body>
</html>
