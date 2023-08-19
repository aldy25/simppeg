<?= $this->extend('Auth/Main') ?>
<?= $this->section('Konten') ?>
<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">

    <div class="card">
        <div class="card-body">

            <h6 style="padding-left: 20%; padding-right:20%; font-family: 'Montserrat';line-height: 20px; font-weight: 600;color:#2148C0;"
                class="text-center mt-3 m-b-15">
                SISTEM INFORMASI PENERIMAAN PEGAWAI BARU
            </h6>
            <!-- 
            <h3 class="text-center mt-0 m-b-15">
                <img class="logo logo-admin" src="<?= base_url() ?>/assets/images/logo.png" height="120" alt="logo">

            </h3> -->


            <div class="p-3">
                <?= form_open('Back/Auth/Post_Regis', ['class' => 'formlogin']) ?>
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <div class="col-12">
                        <input style="background-color:#DBE8F4; border:1px solid #2148C0;" class="form-control "
                            type="text" placeholder="Nama" name="nama" id="nama">
                        <div class="invalid-feedback errornama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">

                        <select style="background-color:#DBE8F4; border:1px solid #2148C0;" name="jenkel"
                            class="form-control">
                            <option value="">Pilih</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback errorjenkel">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input style="background-color:#DBE8F4; border:1px solid #2148C0;" class="form-control "
                            type="text" placeholder="Username" name="username" id="username">
                        <div class="invalid-feedback errorusername">

                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <input style="background-color:#DBE8F4; border:1px solid #2148C0;" class="form-control"
                            type="password" placeholder="Password" name="password" id="password">
                        <div class="invalid-feedback errorpassword">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input style="background-color:#DBE8F4; border:1px solid #2148C0;" class="form-control"
                            type="password" placeholder="Ulangi Password" name="password2" id="password2">
                        <div class="invalid-feedback errorpassword2">

                        </div>
                    </div>
                </div>
                <div class="form-group text-center row m-t-20">
                    <div class="col-12">
                        <button
                            style="background-color:blue; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.3);  color: #ffff; font-weight: 600; border:1px solid #2148C0;"
                            class="btn btn-primary btn-block waves-effect waves-light btnlogin"
                            type="submit">REGIS</button>
                    </div>
                </div>
                <div class="form-group m-t-10 mb-0 row">
                    <!-- <div class="col-sm-7 m-t-20">
                        <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> <small>Forgot
                                your password ?</small></a>
                    </div> -->
                    <div class="col-sm-5 m-t-20">
                        <a href="<?= base_url() ?>/Login" class="text-muted"><i class="mdi mdi-account-circle"></i>
                            <small>LOGIN</small></a>
                    </div>
                </div>
                <?= form_close() ?>
            </div>

        </div>
    </div>
</div>
<!-- App js -->
<script>
$(document).ready(function() {
    $(".formlogin").submit(function(e) {
        e.preventDefault();
        let form = $('.formlogin')[0];
        let data = new FormData(form);
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),

            dataType: "json",
            beforeSend: function() {
                $('.btnslogin').attr('disable', 'disabled');
                $('.btnlogin').html(
                    '  <p> <i class="fa fa-spin fa-spinner"></i> Loading...</p>');
            },
            complete: function() {
                $('.btnlogin').removeAttr('disable', );
                $('.btnlogin').html('REGIS');
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
                    if (response.error.jenkel) {
                        $('#jenkel').addClass('is-invalid');
                        $('.errorjenkel').html(response.error.jenkel);
                    } else {
                        $('#jenkel').removeClass('is-invalid');
                        $('.errorjenkel').html('');
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
                    if (response.error.password2) {
                        $('#password2').addClass('is-invalid');
                        $('.errorpassword2').html(response.error.password2);
                    } else {
                        $('#password2').removeClass('is-invalid');
                        $('.errorpassword2').html('');
                    }


                }
                if (response.sukses) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.sukses

                    })
                    window.location.href = '<?= base_url() ?>/Login';
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
<?= $this->endsection() ?>