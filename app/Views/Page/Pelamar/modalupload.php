<!-- Modal -->
<div class="modal fade" id="modalupload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ganti Foto Profile</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('Back/Pelamar/updatefoto', ['class' => 'formtambahh']) ?>
			<?= csrf_field(); ?>
			<div class="modal-body">



				<div class="form-group row">
					<label style=" color:black;" for="foto" class="col-sm-2 col-form-label">Foto Profile</label>
					<div class="col-sm-8">
						<input class="form-control" type="file" name="foto" id="foto">
						<div class="invalid-feedback errorfoto">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label style=" color:black;" for="foto" class="col-sm-2 col-form-label">Foto Profile</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" name="tes" id="tes">
						<div class="invalid-feedback errortes">
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
				</div>

			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$(".formtambahh").submit(function(e) {
			e.preventDefault();
			let form = $('.formtambahh')[0];
			let data = new FormData(form);
			$.ajax({
				type: "post",
				url: "<?= site_url('Back/Pelamar/updatefoto') ?>",
				data: data,
				processData: false,
				contentType: false,
				cache: false,
				enctype: 'multipart/form-data',
				dataType: "json",
				beforeSend: function() {
					$('.btnsimpan').attr('disable', 'disabled');
					$('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
				},
				complete: function() {
					$('.btnsimpan').removeAttr('disable', );
					$('.btnsimpan').html('Simpan');
				},
				success: function(response) {
					if (response.error) {
						if (response.error.foto) {
							$('#foto').addClass('is-invalid');
							$('.errorfoto').html(response.error.foto);
						} else {
							$('#foto').removeClass('is-invalid');
							$('.errorfoto').html('');
						}
					} else {
						Swal.fire({
							icon: 'success',
							title: 'Berhasil',
							text: response.sukses

						})
						$('#modaltambah').modal('hide');
						window.location.href = '<?= base_url() ?>/Profile';
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				}
			});
			return false;
		});
	});
</script>