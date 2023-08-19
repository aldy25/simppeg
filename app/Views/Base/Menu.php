<?= $this->extend('Base/Main') ?>
<?= $this->section('Menu') ?>
<?php
$session = \config\services::session();
$this->db = \config\Database::connect();
$level = $session->get('role');
$id_user = $session->get('id_user');
$query_cekuser = $this->db->query("SELECT * from tbl_user  WHERE id_user='$id_user'");
$row = $query_cekuser->getRow();

if ($level == 'Admin') {
?>
<li>
    <a href="<?= base_url() ?>/Beranda" class="waves-effect">
        <i class="mdi mdi-airplay"></i>
        <span> BERANDA <span class="badge badge-pill badge-primary float-right"></span></span>
    </a>
</li>


<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account"></i> <span> AKUN </span>
        <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li>
            <a href="<?= base_url() ?>/View-akun">
                <i class="mdi mdi-checkbox-blank-circle-outline"></i> DATA AKUN
            </a>
        </li>
    </ul>

</li>
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-worker"></i> <span> LOWONGAN </span>
        <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">

        <li>
            <a href="<?= base_url() ?>/View-lowongan">
                <i class="mdi mdi-checkbox-blank-circle-outline"></i> DATA LOWONGAN
            </a>
        </li>
    </ul>

</li>
</li>
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-card-details"></i> <span> PELAMAR
        </span>
        <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li>
            <a href="<?= base_url() ?>/Data-Pelamar">
                <i class="mdi mdi-checkbox-blank-circle-outline"></i> DATA PELAMAR
            </a>
        </li>
        <li>
            <a href="<?= base_url() ?>/Seleksi">
                <i class="mdi mdi-checkbox-blank-circle-outline"></i> SELEKSI PELAMAR
            </a>
        </li>
        <li>
            <a href="<?= base_url() ?>/Histori">
                <i class="mdi mdi-checkbox-blank-circle-outline"></i> RIWAYAT PELAMAR
            </a>
        </li>
    </ul>

</li>
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-settings-variant"></i> <span> KEAHLIAN
        </span>
        <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li>
            <a href="<?= base_url() ?>/View-keahlian">
                <i class="mdi mdi-checkbox-blank-circle-outline"></i> DATA KEAHLIAN
            </a>
        </li>

    </ul>

</li>
<?php

} else {
?>

<li>
    <a href="<?= base_url() ?>/Beranda" class="waves-effect">
        <i class="mdi mdi-airplay"></i>
        <span> BERANDA <span class="badge badge-pill badge-primary float-right"></span></span>
    </a>
</li>
<li>
    <a href="<?= base_url() ?>/Profile" class="waves-effect">
        <i class="mdi mdi-account"></i>
        <span> PROFILE <span class="badge badge-pill badge-primary float-right"></span></span>
    </a>
</li>
<li>
    <a href="<?= base_url() ?>/Lowongan-buka" class="waves-effect">
        <i class="mdi mdi-worker"></i>
        <span> LOWONGAN <span class="badge badge-pill badge-primary float-right"></span></span>
    </a>
</li>
<li>
    <a href="<?= base_url() ?>/Riwayat-lamaran" class="waves-effect">
        <i class="mdi mdi-history "></i>
        <span> RIWAYAT LAMARAN <span class="badge badge-pill badge-primary float-right"></span></span>
    </a>
</li>

<?php } ?>




<?= $this->endsection() ?>