<?php

namespace App\Controllers;
class Ricette extends BaseController
{
    public function get($id)
    {

        $ricetta = $this->modelRicette->getRicetta("id=" . $id);
        if (sizeof($ricetta) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        //$ricetta[0]->ingredienti = $this->modelIngredienti->getIngredientiOf($id);
        return $this->response->setJson($ricetta);
    }

    public function post()
    {
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $idRicetta = $this->modelRicette->addRicetta($jsonData);
        //gestione della transazione
        if ($idRicetta == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        else {
            return $this->response->setJSON(["id" => $idRicetta]);
        }
    }

    public function put()
    {
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $ris = $this->modelRicette->updateRicetta($jsonData->id, $jsonData->data);
        //gestione della transazione
        if ($ris == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        return true;
    }

    public function delete()
    {
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $ris = $this->modelRicette->delete($jsonData->id);
        //gestione della transazione
        if ($ris == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        return true;
    }
}