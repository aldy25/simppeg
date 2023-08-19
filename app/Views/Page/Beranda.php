<?php
$session = \config\services::session();
$username = $session->get('username');
$level = $session->get('role');
$nama = $session->get('nama');
$this->db = \config\Database::connect();
// $pasien = $this->db->table('tbl_pasien')->countAllResults();
// $obat = $this->db->table('tbl_obat')->countAllResults();
// $transaksi = $this->db->table('tbl_riwayat_transaksi')->countAllResults();
// $pengguna = $this->db->table('tbl_user')->countAllResults();
?>
<?= $this->extend('Base/Main') ?>
<?= $this->extend('Base/Menu') ?>
<?= $this->section('Konten') ?>
<div class="row">
    <!-- Column -->
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div style="text-align: center; font-weight:bold;" class="col-12 align-self-center">
                        JUMLAH PENGGUNA
                    </div>

                </div>

                <div class="d-flex flex-row">
                    <div class="col-6 align-self-center">
                        <div class="round">
                            <i class="mdi mdi-account "></i>
                        </div>
                    </div>
                    <div class="col-6 align-self-center text-center">
                        <div class="m-l-10">
                            <h1 class="mt-0 round-inner">20</h1>
                            <p class="mb-0 text-muted">22-12-2022</p>
                        </div>
                    </div>

                </div>
                <div class="d-flex flex-row">
                    <div style="text-align: center; font-weight:bold;" class="col-12 align-self-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->

    <!-- Column -->
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div style="text-align: center; font-weight:bold;" class="col-12 align-self-center">
                        JUMLAH PELAMAR
                    </div>

                </div>

                <div class="d-flex flex-row">
                    <div class="col-6 align-self-center">
                        <div class="round">
                            <i class="mdi mdi-account-circle"></i>
                        </div>
                    </div>
                    <div class="col-6 align-self-center text-center">
                        <div class="m-l-10">
                            <h1 class="mt-0 round-inner">17</h1>
                            <p class="mb-0 text-muted">22-12-2022</p>
                        </div>
                    </div>

                </div>
                <div class="d-flex flex-row">
                    <div style="text-align: center; font-weight:bold;" class="col-12 align-self-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div style="text-align: center; font-weight:bold;" class="col-12 align-self-center">
                        JUMLAH LOWONGAN
                    </div>

                </div>

                <div class="d-flex flex-row">
                    <div class="col-6 align-self-center">
                        <div class="round">
                            <i class="mdi mdi-plus-box "></i>
                        </div>
                    </div>
                    <div class="col-6 align-self-center text-center">
                        <div class="m-l-10">
                            <h1 class="mt-0 round-inner">5</h1>
                            <p class="mb-0 text-muted">22-12-2022</p>
                        </div>
                    </div>

                </div>
                <div class="d-flex flex-row">
                    <div style="text-align: center; font-weight:bold;" class="col-12 align-self-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <!-- <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div style="text-align: center; font-weight:bold;" class="col-12 align-self-center">
                        JUMLAH TRANSAKSI
                    </div>

                </div>

                <div class="d-flex flex-row">
                    <div class="col-6 align-self-center">
                        <div class="round">
                            <i class="mdi mdi-database "></i>
                        </div>
                    </div>
                    <div class="col-6 align-self-center text-center">
                        <div class="m-l-10">
                            <h1 class="mt-0 round-inner"></h1>
    <p class="mb-0 text-muted">22-12-2022</p>
    </div>
                    </div>

                </div>
                <div class="d-flex flex-row">
                    <div style="text-align: center; font-weight:bold;" class="col-12 align-self-center">
                      
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Column -->

    <!-- </div>
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h2 class="mt-0 header-title">DATA STOK OBAT <span style="color: red;"> KURANG DARI 30</span></h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KODE OBAT</th>
                                <th>NAMA OBAT</th>
                                <th>STOCK OBAT</th>
                                <th>HARGA SATUAN</th>
                                <th>SATUAN</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $this->db = \config\Database::connect();
                            // $query = $this->db->query("SELECT * FROM tbl_obat WHERE jumlah_obat <='30'");
                            // $obat = $query->getResult();
                            // $i = 0;
                            // foreach ($obat as $row) {
                            //     $i++
                            ?>
                            <tr>
                               
                            </tr>
                          


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>-->
</div>
<?= $this->endsection() ?>