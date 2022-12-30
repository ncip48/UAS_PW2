<!DOCTYPE html>
<html lang="en">

<head>

	<!-- metas -->
	<meta charset="utf-8">
	<meta name="author" content="Chitrakoot Web" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="keywords" content="Septosha Hotel Booking Bootstrap Template" />
	<meta name="description" content="Fivestar - Hotel Booking Bootstrap Template" />

	<!-- title  -->
	<title>Login</title>

	<!-- favicon -->
	<link rel="shortcut icon" href="/img/logos/favicon.png" />

	<!-- core style css -->
	<link href="<?= base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/dist/css/login.css') ?>" rel="stylesheet" />

</head>

<body>

	<!-- start page loading -->
	<!-- <div id="preloader">
		<div class="row loader">
			<div class="loader-icon"></div>
		</div>
	</div> -->
	<!-- end page loading -->

	<!-- start main-wrapper section -->
	<div class="main-wrapper">
		<!-- start login section -->
		<div class="d-flex align-items-center position-relative min-vh-100">
			<!-- start left content -->
			<div class="col-sm-8 center-col col-md-7 col-xl-4 d-lg-flex align-items-center px-0">
				<div class="w-100 padding-50px-all sm-padding-30px-all xs-padding-20px-all">
					<?php if ($this->session->flashdata('login_error')) { ?>
						<?= $this->session->flashdata('login_error') ?>
					<?php } ?>
					<h3>Login</h3>
					<form method="POST" action="<?= base_url('login') ?>" autocomplete="off">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="email" class="col-form-label text-md-end">Email</label>
									<input id="email" type="email" name="email" autocomplete="email" autofocus value="<?php echo set_value('email'); ?>">
									<span class="invalid-feedback d-block" role="alert">
										<?php echo form_error('email'); ?>
									</span>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label for="password" class="col-form-label text-md-end">Password</label>
									<input id="password" type="password" name="password" autocomplete="current-password">
									<span class="invalid-feedback d-block" role="alert">
										<?php echo form_error('password'); ?>
									</span>
								</div>
							</div>

						</div>

						<div class="col-md-12 margin-25px-top p-0">
							<div class="d-grid gap-2">
								<button type="submit" class="butn btn-block">Login</button>
							</div>
						</div>
					</form>
				</div>

			</div>
			<!-- end left content -->

			<!-- start right content -->
			<div class="container-fluid bg-img height-100vh xs-display-none d-flex justify-content-center align-items-center">
				<img src="<?= base_url('assets/images/rps.png') ?>" alt="bg" />
			</div>
			<!-- end right content -->

		</div>
		<!-- end login section -->

	</div>
	<!-- end main-wrapper section -->

	<!-- start scroll to top -->
	<a href="javascript:void(0)" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
	<!-- end scroll to top -->

	<!-- all js include start -->

	<!-- jQuery -->
	<script src="/js/jquery.min.js"></script>

	<!-- modernizr js -->
	<script src="/js/modernizr.js"></script>

	<!-- bootstrap -->
	<script src="/js/bootstrap.min.js"></script>

	<!-- Serch -->
	<script src="/search/search.js"></script>

	<!-- navigation -->
	<script src="/js/nav-menu.js"></script>

	<!-- tab -->
	<script src="/js/easy.responsive.tabs.js"></script>

	<!-- owl carousel -->
	<script src="/js/owl.carousel.js"></script>

	<!-- jquery.counterup.min -->
	<script src="/js/jquery.counterup.min.js"></script>

	<!-- stellar js -->
	<script src="/js/jquery.stellar.min.js"></script>

	<!-- waypoints js -->
	<script src="/js/waypoints.min.js"></script>

	<!-- countdown js -->
	<script src="/js/countdown.js"></script>

	<!-- jquery.magnific-popup js -->
	<script src="/js/jquery.magnific-popup.min.js"></script>

	<!-- datepicker js -->
	<script src="/js/datepicker.min.js"></script>

	<!-- isotope.pkgd.min js -->
	<script src="/js/isotope.pkgd.min.js"></script>

	<!-- custom scripts -->
	<script src="/js/main.js"></script>

	<!-- all js include end -->

</body>

</html>
