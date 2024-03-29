<?php

namespace App\Models;

use \CodeIgniter\Model;

class RicetteCotture extends Model
{
    protected $table = 'ricette_cotture';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_ricetta', 'id_cottura'];
}