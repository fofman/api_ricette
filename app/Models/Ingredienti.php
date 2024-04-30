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

    public function getIngredienti($where = false, $select = ['*'], $order = false, $limit = 0): array
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

    public function getIngredientiOf($id)
    {
        $this->select('ingredienti.*');
        $this->join('ricette_ingredienti', 'ingredienti.id = ricette_ingredienti.id_ingrediente');
        $this->join('ricette', 'ricette_ingredienti.id_ricetta = ricette.id');
        $this->where('ricette.id', $id);
        return $this->findAll();
    }

    public function addIngrediente($data)
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
