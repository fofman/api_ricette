<?php

namespace App\Models;

use \CodeIgniter\Model;

class Categorie extends baseModel
{
    protected $table = 'categorie';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nome'];

    public function getCategoria($where, $select = ['*']): array
    {
        return baseModel::getData($where, $select);
    }
    public function addCategoria($data)
    {
        return baseModel::addData($data);
    }

    public function updateCategoria($id, $data): bool
    {
        return baseModel::updateData($id,$data);
    }

    public function deleteCategoria($id): bool
    {
        return baseModel::deleteData($id);
    }
}
