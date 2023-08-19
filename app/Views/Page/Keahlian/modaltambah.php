<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Keahlian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Back/Akun/simpandata', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">



                <div class="form-group row">
                    <label style=" color:black;" for="keahlian" class="col-sm-2 col-form-label">Jenis Keahlian</label>
                    <div class="col-sm-8">
                        <input style="color:black;" type="text" name="keahlian" id="keahlian" class="form-control">
                        <div class="invalid-feedback errorkeahlian">
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
                    url: "<?= site_url('Back/Keahlian/simpandata') ?>",
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
    </script>