<?php

namespace App\Models;

use \CodeIgniter\Model;

class Cotture extends Model
{
    protected $table = 'cotture';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nome'];
}
