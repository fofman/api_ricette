<?php

namespace App\Models;

use \CodeIgniter\Model;

class RicettePortate extends Model
{
    protected $table = 'ricette_portate';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_ricetta', 'id_portata'];
}