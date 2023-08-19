<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Back/Akun/simpandata', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">

                <div class="form-group row">
                    <label style=" color:black;" for="role" class="col-sm-2 col-form-label">Role Akun </label>
                    <div class="col-sm-8">
                        <select name="role" id="role" class="form-control">
                            <option style="color:black;" value="">--Pilih--</option>
                            <option style="color:black;" value="Admin">Admin</option>
                            <option style="color:black;" value="Pelamar">Pelamar</option>
                        </select>
                        <div class="invalid-feedback errorrole">
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label style=" color:black;" for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input style="color:black;" type="text" name="nama" id="nama" class="form-control">
                        <div class="invalid-feedback errornama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="status" class="col-sm-2 col-form-label">Jenis Kelamin </label>
                    <div class="col-sm-8">
                        <select name="jk" id="jk" class="form-control">
                            <option style="color:black;" value="">--Pilih--</option>
                            <option style="color:black;" value="Laki-Laki">Laki-Laki</option>
                            <option style="color:black;" value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback errorjk">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="status" class="col-sm-2 col-form-label">Status </label>
                    <div class="col-sm-8">
                        <select name="status" id="stts" class="form-control">
                            <option style="color:black;" value="">--Pilih--</option>
                            <option style="color:black;" value="ON">On</option>
                            <option style="color:black;" value="OFF">Off</option>
                        </select>
                        <div class="invalid-feedback errorstatus">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="username" class="col-sm-2 col-form-label">Username </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="text" name="username" id="username" class="form-control">
                        <div class="invalid-feedback errorusername">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label style="color:black;" for="password" class="col-sm-2 col-form-label">Password </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="password" name="password" id="password" class="form-control" minlength="8">
                        <div class="invalid-feedback errorpassword">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="rePassword" class="col-sm-2 col-form-label">Ulangi
                        Password</label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="password" class="form-control" id="repassword" name="repassword" minlength="8">
                        <div class="invalid-feedback errorrepassword">
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
                    url: "<?= site_url('Back/Akun/simpandata') ?>",
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
                            if (response.error.nama) {
                                $('#nama').addClass('is-invalid');
                                $('.errornama').html(response.error.nama);
                            } else {
                                $('#nama').removeClass('is-invalid');
                                $('.errornama').html('');
                            }
                            if (response.error.jk) {
                                $('#jk').addClass('is-invalid');
                                $('.errorjk').html(response.error.jk);
                            } else {
                                $('#jk').removeClass('is-invalid');
                                $('.errorjk').html('');
                            }
                            if (response.error.username) {
                                $('#username').addClass('is-invalid');
                                $('.errorusername').html(response.error.username);
                            } else {
                                $('#username').removeClass('is-invalid');
                                $('.errorusername').html('');
                            }
                            if (response.error.password) {
                                $('#password').addClass('is-invalid');
                                $('.errorpassword').html(response.error.password);
                            } else {
                                $('#password').removeClass('is-invalid');
                                $('.errorpassword').html('');
                            }
                            if (response.error.repassword) {
                                $('#repassword').addClass('is-invalid');
                                $('.errorrepassword').html(response.error.repassword);
                            } else {
                                $('#repassword').removeClass('is-invalid');
                                $('.errorrepassword').html('');
                            }
                            if (response.error.role) {
                                $('#role').addClass('is-invalid');
                                $('.errorrole').html(response.error.role);
                            } else {
                                $('#role').removeClass('is-invalid');
                                $('.errorrole').html('');
                            }
                            if (response.error.status) {
                                $('#stts').addClass('is-invalid');
                                $('.errorstatus').html(response.error.status);
                            } else {
                                $('#stts').removeClass('is-invalid');
                                $('.errorstatus').html('');
                            }
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
    </script>