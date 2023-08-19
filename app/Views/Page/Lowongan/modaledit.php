<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Lowongan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Back/Lowongan/updatedata', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">



                <div class="form-group row">
                    <label style=" color:black;" for="nama_lowongan" class="col-sm-2 col-form-label">Nama
                        Lowongan</label>
                    <div class="col-sm-8">
                        <input style="color:black;" type="text" value="<?= $nama_lowongan ?>" name="nama_lowongan"
                            id="nama_lowongan" class="form-control">
                        <div class="invalid-feedback errornama_lowongan">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label style=" color:black;" for="status_lowongan" class="col-sm-2 col-form-label">Status
                        Lowongan</label>
                    <div class="col-sm-8">
                        <select style="color:black;" name="status_lowongan" id="status_lowongan" class="form-control">

                            <option value="Open" <?php if ($status_lowongan == 'Open') echo "selected"; ?>>Open</option>
                            <option value="Close" <?php if ($status_lowongan == 'Close') echo "selected"; ?>>Close
                            </option>
                        </select>

                        <div class="invalid-feedback errorstatus_lowongan">
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label style=" color:black;" for="kriterialowongan" class="col-sm-2 col-form-label">Kriteria
                        Lowongan</label>
                    <div class="col-sm-8">
                        <textarea style="color:black;" name="kriterialowongan" id="kriterialowongan"
                            class="form-control"><?= $kriteria ?>
                        </textarea>

                        <div class="invalid-feedback errorkriterialowongan">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="pendidikan" class="col-sm-2 col-form-label">Pendidikan
                        Minimal</label>
                    <div class="col-sm-8">
                        <select style="color:black;" name="pendidikan" id="pendidikan" class="form-control">

                            <option value="SD" <?php if ($pendidikan == 'SD') echo "selected"; ?>>SD </option>
                            <option value="SMP" <?php if ($pendidikan == 'SMP') echo "selected"; ?>>SMP </option>
                            <option value="SMA" <?php if ($pendidikan == 'SMA') echo "selected"; ?>>SMA </option>
                            <option value="D3" <?php if ($pendidikan == 'D3') echo "selected"; ?>>D3 </option>
                            <option value="S1/D4" <?php if ($pendidikan == 'S1/D4') echo "selected"; ?>>S1/D4 </option>
                            <option value="S2" <?php if ($pendidikan == 'S2') echo "selected"; ?>>S2</option>
                            <option value="S3" <?php if ($pendidikan == 'S3') echo "selected"; ?>>S3 </option>

                        </select>

                        <div class="invalid-feedback errorpendidikan">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label style=" color:black;" for="umur" class="col-sm-2 col-form-label">Umur Maksimal</label>
                    <div class="col-sm-8">
                        <input style="color:black;" value="<?= $umur ?>" type="number" name="umur" id="umur"
                            class="form-control">
                        <div class="invalid-feedback errorumur">
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label style=" color:black;" for="jenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <select style="color:black;" name="jenkel" id="jenkel" class="form-control">

                            <option value="Laki-Laki" <?php if ($jenkel == 'Laki-Laki') echo "selected"; ?>>Laki-Laki
                            </option>
                            <option value="Perempuan" <?php if ($jenkel == 'Perempuan') echo "selected"; ?>>Perempuan
                            </option>
                            <option value="Laki-Laki/Perempuan"
                                <?php if ($jenkel == 'Laki-Laki/Perempuan') echo "selected"; ?>>Laki-Laki/Perempuan
                            </option>
                        </select>

                        <div class="invalid-feedback errorjenkel">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="deskripsi_lowongan" class="col-sm-2 col-form-label">Deskripsi
                        Lowongan</label>
                    <div class="col-sm-8">
                        <textarea style="color:black;" name="deskripsi_lowongan" id="deskripsi_lowongan"
                            class="form-control"><?= $deskripsi_lowongan ?>
                        </textarea>

                        <div class="invalid-feedback errordeskripsi_lowongan">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="gaji" class="col-sm-2 col-form-label">Gaji</label>
                    <div class="col-sm-8">
                        <input value="<?= $gaji ?>" style="color:black;" type="text" name="gaji" id="gaji"
                            class="form-control">
                        <div class="invalid-feedback errorgaji">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btnsimpan">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                </div>
                <?= form_close() ?>
            </div>

        </div>
    </div>
    <script>
    $(document).ready(function() {
        $(".formtambah").submit(function(e) {
            e.preventDefault();
            let form = $('.formtambah')[0];
            let data = new FormData(form);
            $.ajax({
                type: "post",
                url: "<?= site_url('Back/Lowongan/updatedata') ?>",
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
                        if (response.error.nama_lowongan) {
                            $('#nama_lowongan').addClass('is-invalid');
                            $('.errornama_lowongan').html(response.error.nama_lowongan);
                        } else {
                            $('#nama_lowongan').removeClass('is-invalid');
                            $('.errornama_lowongan').html('');
                        }
                        if (response.error.status_lowongan) {
                            $('#status_lowongan').addClass('is-invalid');
                            $('.errorstatus_lowongan').html(response.error.status_lowongan);
                        } else {
                            $('#status_lowongan').removeClass('is-invalid');
                            $('.errorstatus_lowongan').html('');
                        }
                        if (response.error.kriterialowongan) {
                            $('#kriterialowongan').addClass('is-invalid');
                            $('.errorkriterialowongan').html(response.error
                                .kriterialowongan);
                        } else {
                            $('#kriterialowongan').removeClass('is-invalid');
                            $('.errorkriterialowongan').html('');
                        }
                        if (response.error.pendidikan) {
                            $('#pendidikan').addClass('is-invalid');
                            $('.errorpendidikan').html(response.error.pendidikan);
                        } else {
                            $('#pendidikan').removeClass('is-invalid');
                            $('.errorpendidikan').html('');
                        }
                        if (response.error.umur) {
                            $('#umur').addClass('is-invalid');
                            $('.errorumur').html(response.error.umur);
                        } else {
                            $('#umur').removeClass('is-invalid');
                            $('.errorumur').html('');
                        }
                        if (response.error.jenkel) {
                            $('#jenkel').addClass('is-invalid');
                            $('.errorjenkel').html(response.error.jenkel);
                        } else {
                            $('#jenkel').removeClass('is-invalid');
                            $('.errorjenkel').html('');
                        }
                        if (response.error.deskripsi_lowongan) {
                            $('#deskripsi_lowongan').addClass('is-invalid');
                            $('.errordeskripsi_lowongan').html(response.error
                                .deskripsi_lowongan);
                        } else {
                            $('#deskripsi_lowongan').removeClass('is-invalid');
                            $('.errordeskripsi_lowongan').html('');
                        }
                        if (response.error.gaji) {
                            $('#gaji').addClass('is-invalid');
                            $('.errorgaji').html(response.error.gaji);
                        } else {
                            $('#gaji').removeClass('is-invalid');
                            $('.errorgaji').html('');
                        }
                        if (response.error.keahlian) {
                            $('#keahlian').addClass('is-invalid');
                            $('.errorkeahlian').html(response.error.keahlian);
                        } else {
                            $('#keahlian').removeClass('is-invalid');
                            $('.errorkeahlian').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses

                        })
                        $('#modaledit').modal('hide');
                        dataAdmin();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
        });
    });
    $(document).on('click', '.btnhapusform', function(e) {
        e.preventDefault();
        $(this).parents('tr').remove();
    });
    </script>