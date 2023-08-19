<?= form_open('Back/Pages/Admin/hapusbanyak', ['class' => 'formhapusbanyak']) ?>
<p>


</p>
<div class="table-responsive">
    <table class="table table-sm table-striped" id="dataAkun">
        <thead>
            <tr>
                <th>No</th>
                <th>Posisi Lamaran</th>
                <th>Status Lamaran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<?= form_close(); ?>
<script>
    function listdataadmin() {
        var table = $('#dataAkun').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= site_url('Back/Seleksi/listdata') ?>",
                "type": "POST"
            },
            //OPTIONAL
            "columDefs": [{
                "targets": 0,
                "orderable": false,
            }],
        })
    }
    $(document).ready(function() {
        listdataadmin();
    });


    function Status(id_lamaran) {
        $.ajax({
            type: "post",
            url: "<?= site_url('Back/Seleksi/formstatus') ?>",
            data: {
                id_lamaran: id_lamaran
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalstatus').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function detail(id_lamaran) {
        $.ajax({
            type: "post",
            url: "<?= site_url('Back/Seleksi/formdetail') ?>",
            data: {
                id_lamaran: id_lamaran
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaldetail').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>