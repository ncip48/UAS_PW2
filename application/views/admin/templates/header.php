<?php
$user_data = $this->session->userdata('userdata');
$user = $this->db->get_where('tb_user', ['id' => $user_data['id']], 1, 0)->row();
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template">
	<meta name="description" content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
	<meta name="robots" content="noindex,nofollow">
	<title>RPS System - <?= $title ?></title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon.png') ?>">
	<!-- Custom CSS -->
	<link href="<?= base_url('assets/libs/chartist/dist/chartist.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') ?>" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?= base_url('assets/dist/css/style.min.css') ?>" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader">
		<div class="lds-ripple">
			<div class="lds-pos"></div>
			<div class="lds-pos"></div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="mini-sidebar" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full" class="mini-sidebar">
		<!-- ============================================================== -->
		<!-- Topbar header - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<header class="topbar" data-navbarbg="skin6">
			<nav class="navbar top-navbar navbar-expand-md navbar-light">
				<div class="navbar-header" data-logobg="skin6">
					<!-- This is for the sidebar toggle which is visible on mobile only -->
					<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ri-close-line ri-menu-2-line fs-6"></i></a>
					<!-- ============================================================== -->
					<!-- Logo -->
					<!-- ============================================================== -->
					<a class="navbar-brand" href="index.html">
						<!-- Logo icon -->
						<b class="logo-icon">
							<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
							<!-- Dark Logo icon -->
							<img src="<?= base_url('assets/images/logo-icon.png') ?>" alt="homepage" class="dark-logo">
							<!-- Light Logo icon -->
							<img src="<?= base_url('assets/images/logo-light-icon.png') ?>" alt="homepage" class="light-logo">
						</b>
						<!--End Logo icon -->
						<!-- Logo text -->
						<span class="logo-text">
							<!-- dark Logo text -->
							<img src="<?= base_url('assets/images/logo-text.png') ?>" alt="homepage" class="dark-logo">
							<!-- Light Logo text -->
							<img src="<?= base_url('assets/images/logo-light-text.png') ?>" class="light-logo" alt="homepage">
						</span>
					</a>
					<!-- ============================================================== -->
					<!-- End Logo -->
					<!-- ============================================================== -->
					<!-- ============================================================== -->
					<!-- Toggle which is visible on mobile only -->
					<!-- ============================================================== -->
					<a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ri-more-line fs-6"></i></a>
				</div>
				<!-- ============================================================== -->
				<!-- End Logo -->
				<!-- ============================================================== -->
				<div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
					<!-- ============================================================== -->
					<!-- toggle and nav items -->
					<!-- ============================================================== -->
					<ul class="navbar-nav me-auto">
						<!-- This is  -->
						<li class="nav-item">
							<a class="nav-link sidebartoggler d-none d-md-block" href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
									<line x1="3" y1="12" x2="21" y2="12"></line>
									<line x1="3" y1="6" x2="21" y2="6"></line>
									<line x1="3" y1="18" x2="21" y2="18"></line>
								</svg></a>
						</li>
						<!-- search -->
						<li class="nav-item search-box">
							<a class="nav-link" href="javascript:void(0)">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
									<circle cx="11" cy="11" r="8"></circle>
									<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
								</svg>
							</a>
							<form class="app-search position-absolute">
								<input type="text" class="form-control border-0" placeholder="Search &amp; enter">
								<a class="srh-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle feather-sm text-muted">
										<circle cx="12" cy="12" r="10"></circle>
										<line x1="15" y1="9" x2="9" y2="15"></line>
										<line x1="9" y1="9" x2="15" y2="15"></line>
									</svg></a>
							</form>
						</li>
					</ul>
					<!-- ============================================================== -->
					<!-- Right side toggle and nav items -->
					<!-- ============================================================== -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link nav-sidebar" href="javascript:void(0)">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
									<circle cx="9" cy="21" r="1"></circle>
									<circle cx="20" cy="21" r="1"></circle>
									<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
								</svg>
							</a>
						</li>
						<!-- ============================================================== -->
						<!-- Messages -->
						<!-- ============================================================== -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square">
									<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
								</svg>
								<div class="notify">
									<span class="point bg-warning"></span>
								</div>
							</a>
							<div class="
                    dropdown-menu
                    mailbox
                    dropdown-menu-end dropdown-menu-animate-up
                  " aria-labelledby="2" data-bs-popper="static">
								<ul class="list-style-none">
									<li>
										<div class="rounded-top p-30 pb-2 d-flex align-items-center">
											<h3 class="card-title mb-0">Messages</h3>
											<span class="badge bg-primary ms-3">5 new</span>
										</div>
									</li>
									<li class="p-30 pt-0">
										<div class="message-center message-body position-relative ps-container ps-theme-default" data-ps-id="27f4bd9b-f95e-3438-576e-c7d2308402c8">
											<!-- Message -->
											<a href="javascript:void(0)" class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
												<span class="user-img position-relative d-inline-block">
													<img src="<?= base_url('assets/images/users/1.jpg') ?>" alt="user" class="rounded-circle w-100">
													<span class="profile-status rounded-circle online"></span>
												</span>
												<div class="w-75 d-inline-block v-middle ps-3 ms-1">
													<h5 class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
														Roman Joined the Team!
													</h5>
													<span class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Congratulate him</span>
													<span class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
												<span class="user-img position-relative d-inline-block">
													<img src="<?= base_url('assets/images/users/2.jpg') ?>" alt="user" class="rounded-circle w-100">
													<span class="profile-status rounded-circle busy"></span>
												</span>
												<div class="w-75 d-inline-block v-middle ps-3 ms-1">
													<h5 class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
														New message received
													</h5>
													<span class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Salma sent you new message</span>
													<span class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
												<span class="user-img position-relative d-inline-block">
													<img src="<?= base_url('assets/images/users/4.jpg') ?>" alt="user" class="rounded-circle w-100">
													<span class="profile-status rounded-circle busy"></span>
												</span>
												<div class="w-75 d-inline-block v-middle ps-3 ms-1">
													<h5 class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
														New Payment received
													</h5>
													<span class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Check your earnings</span>
													<span class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            py-3
                          ">
												<span class="user-img position-relative d-inline-block">
													<img src="<?= base_url('assets/images/users/5.jpg') ?>" alt="user" class="rounded-circle w-100">
													<span class="profile-status rounded-circle away"></span>
												</span>
												<div class="w-75 d-inline-block v-middle ps-3 ms-1">
													<h5 class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
														Jolly completed tasks
													</h5>
													<span class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Assign her new tasks</span>
													<span class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08 AM</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            py-3
                          ">
												<span class="user-img position-relative d-inline-block">
													<img src="<?= base_url('assets/images/users/1.jpg') ?>" alt="user" class="rounded-circle w-100">
													<span class="profile-status rounded-circle online"></span>
												</span>
												<div class="w-75 d-inline-block v-middle ps-3 ms-1">
													<h5 class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
														Payment deducted
													</h5>
													<span class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">$230 deducted from account</span>
													<span class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08 AM</span>
												</div>
											</a>
											<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
												<div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
											</div>
											<div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
												<div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
											</div>
										</div>
										<div class="mt-4">
											<a class="btn btn-info text-white" href="javascript:void(0);">
												See all messages
											</a>
										</div>
									</li>
								</ul>
							</div>
						</li>
						<!-- ============================================================== -->
						<!-- End Messages -->
						<!-- ============================================================== -->
						<!-- ============================================================== -->
						<!-- Comment -->
						<!-- ============================================================== -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
									<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
									<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
								</svg>
								<div class="notify">
									<span class="point bg-primary"></span>
								</div>
							</a>
							<div class="
                    dropdown-menu dropdown-menu-end
                    mailbox
                    dropdown-menu-animate-up
                  " data-bs-popper="static">
								<ul class="list-style-none">
									<li>
										<div class="rounded-top p-30 pb-2 d-flex align-items-center">
											<h3 class="card-title mb-0">Notifications</h3>
											<span class="badge bg-warning ms-3">5 new</span>
										</div>
									</li>
									<li class="p-30 pt-0">
										<div class="message-center message-body position-relative ps-container ps-theme-default" data-ps-id="bc00eb3c-a321-8fc4-def5-40f6c845ea7e">
											<!-- Message -->
											<a href="javascript:void(0)" class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
												<span class="user-img position-relative d-inline-block">
													<img src="<?= base_url('assets/images/users/1.jpg') ?>" alt="user" class="rounded-circle w-100"></span>
												<div class="w-75 d-inline-block v-middle ps-3 ms-1">
													<h5 class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
														Roman Joined the Team!
													</h5>
													<span class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Congratulate him</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
												<span class="user-img position-relative d-inline-block">
													<img src="<?= base_url('assets/images/users/2.jpg') ?>" alt="user" class="rounded-circle w-100">
												</span>
												<div class="w-75 d-inline-block v-middle ps-3 ms-1">
													<h5 class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
														New message received
													</h5>
													<span class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Salma sent you new message</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
												<span class="btn btn-light-info text-info btn-circle">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign feather-sm fill-white">
														<line x1="12" y1="1" x2="12" y2="23"></line>
														<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
													</svg>
												</span>
												<div class="w-75 d-inline-block v-middle ps-3 ms-1">
													<h5 class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
														New Payment received
													</h5>
													<span class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Check your earnings</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            py-3
                          ">
												<span class="user-img position-relative d-inline-block">
													<img src="<?= base_url('assets/images/users/4.jpg') ?>" alt="user" class="rounded-circle w-100">
												</span>
												<div class="w-75 d-inline-block v-middle ps-3 ms-1">
													<h5 class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
														Jolly completed tasks
													</h5>
													<span class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Assign her new tasks</span>
												</div>
											</a>
											<!-- Message -->
											<a href="javascript:void(0)" class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            py-3
                          ">
												<span class="btn btn-light-danger text-danger btn-circle">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card feather-sm fill-white">
														<rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
														<line x1="1" y1="10" x2="23" y2="10"></line>
													</svg>
												</span>
												<div class="w-75 d-inline-block v-middle ps-3 ms-1">
													<h5 class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
														Payment deducted
													</h5>
													<span class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">$230 deducted from account</span>
												</div>
											</a>
											<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
												<div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
											</div>
											<div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;">
												<div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
											</div>
										</div>
										<div class="mt-4">
											<a class="btn btn-info text-white" href="javascript:void(0);">
												See all notifications
											</a>
										</div>
									</li>
								</ul>
							</div>
						</li>
						<!-- ============================================================== -->
						<!-- End Comment -->
						<!-- ============================================================== -->

						<!-- ============================================================== -->
						<!-- Profile -->
						<!-- ============================================================== -->
						<li class="nav-item dropdown profile-dropdown">
							<a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="<?= base_url('assets/images/users/profile.png') ?>" alt="user" width="30" class="profile-pic rounded-circle">
								<div class="d-none d-md-flex">
									<span class="ms-2">Hi,
										<span class="text-dark fw-bold"><?= $user->nama ?></span></span>
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down feather-sm">
											<polyline points="6 9 12 15 18 9"></polyline>
										</svg>
									</span>
								</div>
							</a>
							<div class="
                    dropdown-menu dropdown-menu-end
                    mailbox
                    dropdown-menu-animate-up
                  " data-bs-popper="static">
								<ul class="list-style-none">
									<li class="p-30 pb-2">
										<div class="rounded-top d-flex align-items-center">
											<h3 class="card-title mb-0">User Profile</h3>
											<div class="ms-auto">
												<a href="javascript:void(0)" class="link py-0">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
														<circle cx="12" cy="12" r="10"></circle>
														<line x1="15" y1="9" x2="9" y2="15"></line>
														<line x1="9" y1="9" x2="15" y2="15"></line>
													</svg>
												</a>
											</div>
										</div>
										<div class="
                          d-flex
                          align-items-center
                          mt-4
                          pt-3
                          pb-4
                          border-bottom
                        ">
											<img src="<?= base_url('assets/images/users/profile.png') ?>" alt="user" width="90" class="rounded-circle">
											<div class="ms-4">
												<h4 class="mb-0"><?= $user->nama ?></h4>
												<span class="text-muted"><?= $user->role == 1 ? 'Administrator' : 'Dosen' ?></span>
												<p class="text-muted mb-0 mt-1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail feather-sm me-1">
														<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
														<polyline points="22,6 12,13 2,6"></polyline>
													</svg>
													info@Flexy.com
												</p>
											</div>
										</div>
									</li>
									<li class="p-30 pt-0">
										<form hidden action="<?= base_url('auth/logout') ?>" method="POST" id="logout-form">
										</form>
										<div class="mt-4">
											<a class="btn btn-info text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
												Logout
											</a>
										</div>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- ============================================================== -->
		<!-- End Topbar header -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Left Sidebar - style you can find in sidebar.scss  -->
		<!-- ============================================================== -->
		<aside class="left-sidebar" data-sidebarbg="skin6">
			<!-- Sidebar scroll-->
			<div class="scroll-sidebar">
				<!-- Sidebar navigation-->
				<nav class="sidebar-nav">
					<ul id="sidebarnav">
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/home') ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/dosen') ?>" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Dosen</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/fakultas') ?>" aria-expanded="false"><i class="mdi mdi-home-modern"></i><span class="hide-menu">Fakultas</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/prodi') ?>" aria-expanded="false"><i class="mdi mdi-book"></i><span class="hide-menu">Program Studi</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/matkul') ?>" aria-expanded="false"><i class="mdi mdi-file-tree"></i><span class="hide-menu">Mata Kuliah</span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin/rps') ?>" aria-expanded="false"><i class="mdi mdi-file-document"></i><span class="hide-menu">RPS</span></a></li>
					</ul>

				</nav>
				<!-- End Sidebar navigation -->
			</div>
			<!-- End Sidebar scroll-->
		</aside>
