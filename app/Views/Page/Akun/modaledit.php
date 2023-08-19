<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Back/Akun/updatedata', ['class' => 'formedit']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input style="display: none;" type="text" class="form-control" id="id" name="id" value="<?= $id_user ?>">
                <div class="form-group row">
                    <label style=" color:black;" for="level" class="col-sm-2 col-form-label">Role Akun </label>
                    <div class="col-sm-8">
                        <select name="role" id="role" class="form-control">
                            <option style="color:black;" value="Admin" <?php if ($role == 'Admin') echo "selected"; ?>>
                                Admin</option>
                            <option style="color:black;" value="Pelamar" <?php if ($role == 'Pelamar') echo "selected"; ?>>Pelamar</option>
                        </select>
                        <div class="invalid-feedback errorrole">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label style=" color:black;" for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input style="color:black;" type="text" name="nama" id="nama" value="<?= $nama ?>" class="form-control">
                        <div class="invalid-feedback errornama">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="jk" class="col-sm-2 col-form-label">Jenis Kelamin </label>
                    <div class="col-sm-8">
                        <select name="jk" id="jk" class="form-control">
                            <option style="color:black;" value="Laki-Laki" <?php if ($jk == 'Laki-Laki') echo "selected"; ?>>Laki-Laki
                            </option>
                            <option style="color:black;" value="Perempuan" <?php if ($jk == 'Perempuan') echo "selected"; ?>>Perempuan
                            </option>
                        </select>
                        <div class="invalid-feedback errorsjk">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="status" class="col-sm-2 col-form-label">Status </label>
                    <div class="col-sm-8">
                        <select name="status" id="stts" class="form-control">
                            <option style="color:black;" value="ON" <?php if ($status == 'ON') echo "selected"; ?>>On
                            </option>
                            <option style="color:black;" value="OFF" <?php if ($status == 'OFF') echo "selected"; ?>>Off
                            </option>
                        </select>
                        <div class="invalid-feedback errorstatus">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="username" class="col-sm-2 col-form-label">Username </label>
                    <div class="col-sm-8">
                        <input style=" color:black;" type="text" name="username" id="username" value="<?= $username ?>" class="form-control">
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
            $('.formedit').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('.btnsimpan').attr('disable', 'disabled');
                        $('.btnsimpan').html('<i class="fa fa-spin fa-spinner"></i>');
                    },
                    complete: function() {
                        $('.btnsimpan').removeAttr('disable', );
                        $('.btnsimpan').html('Update');
                    },
                    success: function(response) {
                        if (response.error) {
                            if (response.error.repassword) {
                                $('#repassword').addClass('is-invalid');
                                $('.errorrepassword').html(response.error.repassword);
                            } else {
                                $('#repassword').removeClass('is-invalid');
                                $('.errorrepassword').html('');
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
    </script>