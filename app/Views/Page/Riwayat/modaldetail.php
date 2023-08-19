<!-- Modal -->
<div class="modal fade" id="modaldetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pesan Dari HRD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Back/Lowongan/simpandata', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">






                <div class="form-group row">
                    <label style=" color:black;" for="kriterialowongan" class="col-sm-2 col-form-label">Pesan</label>
                    <div class="col-sm-8">
                        <textarea disabled style="color:black;" class="form-control">
<?= $pesan ?>
                        </textarea>


                    </div>
                </div>




                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                </div>
                <?= form_close() ?>
            </div>

        </div>
    </div>