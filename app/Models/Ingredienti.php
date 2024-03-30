<?php

namespace App\Models;

use \CodeIgniter\Model;

class Ingredienti extends Model
{
    protected $table = 'ingredienti';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nome', 'descrizione'];

    public function getIngrediente($where, $select = ['*']): array
    {
        $this->select($select);
        $this->where($where);
        return $this->findAll();
    }

    public function addIngrediente($data): bool
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

    public function updateIngrediente($id, $data): bool
    { //id ricetta e data con array associativo dei valori che si vogliono cambiare
        $this->trans_start();
        $this->update($id, $data);
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

    public function deleteIngrediente($id): bool
    {
        $this->trans_start();
        $this->delete($id);
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
}
