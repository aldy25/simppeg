<!-- Modal -->
<div class="modal fade" id="modaldetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Lowongan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Back/Lowongan/simpandata', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">



                <div class="form-group row">
                    <label style=" color:black;" class="col-sm-2 col-form-label">Nama Lowongan</label>
                    <div class="col-sm-8">
                        <input disabled style="color:black;" type="text"  value="<?=$nama_lowongan?>" class="form-control">
            
                    </div>
                </div>
                
                <div class="form-group row">
                    <label style=" color:black;"  class="col-sm-2 col-form-label">Status Lowongan</label>
                    <div class="col-sm-8">
                    <input disabled style="color:black;" type="text" value="<?=$status_lowongan?>"  class="form-control">
                       
                    
                    </div>
                </div>


                <div class="form-group row">
                    <label style=" color:black;" for="kriterialowongan" class="col-sm-2 col-form-label">Kriteria Lowongan</label>
                    <div class="col-sm-8">
                        <textarea disabled style="color:black;" class="form-control">
<?=$kriteria?>
                        </textarea>
                       
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="pendidikan" class="col-sm-2 col-form-label">Pendidikan Minimal</label>
                    <div class="col-sm-8">
                    <input disabled style="color:black;" type="text"  value="<?=$pendidikan?>" class="form-control">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label style=" color:black;" for="umur" class="col-sm-2 col-form-label">Umur Maksimal</label>
                    <div class="col-sm-8">
                        <input disabled style="color:black;" type="number" value="<?=$umur?>" class="form-control">
                        
                    </div>
                </div>
                
                    
                <div class="form-group row">
                    <label style=" color:black;" for="jenkel" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                    <input disabled style="color:black;" type="text"  value="<?=$jenkel?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="deskripsi_lowongan" class="col-sm-2 col-form-label">Deskripsi Lowongan</label>
                    <div class="col-sm-8">
                        <textarea disabled style="color:black;" class="form-control">
<?=$deskripsi_lowongan?>
                        </textarea>
                       
                     
                    </div>
                </div>
                <div class="form-group row">
                    <label style=" color:black;" for="gaji" class="col-sm-2 col-form-label">Gaji</label>
                    <div class="col-sm-8">
                        <input disabled style="color:black;" type="text" value="<?=$gaji?>" class="form-control">
                   
                    </div>
                </div>

                <div class="form-group row">
                    <label style=" color:black;" for="keterangan" class="col-sm-2 col-form-label">Keahlian Khusus </label>

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
                                $query_ceksyarat = $this->db->query("SELECT * from tbl_syarat_keahlian  WHERE lowongan='$id_lowongan'");
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
                <?= form_close() ?>
            </div>

        </div>
    </div>
