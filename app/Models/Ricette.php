<?php

namespace App\Models;

use \CodeIgniter\Model;

class Ricette extends Model
{
    protected $table = 'ricette';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['titolo', 'tempo_preparazione', 'porzioni', 'testo', 'livello', 'data_aggiunta'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'data_aggiunta';
    protected $updatedField  = 'data_aggiunta';

    public function getRicetta($where, $select = ['*']): array
    {
        $this->select($select);
        $this->where($where);
        return $this->findAll();
    }

    public function addRicetta($data)
    { // data deve essere un array associativo composto da tutti i campi necessari

        $this->transStart();
        $id=$this->insert($data);
        $this->transComplete();
        //controllo della transazione
        if ($this->transStatus() === false) {
            $this->transRollback();
            return false;
        } else {
            $this->transCommit();
            return $id;
        }
    }

    public function updateRicetta($id, $data): bool
    { //id ricetta e data con array associativo dei valori che si vogliono cambiare
        $this->transStart();
        $this->update($id, $data);
        $this->transComplete();
        //controllo della transazione
        if ($this->transStatus() === false) {
            $this->transRollback();
            return false;
        } else {
            $this->transCommit();
            return true;
        }
    }

    public function deleteRicetta($id): bool
    {
        $this->transStart();
        $this->delete($id);
        $this->transComplete();
        //controllo della transazione
        if ($this->transStatus() === false) {
            $this->transRollback();
            return false;
        } else {
            $this->transCommit();
            return true;
        }
    }
}
