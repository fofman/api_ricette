<?php

namespace App\Models;

use \CodeIgniter\Model;

class Ricette extends Model
{
    protected $table = 'ricette';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['titolo', 'tempo_preparazione', 'porzioni', 'testo', 'livello', 'data_aggiunta'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'data_aggiunta';

    public function addRicetta($data) : bool
    { // data deve essere un array associativo composto da tutti i campi necessari
        $this->trans_start();
        $this->insert($data);
        $this->trans_complete();
        //controllo della transazione
        if ($this->trans_status() === false) {
            $this->trans_rollback();
            return false;
        } else {
            $this->trans_commit();
            return true;
        }
    }

    public function updateRicetta($id, $data)
    { //id ricetta e data con array associativo dei valori che si vogliono cambiare
        $this->update($id, $data);
    }

    public function deleteRicetta()
    {

    }
}
