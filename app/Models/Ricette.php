<?php

namespace App\Models;

use \CodeIgniter\Model;

class Ricette extends Model
{
  protected $table = 'ricette';
  protected $primaryKey = 'id';
  protected $returnType = 'object';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['titolo', 'tempo_preparazione', 'porzioni', 'testo', 'livello', "data_aggiunta"];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'data_aggiunta';
}
