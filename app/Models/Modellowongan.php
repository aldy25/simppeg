<?php

namespace App\Models;

use CodeIgniter\Model;

class Modellowongan extends model
{
    protected $table = 'tbl_lowongan';
    protected $primaryKey = 'id_lowongan';
    protected $allowedFields = ['', 'nama_lowongan','status_lowongan','kriteria','pendidikan','umur','jenkel','deskripsi_lowongan','gaji'];
}
