<?php

namespace App\Models;

use \CodeIgniter\Model;

class RicetteCategorie extends Model
{
    protected $table = 'ricette_categorie';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_ricetta', 'id_categoria'];
}