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
    protected $allowedFields = ['nome', 'descrizione','quantitativo'];

    public function getIngredienti($where, $select = ['*']): array
    {
        $this->select($select);
        $this->where($where);
        return $this->findAll();
    }

    public function getIngredientiOf($id)
    {
        $this->select('ingredienti.*,ricette_ingredienti.quantitativo');
        $this->join('ricette_ingredienti', 'ingredienti.id = ricette_ingredienti.id_ingrediente');
        $this->join('ricette', 'ricette_ingredienti.id_ricetta = ricette.id');
        $this->where('ricette.id', $id);
        return $this->findAll();
    }

    public function addIngrediente($data): bool
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

    public function updateIngrediente($id, $data): bool
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

    public function deleteIngrediente($id): bool
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
