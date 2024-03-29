<?php

namespace App\Models;

use \CodeIgniter\Model;

class Ingredienti extends Model
{
    protected $table = 'ingredienti';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nome', 'descrizione'];
}
