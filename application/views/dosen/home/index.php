<div class="page-wrapper" style="display: block;">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-titles">
		<div class="row">
			<div class="col-lg-8 col-md-6 col-12 align-self-center">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 d-flex align-items-center">
						<li class="breadcrumb-item">
							<a href="<?= base_url('dosen/home') ?>" class="link"><i class="mdi mdi-home"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Dashboard
						</li>
					</ol>
				</nav>
				<h1 class="mb-0 fw-bold">Dashboard Dosen</h1>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================= -->
	<!-- Container fluid  -->
	<!-- ============================================================= -->
	<div class="container-fluid">
		<!-- ============================================================= -->
		<!-- Start Page Content -->
		<!-- ============================================================= -->
		<!-- Row -->
		<div class="row">
			<!-- Column -->
			<div class="col-lg-4 col-xlg-3 col-md-5">
				<div class="card">
					<div class="card-body">
						<center class="mt-4">
							<img src="<?= base_url('assets/images/users/1.jpg') ?>" class="rounded-circle" width="150">
							<h4 class="mt-2"><?= $dosen->nama_dosen ?></h4>
							<h6 class="card-subtitle">Dosen Amikom</h6>
							<!-- <div class="row text-center justify-content-md-center">
								<div class="col-4">
									<a href="javascript:void(0)" class="link d-flex align-items-center"><i class="me-1 ri-user-line"></i>
										<font class="font-weight-medium">254</font>
									</a>
								</div>
								<div class="col-4">
									<a href="javascript:void(0)" class="link d-flex align-items-center"><i class="ri-image-line me-1"></i>
										<font class="font-weight-medium">54</font>
									</a>
								</div>
							</div> -->
						</center>
					</div>
					<div>
						<hr>
					</div>
					<div class="card-body">
						<small class="text-muted pt-4 db">NIP</small>
						<h6><?= $dosen->nip ?></h6>
						<small class="text-muted">Email address </small>
						<h6><?= $user->email ?></h6>
						<small class="text-muted pt-4 db">Address</small>
						<h6><?= $dosen->alamat_dosen ?></h6>
					</div>
				</div>
			</div>
			<!-- Column -->
			<!-- Column -->
			<div class="col-lg-8 col-xlg-9 col-md-7">
				<div class="card overflow-hidden">
					<!-- Tabs -->
					<ul class="nav nav-pills" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link" id="pills-profile-tab" role="tab" aria-controls="pills-profile" aria-selected="false" tabindex="-1">Profile</a>
						</li>
					</ul>
					<!-- Tabs -->
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
							<div class="card-body">
								<p>
									Donec pede justo, fringilla vel, aliquet nec, vulputate
									eget, arcu. In enim justo, rhoncus ut, imperdiet a,
									venenatis vitae, justo. Nullam dictum felis eu pede
									mollis pretium. Integer tincidunt.Cras dapibus. Vivamus
									elementum semper nisi. Aenean vulputate eleifend tellus.
									Aenean leo ligula, porttitor eu, consequat vitae,
									eleifend ac, enim.
								</p>
								<p>
									Lorem Ipsum is simply dummy text of the printing and
									typesetting industry. Lorem Ipsum has been the
									industry's standard dummy text ever since the 1500s,
									when an unknown printer took a galley of type and
									scrambled it to make a type specimen book. It has
									survived not only five centuries
								</p>
								<p>
									It was popularised in the 1960s with the release of
									Letraset sheets containing Lorem Ipsum passages, and
									more recently with desktop publishing software like
									Aldus PageMaker including versions of Lorem Ipsum.
								</p>
								<h4 class="font-weight-medium mt-4">Skill Set</h4>
								<hr>
								<h5 class="mt-4">
									Wordpress <span class="pull-right">80%</span>
								</h5>
								<div class="progress">
									<div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%; height: 6px">
										<span class="sr-only">50% Complete</span>
									</div>
								</div>
								<h5 class="mt-4">
									HTML 5 <span class="pull-right">90%</span>
								</h5>
								<div class="progress">
									<div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%; height: 6px">
										<span class="sr-only">50% Complete</span>
									</div>
								</div>
								<h5 class="mt-4">
									jQuery <span class="pull-right">50%</span>
								</h5>
								<div class="progress">
									<div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%; height: 6px">
										<span class="sr-only">50% Complete</span>
									</div>
								</div>
								<h5 class="mt-4">
									Photoshop <span class="pull-right">70%</span>
								</h5>
								<div class="progress">
									<div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%; height: 6px">
										<span class="sr-only">50% Complete</span>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
		<!-- Row -->
		<!-- ============================================================= -->
		<!-- End PAge Content -->
		<!-- ============================================================= -->
	</div>
	<!-- ============================================================= -->
	<!-- End Container fluid  -->
	<!-- ============================================================= -->
