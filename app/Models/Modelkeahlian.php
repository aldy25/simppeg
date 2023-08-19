<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkeahlian extends model
{
    protected $table = 'tbl_keahlian';
    protected $primaryKey = 'id_keahlian';
    protected $allowedFields = ['', 'keahlian'];
}
