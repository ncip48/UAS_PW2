<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center">
	<i class="mdi mdi-copyright"></i> <?= date('Y') ?> Kelompok 1 - RPS System
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/datatables.min.js') ?>"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/app-style-switcher.js') ?>"></script>
<!--Wave Effects -->
<script src="<?= base_url('assets/dist/js/waves.js') ?>"></script>
<!--Menu sidebar -->
<script src="<?= base_url('assets/dist/js/sidebarmenu.js') ?>"></script>
<!--Custom JavaScript -->
<script src="<?= base_url('assets/dist/js/custom.js') ?>"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="<?= base_url('assets/libs/chartist/dist/chartist.min.js') ?>"></script>
<script src="<?= base_url('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/pages/dashboards/dashboard1.js') ?>"></script>
<script src="<?= base_url('assets/dist/js/feather.min.js') ?>"></script>
<script>
	$(document).ready(function() {
		$('#datatables').DataTable({
			"paging": false,
			"ordering": false,
			"searching": false,
			"lengthChange": false,
			"language": {
				"info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
				"infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
				"infoFiltered": "(disaring dari _MAX_ total data)",
				"zeroRecords": "Tidak ada data yang cocok",
				"emptyTable": "Tidak ada data",
				"search": "Cari:",
				"paginate": {
					"first": "Pertama",
					"last": "Terakhir",
					"next": "Selanjutnya",
					"previous": "Sebelumnya"
				}
			},
		});
	});
</script>
<script>
	feather.replace()
</script>
<script>
	ClassicEditor
		.create(document.querySelector('#ck_dp'))
		.catch(error => {
			console.error(error);
		});

	ClassicEditor
		.create(document.querySelector('#ck_gu'))
		.catch(error => {
			console.error(error);
		});

	ClassicEditor
		.create(document.querySelector('#ck_ca'))
		.catch(error => {
			console.error(error);
		});

	ClassicEditor
		.create(document.querySelector('#ck_pr'))
		.catch(error => {
			console.error(error);
		});

	ClassicEditor
		.create(document.querySelector('#up1'))
		.catch(error => {
			console.error(error);
		});

	ClassicEditor
		.create(document.querySelector('#up2'))
		.catch(error => {
			console.error(error);
		});

	ClassicEditor
		.create(document.querySelector('#up1_e'))
		.then(editor => {
			window.editor = editor;
			UP1Editor = editor;
		})
		.catch(error => {
			console.error(error);
		});

	ClassicEditor
		.create(document.querySelector('#up2_e'))
		.then(editor => {
			window.editor = editor;
			UP2Editor = editor;
		})
		.catch(error => {
			console.error(error);
		});
</script>

<script>
	$(document).on("click", "#edit-up-btn", function() {
		var content = $(this).data('content');
		console.log(content['id']);
		var id = content['id']
		var kemampuan_akhir = content['kemampuan_akhir'];
		var indikator = content['indikator'];
		var bahan_kajian = content['bahan_kajian'];
		var metode_pembelajaran = content['metode_pembelajaran'];
		var waktu = content['waktu'];
		var metode_penilaian = content['metode_penilaian'];
		var bahan_ajar = content['bahan_ajar'];

		$("#id_up_e").val(id);
		$("#kemampuan_akhir_e").val(kemampuan_akhir);
		UP1Editor.setData(indikator);
		UP2Editor.setData(bahan_kajian);
		$("#metode_pembelajaran_e").val(metode_pembelajaran);
		$("#waktu_e").val(waktu);
		$("#metode_penilaian_e").val(metode_penilaian);
		$("#bahan_ajar_e").val(bahan_ajar);

	});
</script>

</body>

</html>
