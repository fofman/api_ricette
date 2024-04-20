<?php

namespace App\Controllers;
class Paesi extends BaseController
{
    public function get($id)
    {
        $cottura = $this->modelPaesi->getPaese("id=" . $id);
        if (sizeof($cottura) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($cottura);
    }

    public function getPaesiOf($id)
    {
        $cottura = $this->modelPaesi->getPaesiOf($id);
        if (sizeof($cottura) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($cottura);
    }

    public function getAll()
    {
        $cottura = $this->modelPaesi->getPaese("1=1");
        if (sizeof($cottura) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($cottura);
    }

    public function post()
    {
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $idPaese = $this->modelPaesi->addPaese($jsonData);
        //gestione della transazione
        if ($idPaese == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        else {
            return $this->response->setJSON(["id" => $idPaese]);
        }
    }

    public function patch($id){
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $ris = $this->modelPaesi->updatePaese($id, $jsonData);
        //gestione della transazione
        if ($ris == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        return $this->response->setJSON(true);
    }

    public function delete($id){
        //operazioni su db
        $ris = $this->modelPaesi->deletePaese($id);
        //gestione della transazione
        if ($ris == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        return $this->response->setJSON(true);
    }
}