<?php

namespace App\Controllers;
class Ingredienti extends BaseController
{
    public function get($id)
    {
        $ingrediente = $this->modelIngredienti->getIngredienti("id=" . $id);
        if (sizeof($ingrediente) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($ingrediente);
    }

    public function getIngredientiOf($id)
    {
        $portate = $this->modelIngredienti->getIngredientiOf($id);
        if (sizeof($portate) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($portate);
    }

    public function getAll()
    {
        $portate = $this->modelIngredienti->getIngredienti();
        return $this->response->setJSON($portate);
    }

    public function post()
    {
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $idIngrediente = $this->modelIngredienti->addPortata($jsonData);
        //gestione della transazione
        if ($idIngrediente == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        else {
            return $this->response->setJSON(["id" => $idIngrediente]);
        }
    }

    public function patch($id){
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $ris = $this->modelIngredienti->updatePortata($id, $jsonData);
        //gestione della transazione
        if ($ris == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        return $this->response->setJSON(true);
    }

    public function delete($id){
        //operazioni su db
        $ris = $this->modelIngredienti->deletePortata($id);
        //gestione della transazione
        if ($ris == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        return $this->response->setJSON(true);
    }
}