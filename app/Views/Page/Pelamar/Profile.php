<?= $this->extend('Base/Main') ?>
<?= $this->extend('Base/Menu') ?>
<?= $this->section('Konten') ?>

<?php
$this->db = \config\Database::connect();
$session = \config\services::session();
$id_user = $session->get('id_user');
$role = $session->get('role');

if ($role == 'Pelamar') {
	$user = $this->db->query("SELECT * from tbl_user WHERE id_user='$id_user'");
	$datauser = $user->getRow();
	$query_cekuser = $this->db->query("SELECT * from tbl_pelamar  WHERE user='$id_user'");
	$row = $query_cekuser->getRow();
} else {
	$user = $this->db->query("SELECT * from tbl_user WHERE id_user='$id_user'");
	$datauser = $user->getRow();
}

?>
<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<?= form_open_multipart('Back/Pelamar/simpandata', ['class' => 'formtambah']) ?>
			<?= csrf_field(); ?>
			<div class="card-body">
				<h3 class="mt-0 header-title">Profile</h3>
				<div class="form-group row">

					<div class="col-sm-12 text-center">
						<button class="btn" data-toggle="modal" data-target="#modalupload" type="button">
							<img style="border-radius: 60px;  max-height: 200px; max-width: 300px;border: 0;" src="<?= base_url() ?>/assets/images/profil/<?= $datauser->foto ?>" alt="Foto Profile">
						</button>

					</div>
				</div>
				<div style="display: none;" class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Id Pelamar</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" value="<?= $id_user ?>" name="id_user" id="id_user">
					</div>
				</div>
				<div style="display: none;" class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Id Pelamar</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" value="<?= $row->id_pelamar ?>" name="id_pelamar" id="id_pelamar">
					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Profile Singkat</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="profile" id="profile"><?= $row->profile ?></textarea>
						<div class="invalid-feedback errorprofile">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Nama Lengkap</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" value="<?= $row->nama_lengkap ?>" name="nama_lengkap" id="nama_lengkap">
						<div class="invalid-feedback errornama_lengkap">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Nama Panggilan</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" value="<?= $row->nama_panggilan ?>" name="nama_panggilan" id="nama_panggilan">
						<div class="invalid-feedback errornama_panggilan">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Lahir</label>
					<div class="col-sm-10">
						<input class="form-control" type="date" value="<?= $row->tanggal_lahir ?>" name="tanggal_lahir" id="tanggal_lahir">
						<div class="invalid-feedback errortanggal_lahir">
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">No Hp</label>
					<div class="col-sm-10">
						<input class="form-control" type="number" value="<?= $row->no_hp ?>" name="no_hp" id="no_hp">
						<div class="invalid-feedback errorno_hp">
						</div>

					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Alamat Domisili</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="alamat_domisili" id="alamat_domisili"><?= $row->alamat_domisili ?></textarea>
						<div class="invalid-feedback erroralamat_domisili">
						</div>

					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Hobi</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="hobi" id="hobi"><?= $row->hobi ?></textarea>
						<div class="invalid-feedback errorhobi">
						</div>

					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
					<div class="col-sm-10">
						<select class="custom-select" name="pendidikan_terakhir" id="pendidikan_terakhir">
							<option value="">-- PILIH --</option>
							<option value="SD" <?php if ($row->pendidikan_terakhir  == 'SD') echo "selected"; ?>>SD
							</option>
							<option value="SMP" <?php if ($row->pendidikan_terakhir == 'SMP') echo "selected"; ?>>SMP
							</option>
							<option value="SMA" <?php if ($row->pendidikan_terakhir == 'SMA') echo "selected"; ?>>SMA
							</option>
							<option value="D3" <?php if ($row->pendidikan_terakhir == 'D3') echo "selected"; ?>>D3
							</option>
							<option value="S1/D4" <?php if ($row->pendidikan_terakhir == 'S1/D4') echo "selected"; ?>>
								S1/D4 </option>
							<option value="S2" <?php if ($row->pendidikan_terakhir == 'S2') echo "selected"; ?>>S2
							</option>
							<option value="S3" <?php if ($row->pendidikan_terakhir == 'S3') echo "selected"; ?>>S3
							</option>
						</select>
						<div class="invalid-feedback errorpendidikan_terakhir">
						</div>


					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Nama Sekolah / Institusi
						Terakhir</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="nama_sekola" value="<?= $row->nama_sekola ?>" id="nama_sekola">
						<div class="invalid-feedback errornama_sekola">
						</div>

					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Pengalaman Organisasi</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="pengalaman_organisasi" id="pengalaman_organisasi"><?= $row->profile ?></textarea>
						<div class="invalid-feedback errorpengalaman_organisasi">
						</div>

					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Pengalaman Kerja</label>
					<div class="col-sm-10">
						<textarea class="form-control" name="pengalaman_kerja" id="pengalaman_kerja"><?= $row->profile ?></textarea>
						<div class="invalid-feedback errorpengalaman_kerja">
						</div>

					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Ijazah Terakhir</label>
					<div class="col-sm-10">
						<input class="form-control" type="file" name="ijazah_terakhir" id="ijazah_terakhir">
						<div class="invalid-feedback errorijazah_terakhir">
						</div>
						<small>Type File: PDF</small>
					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">CV</label>
					<div class="col-sm-10">
						<input class="form-control" type="file" name="cv" id="cv">
						<div class="invalid-feedback errorcv">
						</div>
						<small>Type File: PDF</small>
					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Portofolio</label>
					<div class="col-sm-10">
						<input class="form-control" type="file" name="portofolio" id="portofolio">
						<div class="invalid-feedback errorportofolio">
						</div>
						<small>Type File: PDF</small>
					</div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Sertifikat</label>
					<div class="col-sm-10">
						<input class="form-control" type="file" name="sertifikat" id="sertifikat">
						<div class="invalid-feedback errorsertifikat">
						</div>
						<small>Type File: PDF</small>
					</div>
				</div>

				<div class="form-group row">
					<label style=" color:black;" for="keterangan" class="col-sm-2 col-form-label">Keahlian Khusus
					</label>
					<div class="col-sm-10">
						<table class="table table-sm table-bordered">
							<thead>
								<tr>
									<th>Jenis Keahlian</th>
									<th>#</th>
								</tr>
							</thead>
							<tbody class="formtambahh">
								<tr>

									<td>
										<select required="" name="keahlian[]" id="keahlian" class="form-control">
											<option style="color:black;" value="">----PILIH----</option>
											<?php
											$db   = \Config\Database::connect();
											$datakeahlian = $db->query("SELECT * from tbl_keahlian");
											$data = $datakeahlian->getResult();
											foreach ($data as $row) {
											?>
												<option style="color:black;" value="<?= $row->id_keahlian ?>">
													<?= $row->keahlian ?></option>

											<?php } ?>
										</select>

									</td>
									<td>
										<button type="button" class="btn btn-primary btnaddform">
											<i class="fa fa-plus"></i>
										</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="form-group row">
					<div class="col-12">
						<button type="submit" style="background-color:blue; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.3); 
                         color: #ffff; font-weight: 600; border:1px solid #2148C0;" class="btn btn-primary 
                         btn-block waves-effect waves-light btnsimpan">Simpan Data</button>
					</div>
					<!-- <div class="col-6">
						<button style="background-color:blue; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.3);  
                        color: #ffff; font-weight: 600; border:1px solid #2148C0;" class="btn btn-primary 
                        btn-block waves-effect waves-light btnganti" type="button">Ganti Password</button>
					</div> -->
				</div>


				<?= form_close() ?>


			</div>

		</div>
	</div> <!-- end col -->

