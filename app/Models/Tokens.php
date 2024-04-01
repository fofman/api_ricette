<?php

namespace App\Models;

use \CodeIgniter\Model;

class Tokens extends Model
{
    protected $table = 'tokens';
    protected $primaryKey = 'token';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['email'];

    public function getToken($where, $select = ['*']): array
    {
        $this->select($select);
        $this->where($where);
        return $this->findAll();
    }

    public function addToken($email)
    { // data deve essere un array associativo composto da tutti i campi necessari
        $this->transStart();
        $token=$this->query("SELECT CONCAT(LEFT(MD5(RAND()), 63),LEFT(MD5(RAND()), 63),LEFT(MD5(RAND()), 63),LEFT(MD5(RAND()), 63),LEFT(MD5(RAND()), 3)) AS token");
        $data=[
            'email'=>$email,
            'token'=>$token
        ];
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

    public function updateToken($token, $data): bool
    { //id ricetta e data con array associativo dei valori che si vogliono cambiare
        $this->transStart();
        $this->update($token, $data);
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

    public function deleteToken($token): bool
    {
        $this->transStart();
        $this->delete($token);
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