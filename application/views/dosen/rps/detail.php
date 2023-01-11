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
							Detail RPS
						</li>
					</ol>
				</nav>
				<h1 class="mb-0 fw-bold">Detail RPS</h1>
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
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link d-flex active" data-bs-toggle="tab" href="#informasi" role="tab">
							<span><i data-feather="alert-circle" class="feather feather-sm"></i>
							</span>
							<span class="d-none d-md-block ms-2">Informasi</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link d-flex" data-bs-toggle="tab" href="#penilaian" role="tab">
							<span><i data-feather="star" class="feather feather-sm"></i>
							</span>
							<span class="d-none d-md-block ms-2">Penilaian</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link d-flex" data-bs-toggle="tab" href="#detail" role="tab">
							<span><i data-feather="database" class="feather feather-sm"></i>
							</span>
							<span class="d-none d-md-block ms-2">Detail</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link d-flex" data-bs-toggle="tab" href="#unit" role="tab">
							<span><i data-feather="book-open" class="feather feather-sm"></i>
							</span>
							<span class="d-none d-md-block ms-2">Unit Pembelajaran</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link d-flex" data-bs-toggle="tab" href="#tugas" role="tab">
							<span><i data-feather="book" class="feather feather-sm"></i>
							</span>
							<span class="d-none d-md-block ms-2">Tugas</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link d-flex" data-bs-toggle="tab" href="#rpp" role="tab">
							<span><i data-feather="award" class="feather feather-sm"></i>
							</span>
							<span class="d-none d-md-block ms-2">RPP</span>
						</a>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane p-3 active" id="informasi" role="tabpanel">
						<div class="card">
							<div class="border-bottom title-part-padding">
								<div class="d-flex justify-content-between align-items-center">
									<h4 class="mb-0">Informasi RPS</h4>
									<form target="_blank" action="<?= base_url('dosen/cetak_rps') ?>" method="GET" class="d-inline" id="cetak-rps">
										<input type="hidden" name="id" value="<?= $this->encrypt->encode($rps->id) ?>">
									</form>
									<a onclick="event.preventDefault(); document.getElementById('cetak-rps').submit();" class="justify-content-center btn btn-rounded btn-light-success text-success font-weight-medium d-flex align-items-center">
										<i class="mdi mdi-printer me-2"></i>
										Cetak
									</a>
								</div>
							</div>
							<div class="card-body">
								<table class="table table-borderless">
									<tbody>
										<tr>
											<td style="width: 25%;" class="pb-3">
												<h3 style="margin-bottom: 0px;">Nomor RPS</h3>
											</td>
											<td style="width: 10%;" class="pb-3">
												:
											</td>
											<td style="width: 100%;" class="pb-3">
												<span class="badge rounded-pill font-weight-medium bg-light-primary text-primary"><?= $rps->nomor ?></span> / rev <b><?= $rps->revisi ?></b>
											</td>
										</tr>
										<tr>
											<td style="width: 25%;" class="pb-3">
												<h3 style="margin-bottom: 0px;">Mata Kuliah</h3>
											</td>
											<td style="width: 10%;" class="pb-3">
												:
											</td>
											<td style="width: 100%;" class="pb-3">
												<?= $matkul->nama_matkul ?>
											</td>
										</tr>
										<tr>
											<td style="width: 25%;" class="pb-3">
												<h3 style="margin-bottom: 0px;">Program Studi</h3>
											</td>
											<td style="width: 10%;" class="pb-3">
												:
											</td>
											<td style="width: 100%;" class="pb-3">
												<?= $prodi->nama_prodi ?> - <?= $fakultas->nama ?>
											</td>
										</tr>
										<tr>
											<td style="width: 25%;" class="pb-3">
												<h3 style="margin-bottom: 0px;">Semester / SKS</h3>
											</td>
											<td style="width: 10%;" class="pb-3">
												:
											</td>
											<td style="width: 100%;" class="pb-3">
												<?= $rps->semester ?> / <?= $rps->bobot_sks ?>
											</td>
										</tr>
										<tr>
											<td style="width: 25%;" class="pb-3">
												<h3 style="margin-bottom: 0px;">Tanggal Berlaku</h3>
											</td>
											<td style="width: 10%;" class="pb-3">
												:
											</td>
											<td style="width: 100%;" class="pb-3">
												<?= date('Y', strtotime($rps->tanggal_berlaku)) ?>
											</td>
										</tr>
										<tr>
											<td style="width: 25%;" class="pb-3">
												<h3 style="margin-bottom: 0px;">Tanggal Disusun</h3>
											</td>
											<td style="width: 10%;" class="pb-3">
												:
											</td>
											<td style="width: 100%;" class="pb-3">
												<?= date('d M Y', strtotime($rps->tanggal_disusun)) ?>
											</td>
										</tr>
										<tr>
											<td style="width: 25%;" class="pb-3">
												<h3 style="margin-bottom: 0px;">Penyusun</h3>
											</td>
											<td style="width: 10%;" class="pb-3">
												:
											</td>
											<td style="width: 100%;" class="pb-3">
												<u><b><?= $pembuat->nama_pembuat ?></b></u>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane p-3" id="penilaian" role="tabpanel">
						<div class="card">
							<div class="border-bottom title-part-padding">
								<div class="d-flex justify-content-between align-items-center">
									<h4 class="mb-0">Penilaian</h4>
									<button data-bs-toggle="modal" data-bs-target="#modal-penilaian" class="justify-content-center btn btn-rounded btn-light-success text-success font-weight-medium d-flex align-items-center">
										<i class="mdi mdi-pencil me-2"></i>
										Edit
									</button>
									<!-- Vertically centered modal -->
									<div class="modal fade" id="modal-penilaian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
											<div class="modal-content">
												<div class="modal-header d-flex align-items-center">
													<h4 class="modal-title" id="myLargeModalLabel">
														Edit Penilaian
													</h4>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form id="edit-penilaian" method="POST" action="<?= base_url('dosen/edit_penilaian_rps') ?>">
														<input type="hidden" name="id" value="<?= $rps->id ?>">
														<div class="form-floating">
															<textarea class="form-control border border-info" id="ck_dp" name="detail_penilaian"><?= $rps->detail_penilaian ?></textarea>
														</div>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-light-danger text-danger font-weight-medium waves-effect text-start " data-bs-dismiss="modal">
														Batalkan
													</button>
													<button type="button" onclick="event.preventDefault(); document.getElementById('edit-penilaian').submit();" class="btn btn-light-primary text-primary font-weight-medium waves-effect text-start " data-bs-dismiss="modal">
														Simpan
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<?= $rps->detail_penilaian ?>
							</div>
						</div>
					</div>
					<div class="tab-pane p-3" id="detail" role="tabpanel">
						<div class="card">
							<div class="border-bottom title-part-padding">
								<div class="d-flex justify-content-between align-items-center">
									<h4 class="mb-0">Gambaran Umum</h4>
									<form target="_blank" action="<?= base_url('dosen/cetak_rps') ?>" method="GET" class="d-inline" id="cetak-rps">
										<input type="hidden" name="id" value="<?= $this->encrypt->encode($rps->id) ?>">
									</form>
									<button data-bs-toggle="modal" data-bs-target="#modal-gambaran" class="justify-content-center btn btn-rounded btn-light-success text-success font-weight-medium d-flex align-items-center">
										<i class="mdi mdi-pencil me-2"></i>
										Edit
									</button>
									<div class="modal fade" id="modal-gambaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
											<div class="modal-content">
												<div class="modal-header d-flex align-items-center">
													<h4 class="modal-title" id="myLargeModalLabel">
														Edit Gambaran Umum
													</h4>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form id="edit-gambaran" method="POST" action="<?= base_url('dosen/edit_gambaran_umum_rps') ?>">
														<input type="hidden" name="id" value="<?= $rps->id ?>">
														<div class="form-floating">
															<textarea class="form-control border border-info" id="ck_gu" name="gambaran_umum"><?= $rps->gambaran_umum ?></textarea>
														</div>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-light-danger text-danger font-weight-medium waves-effect text-start " data-bs-dismiss="modal">
														Batalkan
													</button>
													<button type="button" onclick="event.preventDefault(); document.getElementById('edit-gambaran').submit();" class="btn btn-light-primary text-primary font-weight-medium waves-effect text-start " data-bs-dismiss="modal">
														Simpan
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<?= $rps->gambaran_umum ?>
							</div>
						</div>
						<div class="card">
							<div class="border-bottom title-part-padding">
								<div class="d-flex justify-content-between align-items-center">
									<h4 class="mb-0">Capaian Pembelajaran</h4>
									<button data-bs-toggle="modal" data-bs-target="#modal-capaian" class="justify-content-center btn btn-rounded btn-light-success text-success font-weight-medium d-flex align-items-center">
										<i class="mdi mdi-pencil me-2"></i>
										Edit
									</button>
									<div class="modal fade" id="modal-capaian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
											<div class="modal-content">
												<div class="modal-header d-flex align-items-center">
													<h4 class="modal-title" id="myLargeModalLabel">
														Edit Capaian Pembelajaran
													</h4>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form id="edit-capaian" method="POST" action="<?= base_url('dosen/edit_capaian_rps') ?>">
														<input type="hidden" name="id" value="<?= $rps->id ?>">
														<div class="form-floating">
															<textarea class="form-control border border-info" id="ck_ca" name="capaian"><?= $rps->capaian ?></textarea>
														</div>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-light-danger text-danger font-weight-medium waves-effect text-start " data-bs-dismiss="modal">
														Batalkan
													</button>
													<button type="button" onclick="event.preventDefault(); document.getElementById('edit-capaian').submit();" class="btn btn-light-primary text-primary font-weight-medium waves-effect text-start " data-bs-dismiss="modal">
														Simpan
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<?= $rps->capaian ?>
							</div>
						</div>
						<div class="card">
							<div class="border-bottom title-part-padding">
								<div class="d-flex justify-content-between align-items-center">
									<h4 class="mb-0">Prasyarat dan Pengetahuan Awal</h4>
									<button data-bs-toggle="modal" data-bs-target="#modal-prasyarat" class="justify-content-center btn btn-rounded btn-light-success text-success font-weight-medium d-flex align-items-center">
										<i class="mdi mdi-pencil me-2"></i>
										Edit
									</button>
									<div class="modal fade" id="modal-prasyarat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
											<div class="modal-content">
												<div class="modal-header d-flex align-items-center">
													<h4 class="modal-title" id="myLargeModalLabel">
														Edit Prasyarat dan Pengetahuan Awal
													</h4>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form id="edit-prasyarat" method="POST" action="<?= base_url('dosen/edit_prasyarat_rps') ?>">
														<input type="hidden" name="id" value="<?= $rps->id ?>">
														<div class="form-floating">
															<textarea class="form-control border border-info" id="ck_pr" name="prasyarat"><?= $rps->prasyarat ?></textarea>
														</div>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-light-danger text-danger font-weight-medium waves-effect text-start " data-bs-dismiss="modal">
														Batalkan
													</button>
													<button type="button" onclick="event.preventDefault(); document.getElementById('edit-prasyarat').submit();" class="btn btn-light-primary text-primary font-weight-medium waves-effect text-start " data-bs-dismiss="modal">
														Simpan
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-body">
								<?= $rps->prasyarat ?>
							</div>
						</div>
					</div>
					<div class="tab-pane p-3" id="unit" role="tabpanel">
						<div class="card">
							<div class="border-bottom title-part-padding">
								<div class="d-flex justify-content-between align-items-center">
									<h4 class="mb-0">Unit Pembelajaran</h4>
									<a href="<?= base_url('dosen/rps_unit') ?>" class="justify-content-center btn btn-rounded btn-light-success text-success font-weight-medium d-flex align-items-center">
										<i class="mdi mdi-plus me-2"></i>
										Tambah
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table customize-table mb-0 v-middle table-bordered">
										<thead class=" table-light">
											<tr>
												<th>
													Kemampuan Akhir yang Diharapkan
												</th>
												<th>
													Indikator
												</th>
												<th>
													Bahan Kajian
												</th>
												<th>
													Metode Pembelajaran
												</th>
												<th>
													Waktu
												</th>
												<th>
													Metode Penilaian
												</th>
												<th>
													Bahan Ajar
												</th>
												<th>
													Aksi
												</th>
											</tr>
										</thead>
										<?php foreach ($unit_pembelajaran as $key => $value) : ?>
											<tr>
												<td>
													<?= $value->kemampuan_akhir ?>
												</td>
												<td>
													<?= $value->indikator ?>
												</td>
												<td>
													<?= $value->bahan_kajian ?>
												</td>
												<td>
													<?= $value->metode_pembelajaran ?>
												</td>
												<td>
													<?= $value->waktu ?>
												</td>
												<td>
													<?= $value->metode_penilaian ?>
												</td>
												<td>
													<?= $value->bahan_ajar ?>
												</td>
												<td>
													<div class="d-flex">
														<a href="<?= base_url('dosen/rps_unit') ?>" class="btn btn-rounded btn-light-primary text-primary font-weight-medium d-flex align-items-center me-2">
															<i class="mdi mdi-pencil"></i>
														</a>
														<a href="<?= base_url('dosen/rps_unit') ?>" class="btn btn-rounded btn-light-danger text-danger font-weight-medium d-flex align-items-center">
															<i class="mdi mdi-delete"></i>
														</a>
													</div>
												</td>
											</tr>
										<?php endforeach; ?>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane p-3" id="tugas" role="tabpanel">
						<div class="card">
							<div class="border-bottom title-part-padding">
								<div class="d-flex justify-content-between align-items-center">
									<h4 class="mb-0">Tugas/Aktivitas dan Penilaian</h4>
									<a href="<?= base_url('dosen/rps_unit') ?>" class="justify-content-center btn btn-rounded btn-light-success text-success font-weight-medium d-flex align-items-center">
										<i class="mdi mdi-plus me-2"></i>
										Tambah
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table customize-table mb-0 v-middle table-bordered">
										<thead class=" table-light">
											<tr>
												<th>
													Tugas/Aktivitas
												</th>
												<th>
													Kemampuan Akhir yang diharapkan atau dievaluasi
												</th>
												<th>
													Waktu
												</th>
												<th>
													Bobot
												</th>
												<th>
													Kriteria Penilaian
												</th>
												<th>
													Indikator Penilaian
												</th>
												<th>
													Aksi
												</th>
											</tr>
										</thead>
										<?php foreach ($tugas_aktivitas as $key => $value) : ?>
											<tbody>
												<tr>
													<td>
														<?= $value->tugas ?>
													</td>
													<td>
														<?= $value->kemampuan_akhir ?>
													</td>
													<td>
														<?= $value->waktu ?>
													</td>
													<td>
														<?= $value->bobot ?>
													</td>
													<td>
														<?= $value->kriteria_penilaian ?>
													</td>
													<td>
														<?= $value->indikator_penilaian ?>
													</td>
													<td>
														<div class="d-flex">
															<a href="<?= base_url('dosen/rps_unit') ?>" class="btn btn-rounded btn-light-primary text-primary font-weight-medium d-flex align-items-center me-2">
																<i class="mdi mdi-pencil"></i>
															</a>
															<a href="<?= base_url('dosen/rps_unit') ?>" class="btn btn-rounded btn-light-danger text-danger font-weight-medium d-flex align-items-center">
																<i class="mdi mdi-delete"></i>
															</a>
														</div>
													</td>
												</tr>
											</tbody>
										<?php endforeach; ?>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane p-3" id="rpp" role="tabpanel">
						<div class="card">
							<div class="border-bottom title-part-padding">
								<div class="d-flex justify-content-between align-items-center">
									<h4 class="mb-0">Rencana Pelaksanaan Pembelajaran </h4>
									<a href="<?= base_url('dosen/rps_unit') ?>" class="justify-content-center btn btn-rounded btn-light-success text-success font-weight-medium d-flex align-items-center">
										<i class="mdi mdi-plus me-2"></i>
										Tambah
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table customize-table mb-0 v-middle table-bordered">
										<thead class=" table-light">
											<tr style='text-align:center'>
												<th>Minggu</th>
												<th>Kemampuan Akhir yang Diharapkan</th>
												<th>Indikator</th>
												<th>Topik & Sub Topik</th>
												<th>Aktivitas & Strategi Pembelajaran</th>
												<th>Waktu</th>
												<th>Penilaian</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<?php foreach ($rpp as $key => $value) : ?>
											<tbody>
												<tr>
													<td>
														<?= $value->minggu ?>
													</td>
													<td>
														<?= $value->kemampuan_akhir ?>
													</td>
													<td>
														<?= $value->indikator ?>
													</td>
													<td>
														<?= $value->topik ?>
													</td>
													<td>
														<?= $value->aktivitas_pembelajaran ?>
													</td>
													<td>
														<?= $value->waktu ?>
													</td>
													<td>
														<?= $value->penilaian ?>
													</td>
													<td>
														<div class="d-flex">
															<a href="<?= base_url('dosen/rps_unit') ?>" class="btn btn-rounded btn-light-primary text-primary font-weight-medium d-flex align-items-center me-2">
																<i class="mdi mdi-pencil"></i>
															</a>
															<a href="<?= base_url('dosen/rps_unit') ?>" class="btn btn-rounded btn-light-danger text-danger font-weight-medium d-flex align-items-center">
																<i class="mdi mdi-delete"></i>
															</a>
														</div>
													</td>
												</tr>
											</tbody>
										<?php endforeach; ?>
									</table>
								</div>
							</div>
						</div>
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
