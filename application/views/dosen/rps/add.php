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
							<a href="<?= base_url('dosen/home') ?>" class="link"><i class="mdi mdi-home fs-5"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							RPS
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Tambah RPS
						</li>
					</ol>
				</nav>
				<h1 class="mb-0 fw-bold">Tambah RPS</h1>
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
						<h4 class="card-title">Tambah RPS</h4>
						<h5 class="card-subtitle mb-3 pb-3 border-bottom">
							silahkan input untuk menambahkan RPS
						</h5>
						<form autocomplete="off" method="POST" action="<?= base_url('dosen/tambah_rps_aksi') ?>">
							<div class="form-floating mb-3">
								<select class="form-select border border-info" name="id_matkul" aria-label="Floating label select example">
									<option value="">Pilih Matkul</option>
									<?php foreach ($matkuls as $matkul) : ?>
										<option value="<?= $matkul->id ?>"><?= $matkul->nama_matkul ?> | <?= $matkul->kode_matkul ?></option>
									<?php endforeach; ?>
								</select>
								<label>
									<i class="mdi mdi-home-modern text-info fill-white me-2"></i>
									<span class="border-start border-info ps-3">Mata Kuliah</span>
								</label>
								<span class="invalid-feedback d-block" role="alert">
									<?php echo form_error('id_matkul'); ?>
								</span>
							</div>
							<div class="form-floating mb-3">
								<input type="text" class="form-control border border-info" name="semester" placeholder="Semester" value="<?php echo set_value('semester'); ?>">
								<label>
									<i data-feather="mail" class="feather feather-mail feather-sm text-info fill-white me-2"></i>
									<span class="border-start border-info ps-3">Semester</span>
								</label>
								<span class="invalid-feedback d-block" role="alert">
									<?php echo form_error('semester'); ?>
								</span>
							</div>
							<div class="form-floating mb-3">
								<input type="text" class="form-control border border-info" name="bobot_sks" placeholder="Bobot SKS" value="<?php echo set_value('bobot_sks'); ?>">
								<label>
									<i data-feather="user" class="feather feather-user feather-sm text-info fill-white me-2"></i>
									<span class="border-start border-info ps-3">Bobot SKS</span>
								</label>
								<span class="invalid-feedback d-block" role="alert">
									<?php echo form_error('bobot_sks'); ?>
								</span>
							</div>
							<h5 class="card-subtitle mt-4 pt-2 border-top">
								Detail Penilaian
							</h5>
							<div class="form-floating mb-3">
								<textarea class="form-control border border-info" id="ck_dp" name="detail_penilaian"></textarea>
							</div>
							<h5 class="card-subtitle mt-4 pt-2 border-top">
								Gambaran Umum
							</h5>
							<div class="form-floating mb-3">
								<textarea class="form-control border border-info" id="ck_gu" name="gambaran_umum"></textarea>
							</div>
							<h5 class="card-subtitle mt-4 pt-2 border-top">
								Capaian
							</h5>
							<div class="form-floating mb-3">
								<textarea class="form-control border border-info" id="ck_ca" name="capaian"></textarea>
							</div>
							<h5 class="card-subtitle mt-4 pt-2 border-top">
								Prasyarat
							</h5>
							<div class="form-floating mb-3">
								<textarea class="form-control border border-info" id="ck_pr" name="prasyarat"></textarea>
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
