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
							<a href="<?= base_url('dosen/home') ?>" class="link"><i class="mdi mdi-home"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							RPS
						</li>
					</ol>
				</nav>
				<h1 class="mb-0 fw-bold">RPS</h1>
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
						<h4 class="mb-0">List RPS</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="datatables" class="table m-t-30 table-hover contact-list v-middle text-nowrap footable footable-5 footable-paging footable-paging-center breakpoint-lg" data-paging="true" data-paging-size="7" style="">
								<thead>
									<tr class="footable-header">
										<th class="footable-first-visible">No</th>
										<th>Nomor RPS</th>
										<th>Kode Mata Kuliah</th>
										<th>Nama Mata Kuliah</th>
										<th>Semester</th>
										<th>Tanggal Disusun</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; ?>
									<?php foreach ($rpss as $rps) : ?>
										<tr>
											<td class="footable-first-visible"><?= $no++ ?></td>
											<td><?= $rps['nomor'] ?></td>
											<td><?= $rps['kode_matkul'] ?></td>
											<td><?= $rps['nama_matkul'] ?></td>
											<td><?= $rps['semester'] ?></td>
											<td><?= $rps['tanggal_disusun'] ?></td>
											<td>
												<a href="<?= base_url('dosen/rps?id=' . $this->encrypt->encode($rps['id'])) ?>" class="btn btn-sm btn-primary">
													<i class="mdi mdi-eye"></i>
													Lihat
												</a>
												<form action="<?= base_url('dosen/cetak_rps') ?>" method="GET" class="d-inline" id="cetak-rps-<?= $rps['id'] ?>">
													<input type="hidden" name="id" value="<?= $this->encrypt->encode($rps['id']) ?>">
												</form>
												<a onclick="event.preventDefault(); document.getElementById('cetak-rps-<?= $rps['id'] ?>').submit();" class="btn btn-sm btn-success">
													<i class="mdi mdi-printer"></i>
													Cetak
												</a>
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