<html>

<head>
	<style>
		/** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
		@page {
			margin: 0cm 0cm;
		}

		/** Define now the real margins of every page in the PDF **/
		body {
			margin-top: 5.5cm;
			margin-left: 2cm;
			margin-right: 2cm;
			margin-bottom: 2cm;
		}

		/** Define the header rules **/
		header {
			position: fixed;
			top: 2cm;
			left: 2cm;
			right: 2cm;
			height: 5.5cm;

			/** Extra personal styles **/
			/* background-color: #03a9f4; */
			/* color: white; */
			text-align: center;
			/* line-height: 1.5cm; */
		}

		/** Define the footer rules **/
		footer {
			position: fixed;
			bottom: 0cm;
			left: 0cm;
			right: 0cm;
			height: 2cm;

			/** Extra personal styles **/
			background-color: #03a9f4;
			color: white;
			text-align: center;
			line-height: 1.5cm;
		}

		table {
			border-collapse: collapse;
		}

		table,
		td,
		th {
			border: 1px solid black;
		}

		td {
			padding-left: 15px;
			padding-right: 15px;
		}

		thead {
			background-color: #f2f2f2;
		}

		th {
			padding: 15px 15px 15px 15px;
		}

		.page_break {
			page-break-before: always;
		}

		.td-no-top-border {
			border-top: 1px solid transparent !important;
		}

		.td-no-left-right-border {
			border-left: 1px solid transparent !important;
			border-right: 1px solid transparent !important;
		}

		.td-no-left-border {
			border-left: 1px solid transparent !important;
		}

		.pagenum:before {
			content: counter(page);
		}
	</style>
</head>

