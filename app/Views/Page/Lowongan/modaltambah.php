<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Lowongan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Back/Lowongan/simpandata', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">



                <div class="form-group row">
                    <label style=" color:black;" for="nama_lowongan" class="col-sm-2 col-form-label">Nama Lowongan</label>
                    <div class="col-sm-8">
                        <input style="color:black;" type="text" name="nama_lowongan" id="nama_lowongan" class="form-control">
                        <div class="invalid-feedback errornama_lowongan">
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label style=" color:black;" for="status_lowongan" class="col-sm-2 col-form-label">Status Lowongan</label>
                    <div class="col-sm-8">
                        <select  style="color:black;"  name="status_lowongan" id="status_lowongan" class="form-control">
                            <option value="">-- PILIH --</option>
                            <option value="Open">Open</option>
                            <option value="Close">Close</option>
                        </select>
                       
                        <div class="invalid-feedback errorstatus_lowongan">
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label style=" color:black;" for="kriterialowongan" class="col-sm-2 col-form-label">Kriteria Lowongan</label>
                    <div class="col-sm-8">
                        <textarea style="color:black;"name="kriterialowongan" id="kriterialowongan" class="form-control">

                        </textarea>
                       
                        <div class="invalid-feedback errorkriterialowongan">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="pendidikan" class="col-sm-2 col-form-label">Pendidikan Minimal</label>
                    <div class="col-sm-8">
                        <select  style="color:black;"  name="pendidikan" id="pendidikan" class="form-control">
                            <option value="">-- PILIH --</option>
                            <option value="SD">SD </option>
                            <option value="SMP">SMP </option>
                            <option value="SMA">SMA </option>
                            <option value="D3">D3 </option>
                            <option value="S1/D4">S1/D4 </option>
                            <option value="S2">S2</option>
                            <option value="S3">S3 </option>

                        </select>
                       
                        <div class="invalid-feedback errorpendidikan">
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label style=" color:black;" for="umur" class="col-sm-2 col-form-label">Umur Maksimal</label>
                    <div class="col-sm-8">
                        <input style="color:black;" type="number" name="umur" id="umur" class="form-control">
                        <div class="invalid-feedback errorumur">
                        </div>
                    </div>
                </div>
                
                    
                <div class="form-group row">
                    <label style=" color:black;" for="jenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <select  style="color:black;"  name="jenkel" id="jenkel" class="form-control">
                            <option value="">-- PILIH --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki-Laki/Perempuan">Laki-Laki/Perempuan</option>
                        </select>
                       
                        <div class="invalid-feedback errorjenkel">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="deskripsi_lowongan" class="col-sm-2 col-form-label">Deskripsi Lowongan</label>
                    <div class="col-sm-8">
                        <textarea style="color:black;"name="deskripsi_lowongan" id="deskripsi_lowongan" class="form-control">

                        </textarea>
                       
                        <div class="invalid-feedback errordeskripsi_lowongan">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="gaji" class="col-sm-2 col-form-label">Gaji</label>
                    <div class="col-sm-8">
                        <input style="color:black;" type="text" name="gaji" id="gaji" class="form-control">
                        <div class="invalid-feedback errorgaji">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label style=" color:black;" for="keterangan" class="col-sm-2 col-form-label">Keahlian Khusus </label>

                    <div class="col-sm-8">
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

            $(".formtambah").submit(function(e) {
                e.preventDefault();
                let form = $('.formtambah')[0];
                let data = new FormData(form);
                $.ajax({
                    type: "post",
                    url: "<?= site_url('Back/Lowongan/simpandata') ?>",
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
                                $('.errorkriterialowongan').html(response.error.kriterialowongan);
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
                                $('.errordeskripsi_lowongan').html(response.error.deskripsi_lowongan);
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
                            $('#modaltambah').modal('hide');
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