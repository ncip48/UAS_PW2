<div class="page-wrapper" style="display: block;">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-titles">
		<div class="row">
			<div class="col-lg-8 col-md-6 col-12 align-self-center">
				<h1 class="mb-0 fw-bold">RPS</h1>
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

				<?php

				echo "<table class='table table-bordered'>
<tr style='text-align:center'>
<th>Minggu</th>
<th>Kemampuan Akhir yang Diharapkan</th>
<th>Indikator</th>
<th>Topik & Sub Topik</th>
<th>Aktivitas & Strategi Pembelajaran</th>
<th>Waktu</th>
<th>Penilaian</th>
</tr>";


				for ($i = 0; $i < sizeof($minggu); $i++) {
					$empName = $kemampuan_akhir[$i];
					$indikatorName = $indikator[$i];
					$topikName = $topik[$i];
					$aktivitasName = $aktivitas_pembelajaran[$i];
					$waktuName = $waktu[$i];
					$penilaianName = $penilaian[$i];
					echo "<tr style='text-align:justify;vertical-align:middle'>";

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
					echo "</tr>";
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
				echo "</table>";
				?>
			</div>
		</div>
		<!-- Row -->
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
