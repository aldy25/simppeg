<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelpelamar extends model
{
    protected $table = 'tbl_pelamar';
    protected $primaryKey = 'id_pelamar ';
    protected $allowedFields = [
        '', 'user', 'profile', 'nama_lengkap', 'nama_panggilan',
        'tanggal_lahir', 'no_hp', 'alamat_domisili', 'hobi', 'pendidikan_terakhir', 'nama_sekola',
        'pengalaman_organisasi', 'pengalaman_kerja', 'ijazah_terakhir', 'cv', 'portofolio', 'sertifikat'
    ];
}
