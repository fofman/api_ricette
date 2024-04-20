<?php

namespace App\Controllers;
class Cotture extends BaseController
{
    public function get($id)
    {
        $cottura = $this->modelCotture->getCottura("id=" . $id);
        if (sizeof($cottura) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($cottura);
    }

    public function getCottureOf($id)
    {
        $cottura = $this->modelCotture->getCottureOf($id);
        if (sizeof($cottura) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($cottura);
    }

    public function getAll()
    {
        $cotture = $this->modelCotture->getCottura();
        return $this->response->setJSON($cotture);
    }
    
    public function post()
    {
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $idCottura = $this->modelCotture->addCottura($jsonData);
        //gestione della transazione
        if ($idCottura == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        else {
            return $this->response->setJSON(["id" => $idCottura]);
        }
    }

    public function patch($id){
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $ris = $this->modelCotture->updateCottura($id, $jsonData);
        //gestione della transazione
        if ($ris == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        return $this->response->setJSON(true);
    }

    public function delete($id){
        //operazioni su db
        $ris = $this->modelCotture->delete($id);
        //gestione della transazione
        if ($ris == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        return $this->response->setJSON(true);
    }
}