<?php

namespace App\Models;

use \CodeIgniter\Model;

class Categorie extends Model
{
    protected $table = 'categorie';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nome'];

    public function getCategoria($where, $select = ['*']): array
    {
        $this->select($select);
        $this->where($where);
        return $this->findAll();
    }

    public function getCategorieOf($id)
    {
        $this->select('categorie.*');
        $this->join('ricette_categorie', 'categorie.id = ricette_categorie.id_categoria');
        $this->join('ricette', 'ricette_categorie.id_categoria = ricette.id');
        $this->where('ricette.id', $id);
        return $this->findAll();
    }

    public function addCategoria($data)
    {
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

    public function updateCategoria($id, $data): bool
    {
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

    public function deleteCategoria($id): bool
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
