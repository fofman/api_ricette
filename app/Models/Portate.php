<?php

namespace App\Models;

use \CodeIgniter\Model;

class Portate extends Model
{
    protected $table = 'portate';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nome'];
}
