<?php

namespace App\Controllers;
class Portate extends BaseController
{
    public function get($id)
    {
        $cottura = $this->modelPortate->getPortata("id=" . $id);
        if (sizeof($cottura) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($cottura);
    }

    public function getPaeseOf($id)
    {
        $cottura = $this->modelPortate->getPaeseOf($id);
        if (sizeof($cottura) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($cottura);
    }

    public function getAll()
    {
        $cottura = $this->modelPortate->getPortata("1=1");
        if (sizeof($cottura) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($cottura);
    }

    public function post()
    {
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $idPaese = $this->modelPortate->addPortata($jsonData);
        //gestione della transazione
        if ($idPaese == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        else {
            return $this->response->setJSON(["id" => $idPaese]);
        }
    }

    public function patch(){
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $ris = $this->modelPortate->updatePortata($jsonData->id, $jsonData->data);
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