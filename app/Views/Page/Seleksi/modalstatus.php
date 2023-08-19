<!-- Modal -->
<div class="modal fade" id="modalstatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Proses Lamaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Back/Seleksi/updatestatus', ['class' => 'formedit']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input style="display: none;" type="text" class="form-control" id="id" name="id" value="<?= $id_lamaran ?>">
                <div class="form-group row">
                    <label style=" color:black;" for="level" class="col-sm-2 col-form-label">Status </label>
                    <div class="col-sm-8">
                        <select name="status" id="stat" class="form-control">
                            <option style="color:black;" value="Terkirim" <?php if ($status == 'Terkirim') echo "selected"; ?>>
                                Terkirim</option>
                            <option style="color:black;" value="Diproses" <?php if ($status == 'Diproses') echo "selected"; ?>>Proses</option>
                            <option style="color:black;" value="Ditolak" <?php if ($status == 'Ditolak') echo "selected"; ?>>Ditolak</option>
                            <option style="color:black;" value="Diterima" <?php if ($status == 'Diterima') echo "selected"; ?>>Diterima</option>
                        </select>
                        <div class="invalid-feedback errorstatus">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label style=" color:black;" for="level" class="col-sm-2 col-form-label">Pesan </label>
                    <div class="col-sm-8">
                        <textarea name="pesan" id="pesan" class="form-control"></textarea>
                        <div class="invalid-feedback errorpesan">
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
                            if (response.error.status) {
                                $('#stat').addClass('is-invalid');
                                $('.errorstatus').html(response.error.status);
                            } else {
                                $('#stat').removeClass('is-invalid');
                                $('.errorstatus').html('');
                            }
                            if (response.error.pesan) {
                                $('#pesan').addClass('is-invalid');
                                $('.errorpesan').html(response.error.pesan);
                            } else {
                                $('#pesan').removeClass('is-invalid');
                                $('.errorpesan').html('');
                            }


                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses

                            })
                            $('#modalstatus').modal('hide');
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