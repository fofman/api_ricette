<?php

namespace App\Controllers;
class Immagini extends BaseController
{
    public function get($id)
    {
        $cottura = $this->modelImmagini->getImmagine("id=" . $id);
        if (sizeof($cottura) == 0) return $this->response->setStatusCode(404)->setJSON(["errore" => "Risorsa non trovata"]);
        return $this->response->setJson($cottura);
    }

    public function post()
    {
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $idImmagine = $this->modelImmagini->addImmagine($jsonData);
        //gestione della transazione
        if ($idImmagine == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        else {
            return $this->response->setJSON(["id" => $idImmagine]);
        }
    }

    public function patch(){
        $rawInput = $this->request->getBody();
        $jsonData = json_decode($rawInput);
        //operazioni su db
        $ris = $this->modelImmagini->updateImmagine($jsonData->id, $jsonData->data);
        //gestione della transazione
        if ($ris == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        return $this->response->setJSON(true);
    }

    public function delete($id){
        //operazioni su db
        $ris = $this->modelImmagini->delete($id);
        //gestione della transazione
        if ($ris == false) return $this->response->setStatusCode(422)->setJSON(["errore" => "Errore nella compilazione"]);
        return $this->response->setJSON(true);
    }
}

