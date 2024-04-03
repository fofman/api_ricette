<?php

namespace App\Controllers;
class Categorie extends BaseController
{
    public function get($id)
    {
        $categoria = $this->modelCategorie->getCategoria("id=" . $id);
        if (sizeof($categoria) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($categoria);
    }

    public function post()
    {
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $idCategoria = $this->modelCategorie->addCategoria($jsonData);
        //gestione della transazione
        if ($idCategoria == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        else {
            return $this->response->setJSON(["id" => $idCategoria]);
        }
    }

    public function patch(){
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $ris = $this->modelCategorie->updateCategoria($jsonData->id, $jsonData->data);
        //gestione della transazione
        if ($ris == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        return $this->response->setJSON(true);
    }
}