<body>
	<?php
	$path = 'assets/images/amikom.png';
	$type = pathinfo($path, PATHINFO_EXTENSION);
	$data = file_get_contents($path);
	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
	?>
	<table style="width: 100%;margin-top:-4cm">
		<tr>
			<td style="width: 100px;text-align:center;" class="td-no-top-border td-no-left-right-border" colspan="4">
				<h1 style="text-transform: capitalize;margin:0px">Rencana Pembelajaran Semester (RPS)</h1>
			</td>
		</tr>
		<tr>
			<td style="width: 100px;text-align:center" colspan="4" class="td-no-left-right-border">
				<img src="<?= $base64 ?>" alt="Logo" style="width: 300px;">
			</td>
		</tr>
		<tr>
			<td style="width: 100px;text-align:center" colspan="4" class="td-no-left-right-border">
				<h2 style="margin:0px">Mata Kuliah: <?= $matkul->nama_matkul ?></h2>
			</td>
		</tr>
		<tr>
			<td style="width: 100px;text-align:center" colspan="4" class="td-no-left-right-border">
				<h2 style="margin: 0px;">Program Studi: <?= $matkul->nama_prodi ?></h2>
			</td>
		</tr>
		<tr>
			<td style="text-align:center" class="td-no-left-border">
				Nomor
			</td>
			<td style="text-align:center">
				Tgl. Berlaku Mulai
			</td>
			<td style="text-align:center">
				Tgl. Disusun
			</td>
			<td style="text-align:center" class="td-no-left-right-border">
				Revisi
			</td>
		</tr>
		<tr>
			<td style="text-align:center" class="td-no-left-border">
				<i><?= $rps->nomor ?></i>
			</td>
			<td style="text-align:center">
				<i><?= date('Y', strtotime($rps->tanggal_berlaku)) ?></i>
			</td>
			<td style="text-align:center">
				<i><?= date('d M Y', strtotime($rps->tanggal_disusun)) ?></i>
			</td>
			<td style="text-align:center" class="td-no-left-right-border">
				<i><?= $rps->revisi ?></i>
			</td>
		</tr>
		<tr>
			<td style="text-align:center" class="td-no-left-right-border" colspan="4">
				&nbsp;
			</td>
		</tr>
		<tr>
			<td style="text-align:center" class="td-no-left-border">
				Disetujui oleh, <br>Dekan <?= $matkul->nama_fakultas ?>
			</td>
			<td style="text-align:center">
				Diperiksa oleh, <br>Kaprodi <?= $matkul->nama_prodi ?>
			</td>
			<td style="text-align:center">
				Disusun oleh, <br>Koordinator Matakuliah
			</td>
			<td style="text-align:center" class="td-no-left-right-border">
				Dikendalikan oleh, <br>Sekretaris Prodi <?= $matkul->nama_prodi ?>
			</td>
		</tr>
		<tr>
			<td style="text-align:center" class="td-no-left-border">
				<div style="height:80px;"></div>
				<b><u><?= $fakultas->nama_dekan ?></u></b>
				<br>
				NIK. <?= $fakultas->nip_dekan ?>
			</td>
			<td style="text-align:center">
				<div style="height:80px;"></div>
				<b><u><?= $prodi->nama_kaprodi ?></u></b>
				<br>
				NIK. <?= $prodi->nip_kaprodi ?>
			</td>
			<td style="text-align:center">
				<div style="height:80px;"></div>
				<b><u><?= $pembuat->nama_pembuat ?></u></b>
				<br>
				NIK. <?= $pembuat->nip_pembuat ?>
			</td>
			<td style="text-align:center" class="td-no-left-right-border">
				<div style="height:80px;"></div>
				<b><u><?= $sekprodi->nama_sekprodi ?></u></b>
				<br>
				NIK. <?= $sekprodi->nip_sekprodi ?>
			</td>
		</tr>
	</table>
	<center style="margin-top: 50px;">
		<h2 style="margin:0px"><b>Universitas Amikom Yogyakarta</b></h2>
		<h2 style="margin:0px"><b>Yogyakarta</b></h2>
		<h2 style="margin:0px"><b>2021</b></h2>
	</center>
	<div class="page_break"></div>
	<!-- Define header and footer blocks before your content -->
	<header>
		<table style="width: 100%;">
			<tr>
				<td style="text-align: center; width: 100px;" rowspan="4">
					<img src="<?= $base64 ?>" alt="Logo" style="width: 150px;">
				</td>
				<td style="text-align: center;" rowspan="4">
					<h3 style="margin:0px;">Rencana Pembelajaran Semester</h3>
					<h3 style="margin:0px;">Program Studi: <?= $matkul->nama_prodi ?></h3>
					<h3 style="margin:0px;">MataKuliah <?= $matkul->nama_matkul ?></h3>
					<h3 style="margin:0px;"><?= $matkul->kode_matkul ?></h3>
				</td>
				<td style="text-align: right;">
					Nomor
				</td>
				<td style="text-align: left;">
					<i>: <?= $rps->nomor ?></i>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;">
					Tgl Disusun
				</td>
				<td style="text-align: left;">
					<i>: <?= $rps->tanggal_disusun ?></i>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;">
					Revisi
				</td>
				<td style="text-align: left;">
					<i>: <?= $rps->revisi ?></i>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;">
					Halaman
				</td>
				<td style="text-align: left;">
					<i>: <span class="pagenum"></span></i>
				</td>
			</tr>
		</table>
	</header>

	<main>
		<div>
			<div style="background-color:grey;margin-bottom:20px">
				<h4 style="margin:0px;padding:5px">1. Identitas</h4>
			</div>
			<table style="width: 100%; font-size:14px">
				<tr>
					<td>
						Program Studi
					</td>
					<td>
						<?= $matkul->nama_prodi ?>
					</td>
					<td>
						Semester
					</td>
					<td colspan="5">
						<?= $rps->semester ?>
					</td>
				</tr>
				<tr>
					<td>
						Nama & Kode Mata Kuliah
					</td>
					<td>
						<?= $matkul->nama_matkul ?> | <?= $matkul->kode_matkul ?>
					</td>
					<td>
						Bobot SKS
					</td>
					<td colspan="5">
						<?= $rps->bobot_sks ?>
					</td>
				</tr>
				<tr>
					<td rowspan="3">
						Detail Prosentasi Penilaian
					</td>
					<td rowspan="3">
						<?= $rps->detail_penilaian ?>
					</td>
					<td>
						Dosen Pengampu
					</td>
					<td colspan="5">
						<?php foreach ($dosen_pengampu as $dosen) : ?>
							<?= $dosen->nama_dosen ?>
							<br>
							NIK: <?= $dosen->nip ?>
							<br>
						<?php endforeach; ?>
					</td>
				</tr>
				<tr>
					<td rowspan="2">
						Klasifikasi Nilai
					</td>
					<td style="text-align: center;">
						>80
					</td>
					<td style="text-align: center;">
						>60 & <80 </td>
					<td style="text-align: center;">
						>40 & <60 </td>
					<td style="text-align: center;">
						>20 & <40 </td>
					<td style="text-align: center;">
						< 20 </td>
				</tr>
				<tr>
					<td style="text-align: center;">
						A
					</td>
					<td style="text-align: center;">
						B
					</td>
					<td style="text-align: center;">
						C
					</td>
					<td style="text-align: center;">
						D
					</td>
					<td style="text-align: center;">
						E
					</td>
				</tr>
			</table>

			<div style="background-color:grey;margin-bottom:20px;margin-top:20px">
				<h4 style="margin:0px;padding:5px">2. Gambaran Umum</h4>
			</div>
			<?= html_entity_decode($rps->gambaran_umum) ?>

			<div style="background-color:grey;margin-bottom:20px;margin-top:20px">
				<h4 style="margin:0px;padding:5px">3. Capaian Pembelajaran</h4>
			</div>
			<?= html_entity_decode($rps->capaian) ?>

			<div style="background-color:grey;margin-bottom:20px;margin-top:20px">
				<h4 style="margin:0px;padding:5px">4. Prasyarat dan Pengetahuan Awal <i>(Prior Knowledge)</i></h4>
			</div>
			<?= html_entity_decode($rps->prasyarat) ?>

			<div style="background-color:grey;margin-bottom:20px;margin-top:20px">
				<h4 style="margin:0px;padding:5px">5. Unit-Unit Pembelajaran secara spesifik</h4>
			</div>
			<table style="width: 100%;font-size:14px">
				<thead>
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
					</tr>
				</thead>
				<?php foreach ($unit_pembelajaran as $key => $value) : ?>
					<tbody>
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
						</tr>
					</tbody>
				<?php endforeach; ?>
			</table>

			<div style="background-color:grey;margin-bottom:20px;margin-top:20px">
				<h4 style="margin:0px;padding:5px">6. Tugas/Aktivitas dan Penilaian</h4>
			</div>
			<table style="width: 100%;font-size:14px">
				<thead>
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
						</tr>
					</tbody>
				<?php endforeach; ?>
			</table>

			<div style="background-color:grey;margin-bottom:0px;margin-top:20px">
				<h4 style="margin:0px;padding:5px">7. Rencana Pelaksanaan Pembelajaran</h4>
			</div>
			<i style="margin-bottom:20px;">Bagian ini memuat keterangan tentang Rencana Pelaksanaan Pembelajaran secara detail setiap pertemuan</i>
			<?php
			echo "<table class='table table-bordered' style='font-size:14px'>
