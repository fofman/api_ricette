<?php

namespace App\Models;

use \CodeIgniter\Model;

class Immagini extends Model
{
    protected $table = 'immagini';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_ricetta', 'percorso'];

    public function getImmagine($where = false, $select = ['*'], $order = false, $limit = 0): array
    {
        $this->select($select);
        if ($where != false) {
            $this->where($where);
        }
        if ($order != false) {
            $this->orderBy($order);
        }
        return $this->findAll($limit);
    }

    public function getImmaginiOf($id)
    {
        $this->where('id_ricetta', $id);
        return $this->findAll();
    }

    public function addImmagine($data)
    { // data deve essere un array associativo composto da tutti i campi necessari
        $this->transStart();
        $id = $this->insert($data);
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

    public function updateImmagine($id, $data): bool
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

    public function deleteImmagine($id): bool
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