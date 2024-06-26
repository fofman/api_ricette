<?php

namespace App\Controllers;
class Portate extends BaseController
{
    public function get($id)
    {
        $portata = $this->modelPortate->getPortata("id=" . $id);
        if (sizeof($portata) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($portata);
    }

    public function getPortateOf($id)
    {
        $portate = $this->modelPortate->getPortateOf($id);
        if (sizeof($portate) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($portate);
    }

    public function getAll()
    {
        $portate = $this->modelPortate->getPortata();
        return $this->response->setJSON($portate);
    }

    public function post()
    {
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $idPortata = $this->modelPortate->addPortata($jsonData);
        //gestione della transazione
        if ($idPortata == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        else {
            return $this->response->setJSON(["id" => $idPortata]);
        }
    }

    public function patch($id){
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $ris = $this->modelPortate->updatePortata($id, $jsonData);
        //gestione della transazione
        if ($ris == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        return $this->response->setJSON(true);
    }

    public function delete($id){
        //operazioni su db
        $ris = $this->modelPortate->deletePortata($id);
        //gestione della transazione
        if ($ris == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        return $this->response->setJSON(true);
    }
}