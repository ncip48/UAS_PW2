<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-titles">
		<div class="row">
			<div class="col-lg-8 col-md-6 col-12 align-self-center">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 d-flex align-items-center">
						<li class="breadcrumb-item">
							<a href="index.html" class="link"><i class="mdi mdi-home fs-5"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							User
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Tambah User
						</li>
					</ol>
				</nav>
				<h1 class="mb-0 fw-bold">Tambah User</h1>
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
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Tambah User</h4>
						<h5 class="card-subtitle mb-3 pb-3 border-bottom">
							silahkan input untuk menambahkan user
						</h5>
						<form autocomplete="off" method="POST" action="<?= base_url('admin/tambah_user_aksi') ?>">
							<div class="form-floating mb-3">
								<input type="email" class="form-control border border-info" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
								<label>
									<i data-feather="mail" class="feather feather-mail feather-sm text-info fill-white me-2"></i>
									<span class="border-start border-info ps-3">Email</span>
								</label>
								<span class="invalid-feedback d-block" role="alert">
									<?php echo form_error('email'); ?>
								</span>
							</div>
							<div class="form-floating mb-3">
								<input type="text" class="form-control border border-info" name="nama" placeholder="Nama" value="<?php echo set_value('nama'); ?>">
								<label>
									<i data-feather="user" class="feather feather-user feather-sm text-info fill-white me-2"></i>
									<span class="border-start border-info ps-3">Nama</span>
								</label>
								<span class="invalid-feedback d-block" role="alert">
									<?php echo form_error('nama'); ?>
								</span>
							</div>
							<div class="form-floating mb-3">
								<input type="password" class="form-control border border-info" name="password" placeholder="Password">
								<label>
									<i data-feather="lock" class="feather feather-lock feather-sm text-info fill-white me-2"></i>
									<span class="border-start border-info ps-3">Password</span>
								</label>
								<span class="invalid-feedback d-block" role="alert">
									<?php echo form_error('password'); ?>
								</span>
							</div>
							<div class="form-floating mb-3">
								<input type="password" class="form-control border border-info" name="password2" placeholder="Konfirmasi Password">
								<label>
									<i data-feather="lock" class="feather feather-lock feather-sm text-info fill-white me-2"></i>
									<span class="border-start border-info ps-3">Konfirmasi Password</span>
								</label>
								<span class="invalid-feedback d-block" role="alert">
									<?php echo form_error('password2'); ?>
								</span>
							</div>
							<div class="form-floating mb-3">
								<select class="form-select border border-info" name="role" aria-label="Floating label select example">
									<option value="1">Admin</option>
									<option value="0">Dosen</option>
								</select>
								<label>
									<i data-feather="user-check" class="feather feather-user-check feather-sm text-info fill-white me-2"></i>
									<span class="border-start border-info ps-3">Role</span>
								</label>
								<span class="invalid-feedback d-block" role="alert">
									<?php echo form_error('role'); ?>
								</span>
							</div>
							<div class="form-floating mb-3">
								<select class="form-select border border-info" name="id_dosen" aria-label="Floating label select example">
									<option value="">---Pilih Dosen---</option>
									<?php foreach ($dosens as $dosen) : ?>
										<option value="<?= $dosen['id_dosen'] ?>"><?= $dosen['nama_dosen'] ?></option>
									<?php endforeach; ?>
								</select>
								<label>
									<i data-feather="user-check" class="feather feather-user-check feather-sm text-info fill-white me-2"></i>
									<span class="border-start border-info ps-3">Assign Dosen</span>
								</label>
							</div>
							<div class="d-md-flex align-items-center justify-content-end">
								<div class="mt-3 mt-md-0 ms-auto">
									<a href="<?= base_url('admin/user') ?>" class="btn btn-danger font-weight-medium rounded-pill px-4 ">
										<div class="d-flex align-items-center">
											<i data-feather="x-circle" class="feather feather-save feather-sm text-white fill-white me-2"></i>
											Gak Jadi
										</div>
									</a>
									<button type="submit" class="btn btn-info font-weight-medium rounded-pill px-4 ">
										<div class="d-flex align-items-center">
											<i data-feather="send" class="feather feather-save feather-sm text-white fill-white me-2"></i>
											Simpan
										</div>
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Row -->
		<!-- ============================================================= -->
		<!-- End PAge Content -->
		<!-- ============================================================= -->
	</div>
	<!-- ============================================================= -->
	<!-- End Container fluid  -->
	<!-- ============================================================= -->
	<!-- ============================================================= -->
