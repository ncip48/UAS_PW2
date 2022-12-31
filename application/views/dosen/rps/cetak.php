<html>

<head>
	<style>
		@page {
			size: a4 landscape;
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

		table {
			page-break-inside: avoid !important;
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
	</style>
</head>

<body>
	<?php
	$path = 'assets/images/amikom.png';
	$type = pathinfo($path, PATHINFO_EXTENSION);
	$data = file_get_contents($path);
	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
	?>
	<table style="width: 100%;">
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
				<?= $rps->nomor ?>
			</td>
			<td style="text-align:center">
				<?= date('Y', strtotime($rps->tanggal_berlaku)) ?>
			</td>
			<td style="text-align:center">
				<?= date('d M Y', strtotime($rps->tanggal_disusun)) ?>
			</td>
			<td style="text-align:center" class="td-no-left-right-border">
				<?= $rps->revisi ?>
			</td>
		</tr>
		<tr>
			<td style="text-align:center" class="td-no-left-right-border" colspan="4">
				Blank Space
			</td>
		</tr>
		<tr>
			<td style="text-align:center" class="td-no-left-border">
				Disetujui oleh, Dekan <?= $matkul->nama_fakultas ?>
			</td>
			<td style="text-align:center">
				Diperiksa oleh, Kaprodi <?= $matkul->nama_prodi ?>
			</td>
			<td style="text-align:center">
				Disusun oleh, Koordinator Matakuliah
			</td>
			<td style="text-align:center" class="td-no-left-right-border">
				Dikendalikan oleh, Sekretaris Prodi <?= $matkul->nama_prodi ?>
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
	<center style="margin-top: 100px;">
		<h2 style="margin:0px"><b>Universitas Amikom Yogyakarta</b></h2>
		<h2 style="margin:0px"><b>Yogyakarta</b></h2>
		<h2 style="margin:0px"><b>2021</b></h2>
	</center>
	<div class="page_break"></div>
	<header>
		<table>
			<tr style="width: 100%;">
				<td style="text-align: center; width: 100px;">
					<img src="<?= $base64 ?>" alt="Logo" style="width: 10px;">
				</td>
				<td style="text-align: center;">
					<h1 style="margin-bottom: 0px;">Rencana Pembelajaran Semester</h1>
					<h1 style="margin-bottom: 0px;">(RPS)</h1>
					<h1 style="margin-bottom: 0px;">Program Studi D3 Teknik Informatika</h1>
					<h1 style="margin-bottom: 0px;">Fakultas Ilmu Komputer</h1>
					<h1 style="margin-bottom: 0px;">Universitas Amikom Yogyakarta</h1>
				</td>
			</tr>
			</tr>
		</table>
	</header>
	<?php

	echo "<table class='table table-bordered' page-break-inside:auto;>
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
		echo "</tbody></tr>";
	}

	// for ($j = 0; $j < sizeof($minggu); $j++) {
	// 	$indikatorName = $indikator[$j];
	// 	echo "<tr>";

	// 	# If this row is not printed then print.
	// 	# and make the printed value to "yes", so that
	// 	# next time it will not printed.
	// 	echo "<td>" . $minggu[$j] . "</td>";
	// 	if ($indikator_arr[$indikatorName]['printed'] == 'no') {
	// 		echo "<td rowspan='" . $indikator_arr[$indikatorName]['rowspan'] . "'>" . $indikatorName . "</td>";
	// 		$indikator_arr[$indikatorName]['printed'] = 'yes';
	// 	}
	// 	echo "</tr>";
	// }
	echo "</table><div style='page-break-before: avoid'></div>";
	?>
</body>

</html>
