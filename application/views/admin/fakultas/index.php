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
							<a href="<?= base_url('admin/home') ?>" class="link"><i class="mdi mdi-home"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Fakultas
						</li>
					</ol>
				</nav>
				<h1 class="mb-0 fw-bold">Fakultas</h1>
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
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="border-bottom title-part-padding">
						<h4 class="mb-0">List Fakultas</h4>
					</div>
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-center">
							<div>
								<?php if ($this->session->flashdata('message')) : ?>
									<div class="alert alert-success alert-dismissible fade show px-2 py-1 d-flex justify-content-between align-items-center" role="alert">
										<?= $this->session->flashdata('message') ?>
										<button type="button" class="btn-close position-static px-0 py-0 ms-2" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
								<?php endif; ?>
							</div>
							<a href="<?= base_url('admin/tambah_fakultas') ?>" class="btn btn-info btn-rounded m-t-10 mb-2">
								<i class="mdi mdi-plus"></i>
								Tambah Fakultas
							</a>
						</div>
						<div class="table-responsive">
							<table id="datatables" class="table m-t-30 table-hover contact-list v-middle text-nowrap footable footable-5 footable-paging footable-paging-center breakpoint-lg" data-paging="true" data-paging-size="7" style="">
								<thead>
									<tr class="footable-header">
										<th class="footable-first-visible">No</th>
										<th>Nama Fakultas</th>
										<th>Nama Dekan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($fakultass as $fakultas) : ?>
										<tr>
											<td class="footable-first-visible"><?= $no++ ?></td>
											<td>
												<a href="javascript:void(0)" class="link"><img src="<?= base_url('assets/images/users/4.jpg') ?>" alt="user" width="40" class="rounded-circle">
													<?= $fakultas['nama'] ?></a>
											</td>
											<td><?= $fakultas['nama_dosen'] ?></td>
											<td>
												<a href="<?= base_url('admin/fakultas?id=') . $this->encrypt->encode($fakultas['id']) ?>" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i> Edit</a>
												<form id="hapus-fakultas-<?= $fakultas['id'] ?>" action="<?= base_url('admin/hapus_fakultas/') . $fakultas['id'] ?>" hidden>
												</form>
												<a onclick="event.preventDefault(); document.getElementById('hapus-fakultas-<?= $fakultas['id'] ?>').submit();" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i> Hapus</a>
											</td>

										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================= -->
		<!-- End PAge Content -->
		<!-- ============================================================= -->
	</div>
	<!-- ============================================================= -->
	<!-- End Container fluid  -->
	<!-- ============================================================= -->
	<!-- ============================================================= -->
