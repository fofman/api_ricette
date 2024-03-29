<?php

namespace App\Models;

use \CodeIgniter\Model;

class Paesi extends Model
{
  protected $table = 'paesi';
  protected $primaryKey = 'id';
  protected $returnType = 'object';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['nome'];
}
