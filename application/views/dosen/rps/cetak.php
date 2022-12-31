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
	</style>
</head>

<body>
	<?php
	$path = 'assets/images/amikom.png';
	$type = pathinfo($path, PATHINFO_EXTENSION);
	$data = file_get_contents($path);
	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
	?>
	<header>
		<table>
			<tr style="width: 100%;">
				<td style="text-align: center; width: 100px;">
					<img src="<?= $base64 ?>" alt="Logo" style="width: 100px;">
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