</div> <!-- end row -->

<!-- <div class="viewmodal" style="display: none;">

</div> -->




<div class="modal fade" id="modalupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog  modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 style="color:black;" class="modal-title" id="exampleModalLabel">Ganti Foto Profile</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('Back/Pelamar/updatefoto', ['class' => 'formupload']) ?>
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



				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-simpan">Simpan</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
				</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>

</div>
<script>
	$(document).ready(function() {
		$('.btnaddform').click(function(e) {
			e.preventDefault();
			$('.formtambahh').append(`
                <tr>
                <td>
                                        <select required="" name="keahlian[]" id="keahlian" class="form-control">
                                            <option style="color:black;" value="">----PILIH----</option>
                                            <?php
											$db   = \Config\Database::connect();
											$datakeahlian = $db->query("SELECT * from tbl_keahlian");
											$data = $datakeahlian->getResult();
											foreach ($data as $row) {
											?>
                                            <option style="color:black;" value="<?= $row->id_keahlian ?>">
                                                <?= $row->keahlian ?></option>

                                            <?php } ?>
                                        </select>
                                     
                                    </td>
                                <td>
                                
                                
                <button type="button" class="btn btn-danger btnhapusform">
                    <i class="fa fa-trash"></i>
                </button>
            </td>

        </tr>
            `);
		});

		$(".formupload").submit(function(e) {
			e.preventDefault();
			let form = $('.formupload')[0];
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
		$(".formtambah").submit(function(e) {
			e.preventDefault();
			let form = $('.formtambah')[0];
			let data = new FormData(form);
			$.ajax({
				type: "post",
				url: "<?= site_url('Back/Pelamar/simpanprofile') ?>",
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
						if (response.error.profile) {
							$('#profile').addClass('is-invalid');
							$('.errorprofile').html(response.error.profile);
						} else {
							$('#profile').removeClass('is-invalid');
							$('.errorprofile').html('');
						}
						if (response.error.nama_lengkap) {
							$('#nama_lengkap').addClass('is-invalid');
							$('.errornama_lengkap').html(response.error.nama_lengkap);
						} else {
							$('#nama_lengkap').removeClass('is-invalid');
							$('.errornama_lengkap').html('');
						}
						if (response.error.nama_panggilan) {
							$('#nama_panggilan').addClass('is-invalid');
							$('.errornama_panggilan').html(response.error.nama_panggilan);
						} else {
							$('#nama_panggilan').removeClass('is-invalid');
							$('.errornama_panggilan').html('');
						}
						if (response.error.tanggal_lahir) {
							$('#tanggal_lahir').addClass('is-invalid');
							$('.errortanggal_lahir').html(response.error.tanggal_lahir);
						} else {
							$('#tanggal_lahir').removeClass('is-invalid');
							$('.errortanggal_lahir').html('');
						}
						if (response.error.no_hp) {
							$('#no_hp').addClass('is-invalid');
							$('.errorno_hp').html(response.error.no_hp);
						} else {
							$('#no_hp').removeClass('is-invalid');
							$('.errorno_hp').html('');
						}
						if (response.error.alamat_domisili) {
							$('#alamat_domisili').addClass('is-invalid');
							$('.erroralamat_domisili').html(response.error.alamat_domisili);
						} else {
							$('#alamat_domisili').removeClass('is-invalid');
							$('.erroralamat_domisili').html('');
						}
						if (response.error.hobi) {
							$('#hobi').addClass('is-invalid');
							$('.errorhobi').html(response.error.hobi);
						} else {
							$('#hobi').removeClass('is-invalid');
							$('.errorhobi').html('');
						}
						if (response.error.pendidikan_terakhir) {
							$('#pendidikan_terakhir').addClass('is-invalid');
							$('.errorpendidikan_terakhir').html(response.error
								.pendidikan_terakhir);
						} else {
							$('#pendidikan_terakhir').removeClass('is-invalid');
							$('.errorpendidikan_terakhir').html('');
						}
						if (response.error.nama_sekola) {
							$('#nama_sekola').addClass('is-invalid');
							$('.errornama_sekola').html(response.error.nama_sekola);
						} else {
							$('#nama_sekola').removeClass('is-invalid');
							$('.errornama_sekola').html('');
						}
						if (response.error.pengalaman_organisasi) {
							$('#pengalaman_organisasi').addClass('is-invalid');
							$('.errorpengalaman_organisasi').html(response.error
								.pengalaman_organisasi);
						} else {
							$('#pengalaman_organisasi').removeClass('is-invalid');
							$('.errorpengalaman_organisasi').html('');
						}
						if (response.error.pengalaman_kerja) {
							$('#pengalaman_kerja').addClass('is-invalid');
							$('.errorpengalaman_kerja').html(response.error.pengalaman_kerja);
						} else {
							$('#pengalaman_kerja').removeClass('is-invalid');
							$('.errorpengalaman_kerja').html('');
						}
						if (response.error.ijazah_terakhir) {
							$('#ijazah_terakhir').addClass('is-invalid');
							$('.errorijazah_terakhir').html(response.error.ijazah_terakhir);
						} else {
							$('#C').removeClass('is-invalid');
							$('.errorijazah_terakhir').html('');
						}
						if (response.error.cv) {
							$('#cv').addClass('is-invalid');
							$('.errorcv').html(response.error.cv);
						} else {
							$('#cv').removeClass('is-invalid');
							$('.errorcv').html('');
						}
						if (response.error.portofolio) {
							$('#portofolio').addClass('is-invalid');
							$('.errorportofolio').html(response.error.portofolio);
						} else {
							$('#portofolio').removeClass('is-invalid');
							$('.errorportofolio').html('');
						}
						if (response.error.sertifikat) {
							$('#sertifikat').addClass('is-invalid');
							$('.errorsertifikat').html(response.error.sertifikat);
						} else {
							$('#sertifikat').removeClass('is-invalid');
							$('.errorsertifikat').html('');
						}

					} else {
						Swal.fire({
							icon: 'success',
							title: 'Berhasil',
							text: response.sukses

						})
						window.location.href = '<?= base_url() ?>/Profile';
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				}
			});
			return false;
		});

		$(document).ready(function() {
			$('.btnupload').click(function(e) {
				e.preventDefault();
				$.ajax({
					url: "<?= site_url('Back/Pelamar/formupload') ?>",
					dataType: "json",
					success: function(response) {
						$('.viewmodal').html(response.data).show();
						$('#modaltambah').modal('show');
					},
					error: function(xhr, ajaxOptions, thrownError) {
						alert(xhr.status + "\n" + xhr.responseText + "\n" +
							thrownError);
					}



				});
			});
		});
	});
	$(document).on('click', '.btnhapusform', function(e) {
		e.preventDefault();
		$(this).parents('tr').remove();
	});
</script>
<?= $this->endsection() ?>