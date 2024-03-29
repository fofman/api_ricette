<?php

namespace App\Models;

use \CodeIgniter\Model;

class RicetteIngredienti extends Model
{
    protected $table = 'ricette_ingredienti';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_ricetta', 'id_ingrediente'];
}