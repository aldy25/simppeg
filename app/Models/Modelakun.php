<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelakun extends model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['', 'username', 'password', 'role', 'nama', 'jk', 'foto', 'status'];
}