<thead>
<tr style='text-align:center'>
<th>Minggu</th>
<th>Kemampuan Akhir yang Diharapkan</th>
<th>Indikator</th>
<th>Topik & Sub Topik</th>
<th>Aktivitas & Strategi Pembelajaran</th>
<th>Waktu</th>
<th>Penilaian</th>
</tr>
</thead>";


			for ($i = 0; $i < sizeof($minggu); $i++) {
				$empName = $kemampuan_akhir[$i];
				$indikatorName = $indikator[$i];
				$topikName = $topik[$i];
				$aktivitasName = $aktivitas_pembelajaran[$i];
				$waktuName = $waktu[$i];
				$penilaianName = $penilaian[$i];
				echo "<tbody><tr style='text-align:justify;vertical-align:middle'>";

				# If this row is not printed then print.
				# and make the printed value to "yes", so that
				# next time it will not printed.
				echo "<td style='text-align:center'>" . $minggu[$i] . "</td>";
				if ($kemampuan_arr[$empName]['printed'] == 'no') {
					echo "<td rowspan='" . $kemampuan_arr[$empName]['rowspan'] . "'>" . $empName . "</td>";
					$kemampuan_arr[$empName]['printed'] = 'yes';
				}
				if ($indikator_arr[$indikatorName]['printed'] == 'no') {
					echo "<td rowspan='" . $indikator_arr[$indikatorName]['rowspan'] . "'>" . $indikatorName . "</td>";
					$indikator_arr[$indikatorName]['printed'] = 'yes';
				}
				if ($topik_arr[$topikName]['printed'] == 'no') {
					echo "<td rowspan='" . $topik_arr[$topikName]['rowspan'] . "'>" . $topikName . "</td>";
					$topik_arr[$topikName]['printed'] = 'yes';
				}
				if ($aktivitas_arr[$aktivitasName]['printed'] == 'no') {
					echo "<td rowspan='" . $aktivitas_arr[$aktivitasName]['rowspan'] . "'>" . $aktivitasName . "</td>";
					$aktivitas_arr[$aktivitasName]['printed'] = 'yes';
				}
				echo "<td>" . $waktuName . "</td>";
				echo "<td>" . $penilaianName . "</td>";
				echo "</tr></tbody>";
			}
			echo "</table>";
			?>
		</div>
	</main>
</body>

</html>
