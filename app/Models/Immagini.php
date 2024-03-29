<?php

namespace App\Models;

use \CodeIgniter\Model;

class Immagini extends Model
{
    protected $table = 'immagini';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_ricetta', 'percorso'];
}