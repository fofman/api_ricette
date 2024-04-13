<?php

namespace App\Models;

use \CodeIgniter\Model;

class Cotture extends Model
{
    protected $table = 'cotture';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nome'];

    public function getCottura($where, $select = ['*']): array
    {
        $this->select($select);
        $this->where($where);
        return $this->findAll();
    }

    public function getCottureOf($id)
    {
        $this->select('cotture.*');
        $this->join('ricette_cotture', 'cotture.id = ricette_cotture.id_cottura');
        $this->join('ricette', 'ricette_cotture.id_cottura = ricette.id');
        $this->where('ricette.id', $id);
        return $this->findAll();
    }

    public function addCottura($data)
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

    public function updateCottura($id, $data): bool
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

    public function deleteCottura($id): bool
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
