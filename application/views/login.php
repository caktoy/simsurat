<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>KPKNL Bandung :: Login</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>" />
		<link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/4.2.0/css/font-awesome.min.css'; ?>" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url().'assets/fonts/fonts.googleapis.com.css'; ?>" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/ace.min.css'; ?>" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url().'assets/css/ace-part2.min.css'; ?>" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url().'assets/css/ace-rtl.min.css'; ?>" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url().'assets/css/ace-ie.min.css'; ?>" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="<?php echo base_url().'assets/js/html5shiv.min.js'; ?>"></script>
		<script src="<?php echo base_url().'assets/js/respond.min.js'; ?>"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<span class="red">KPKNL</span>
									<span class="white" id="id-text2">BANDUNG</span>
								</h1>
								<h4 class="blue" id="id-company-text">Aplikasi Administrasi<br>Surat Masuk dan Keluar</h4>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-user green"></i>
												Masukkan NIK dan Password
											</h4>

											<div class="space-6"></div>

                      <?php if (isset($_SESSION['pesan'])) { ?>
                        <div class="alert alert-block alert-danger" role="alert">
                          <!--<button type="button" class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                          </button>-->
                          <?php echo $this->session->flashdata('pesan'); ?>
                        </div>
                      <?php } ?>

											<form action="<?php echo base_url().'index.php/login/auth' ?>" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="NIP" name="nip" autofocus="true" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password" name="pass" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Masuk</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												&nbsp;
											</div>

											<div style="color: white;">
												&copy; 2015 &nbsp;
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
							</div><!-- /.position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url().'assets/js/jquery.2.1.1.min.js'; ?>"></script>

		<!-- <![endif]-->

		<!--[if IE]>
    <script src="<?php echo base_url().'assets/js/jquery.1.11.1.min.js'; ?>"></script>
    <![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url()."assets/js/jquery.min.js"; ?>'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
    <script type="text/javascript">
     window.jQuery || document.write("<script src='<?php echo base_url()."assets/js/jquery1x.min.js"; ?>'>"+"<"+"/script>");
    </script>
    <![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement)
        document.write("<script src='<?php echo base_url()."assets/js/jquery.mobile.custom.min.js"; ?>'>"+"<"+"/script>");
		</script>
	</body>
</html>
