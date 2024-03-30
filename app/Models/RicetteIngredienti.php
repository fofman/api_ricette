<?php

namespace App\Models;

use \CodeIgniter\Model;

class RicetteIngredienti extends Model
{
    protected $table = 'ricette_ingredienti';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_ricetta', 'id_ingrediente'];

    public function getRicettaIngrediente($where, $select = ['*']): array
    {
        $this->select($select);
        $this->where($where);
        return $this->findAll();
    }

    public function addRicettaIngrediente($data): bool
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

    public function updateRicettaIngrediente($id, $data): bool
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

    public function deleteRicettaIngrediente($id): bool
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