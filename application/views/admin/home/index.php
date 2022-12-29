<div class="page-wrapper" style="display: block;">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-titles">
		<div class="row">
			<div class="col-lg-8 col-md-6 col-12 align-self-center">
				<h4 class="text-muted mb-0 fw-normal">Welcome <?= $user->nama ?></h4>
				<h1 class="mb-0 fw-bold">Dashboard Admin</h1>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- Row -->
		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="row">
					<div class="col-12 col-md-3 d-flex align-items-stretch">
						<!-- earnings card -->
						<div class="card bg-primary w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h4 class="card-title text-white">Dosen</h4>
									<div class="ms-auto">
										<span class="btn btn-lg btn-info btn-circle d-flex align-items-center justify-content-center">
											<i class="mdi mdi-account"></i>
										</span>
									</div>
								</div>
								<div class="mt-3">
									<h2 class="fs-8 text-white mb-0"><?= $jumlah_dosen ?></h2>
									<span class="text-white op-5">Jumlah Dosen</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-3 d-flex align-items-stretch">
						<!-- earnings card -->
						<div class="card bg-success w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h4 class="card-title text-white">Fakultas</h4>
									<div class="ms-auto">
										<span class="btn btn-lg btn-info btn-circle d-flex align-items-center justify-content-center">
											<i class="mdi mdi-account-circle"></i>
										</span>
									</div>
								</div>
								<div class="mt-3">
									<h2 class="fs-8 text-white mb-0"><?= $jumlah_fakultas ?></h2>
									<span class="text-white op-5">Jumlah Fakultas</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-3 d-flex align-items-stretch">
						<!-- earnings card -->
						<div class="card bg-danger w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h4 class="card-title text-white">Prodi</h4>
									<div class="ms-auto">
										<span class="btn btn-lg btn-info btn-circle d-flex align-items-center justify-content-center">
											<i class="mdi mdi-home-modern"></i>
										</span>
									</div>
								</div>
								<div class="mt-3">
									<h2 class="fs-8 text-white mb-0"><?= $jumlah_prodi ?></h2>
									<span class="text-white op-5">Jumlah Program Studi</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-3 d-flex align-items-stretch">
						<!-- earnings card -->
						<div class="card bg-warning w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h4 class="card-title text-white">User</h4>
									<div class="ms-auto">
										<span class="btn btn-lg btn-info btn-circle d-flex align-items-center justify-content-center">
											<i class="mdi mdi-book"></i>
										</span>
									</div>
								</div>
								<div class="mt-3">
									<h2 class="fs-8 text-white mb-0"><?= $jumlah_user ?></h2>
									<span class="text-white op-5">Jumlah User Terdaftar</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-3 d-flex align-items-stretch">
						<!-- earnings card -->
						<div class="card bg-info w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h4 class="card-title text-white">Matkul</h4>
									<div class="ms-auto">
										<span class="btn btn-lg btn-info btn-circle d-flex align-items-center justify-content-center">
											<i class="mdi mdi-file-tree"></i>
										</span>
									</div>
								</div>
								<div class="mt-3">
									<h2 class="fs-8 text-white mb-0"><?= $jumlah_dosen ?></h2>
									<span class="text-white op-5">Jumlah Mata Kuliah</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-2 d-flex align-items-stretch">
						<!-- earnings card -->
						<div class="card bg-secondary w-100">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<h4 class="card-title text-white">RPS</h4>
									<div class="ms-auto">
										<span class="btn btn-lg btn-info btn-circle d-flex align-items-center justify-content-center">
											<i class="mdi mdi-file-document"></i>
										</span>
									</div>
								</div>
								<div class="mt-3">
									<h2 class="fs-8 text-white mb-0"><?= $jumlah_rps ?></h2>
									<span class="text-white op-5">Jumlah RPS</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">

				</div>
			</div>
		</div>
		<!-- Row -->
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
