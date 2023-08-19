<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelskil extends model
{
    protected $table = 'tbl_skil';
    protected $primaryKey = 'id_skil';
    protected $allowedFields = ['', 'user', 'keahlian'];
}
