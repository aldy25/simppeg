<?php

namespace App\Models;

use CodeIgniter\Model;

class Modellamaran extends model
{
    protected $table = 'tbl_lamaran';
    protected $primaryKey = 'id_lamaran';
    protected $allowedFields = ['', 'lowongan', 'pelamar', 'status'];
}
