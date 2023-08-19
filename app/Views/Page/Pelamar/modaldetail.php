<!-- Modal -->
<div class="modal fade" id="modaldetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Data Pelamar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">



				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">Nama Lengkap</label>
					<div class="col-sm-8">
						<input disabled style="color:black;" type="text" value="<?= $nama_lengkap ?>" class="form-control">

					</div>
				</div>
				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">Nama Panggilan</label>
					<div class="col-sm-8">
						<input disabled style="color:black;" type="text" value="<?= $nama_panggilan ?>" class="form-control">

					</div>
				</div>
				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">No Hp</label>
					<div class="col-sm-8">
						<input disabled style="color:black;" type="text" value="<?= $no_hp ?>" class="form-control">

					</div>
				</div>

				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">Alamat Domisili</label>
					<div class="col-sm-8">
						<input disabled style="color:black;" type="text" value="<?= $alamat_domisili ?>" class="form-control">

					</div>
				</div>
				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">Alamat Domisili</label>
					<div class="col-sm-8">
						<input disabled style="color:black;" type="text" value="<?= $alamat_domisili ?>" class="form-control">

					</div>
				</div>


				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">Hoby</label>
					<div class="col-sm-8">
						<input disabled style="color:black;" type="text" value="<?= $hobi ?>" class="form-control">

					</div>
				</div>
				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
					<div class="col-sm-8">
						<input disabled style="color:black;" type="text" value="<?= $pendidikan_terakhir ?>" class="form-control">

					</div>
				</div>
				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">Nama Sekolah</label>
					<div class="col-sm-8">
						<input disabled style="color:black;" type="text" value="<?= $nama_sekola ?>" class="form-control">

					</div>
				</div>

				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">Pengalaman Organisasi</label>
					<div class="col-sm-8">
						<input disabled style="color:black;" type="text" value="<?= $pengalaman_organisasi ?>" class="form-control">

					</div>
				</div>
				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">Pengalaman Kerja</label>
					<div class="col-sm-8">
						<input disabled style="color:black;" type="text" value="<?= $pengalaman_kerja ?>" class="form-control">

					</div>
				</div>

				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">Ijazah Terakhir</label>
					<div class="col-sm-8">
						<a class="form-control" href="<?= base_url() ?>/Back/Pelamar/download/<?= $ijazah_terakhir ?>"><?= $ijazah_terakhir ?></a>

					</div>
				</div>
				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">CV</label>
					<div class="col-sm-8">
						<a class="form-control" href="<?= base_url() ?>/Back/Pelamar/download/<?= $cv ?>"><?= $cv ?></a>

					</div>
				</div>
				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">Portofolio</label>
					<div class="col-sm-8">
						<a class="form-control" href="<?= base_url() ?>/Back/Pelamar/download/<?= $portofolio ?>"><?= $portofolio ?></a>

					</div>
				</div>
				<div class="form-group row">
					<label style=" color:black;" class="col-sm-2 col-form-label">Sertifikat</label>
					<div class="col-sm-8">
						<a class="form-control" href="<?= base_url() ?>/Back/Pelamar/download/<?= $sertifikat ?>"><?= $sertifikat ?></a>

					</div>
				</div>


				<div class="form-group row">
					<label style=" color:black;" for="keterangan" class="col-sm-2 col-form-label">Keahlian
					</label>

					<div class="col-sm-8">
						<table class="table table-sm table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Jenis Keahlian</th>

								</tr>
							</thead>
							<tbody class="formtambahh">
								<?php
								$this->db = \config\Database::connect();
								$query_ceksyarat = $this->db->query("SELECT * from tbl_skil  WHERE user='$user'");
								$result = $query_ceksyarat->getResult();
								$i = 0;
								foreach ($result as $row) {
									$i++;
									$keahlian = $row->keahlian;
									$query = $this->db->query("SELECT * from tbl_keahlian  WHERE id_keahlian='$keahlian'");
									$raw = $query->getRow();
								?>
									<tr>
										<td><?= $i ?></td>
										<td>
											<?= $raw->keahlian ?>
										</td>

									</tr>
								<?php } ?>
							</tbody>

						</table>
					</div>

				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
				</div>
			</div>

		</div>
	</div>