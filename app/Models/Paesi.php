<?php

namespace App\Models;

use \CodeIgniter\Model;

class Paesi extends Model
{
  protected $table = 'paesi';
  protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
  protected $returnType = 'object';
  protected $useSoftDeletes = false;
  protected $allowedFields = ['nome'];

    public function getPaese($where, $select = ['*']): array
    {
        $this->select($select);
        $this->where($where);
        return $this->findAll();
    }

    public function getPaeseOf($id)
    {
        $this->select('paesi.*');
        $this->join('ricette_paesi', 'paesi.id = ricette_paesi.id_paese');
        $this->join('ricette', 'ricette_paesi.id_ricetta = ricette.id');
        $this->where('ricette.id', $id);
        return $this->find();
    }

    public function addPaese($data): bool
    { // data deve essere un array associativo composto da tutti i campi necessari
        $this->transStart();
        $this->insert($data);
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

    public function updatePaese($id, $data): bool
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

    public function deletePaese($id): bool
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
