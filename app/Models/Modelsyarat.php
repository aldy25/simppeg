<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelsyarat extends model
{
    protected $table = 'tbl_syarat_keahlian';
    protected $primaryKey = 'id_syarat';
    protected $allowedFields = ['', 'lowongan','keahlian'];
}
