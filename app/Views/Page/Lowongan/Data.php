<?= form_open('Back/Pages/Admin/hapusbanyak', ['class' => 'formhapusbanyak']) ?>
<p>


</p>
<div class="table-responsive">
	<table class="table table-sm table-striped" id="dataAkun">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Lowongan</th>
				<th>Status Lowongan</th>
				<th>Pendidikan</th>
				<th>Gaji</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>
</div>
<?= form_close(); ?>
<script>
	function listdataadmin() {
		var table = $('#dataAkun').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?= site_url('Back/Lowongan/listdata') ?>",
				"type": "POST"
			},
			//OPTIONAL
			"columDefs": [{
				"targets": 0,
				"orderable": false,
			}],
		})
	}
	$(document).ready(function() {
		listdataadmin();
	});
	Status

	function edit(id_lowongan) {
		$.ajax({
			type: "post",
			url: "<?= site_url('Back/Lowongan/formedit') ?>",
			data: {
				id_lowongan: id_lowongan
			},
			dataType: "json",
			success: function(response) {
				if (response.sukses) {
					$('.viewmodal').html(response.sukses).show();
					$('#modaledit').modal('show');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
			}
		});
	}

	function Status(id_lowongan) {
		$.ajax({
			type: "post",
			url: "<?= site_url('Back/Lowongan/formstatus') ?>",
			data: {
				id_lowongan: id_lowongan
			},
			dataType: "json",
			success: function(response) {
				if (response.sukses) {
					$('.viewmodal').html(response.sukses).show();
					$('#modalstatus').modal('show');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
			}
		});
	}

	function detail(id_lowongan) {
		$.ajax({
			type: "post",
			url: "<?= site_url('Back/Lowongan/formdetail') ?>",
			data: {
				id_lowongan: id_lowongan
			},
			dataType: "json",
			success: function(response) {
				if (response.sukses) {
					$('.viewmodal').html(response.sukses).show();
					$('#modaldetail').modal('show');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
			}
		});
	}

	function hapus(id_keahlian) {
		Swal.fire({
			title: 'Keahlian',
			text: `Yakin Untuk Menghapus Data Ini ?`,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#072DD6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'ya',
			cancelButtonText: 'tidak',
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "post",
					url: "<?= site_url('Back/Keahlian/hapus') ?>",
					data: {
						id_keahlian: id_keahlian
					},
					dataType: "json",
					success: function(response) {
						if (response.sukses) {
							Swal.fire({
								icon: 'success',
								title: 'Berhasil',
								text: response.sukses,
							});
							dataAdmin();
						}
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
					}
				});
			}
		});
	}
</script>