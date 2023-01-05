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
</script>

</body>

</html>
