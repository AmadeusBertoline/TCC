<?php

class Pista{

    private $idPista;
    private $descricaoPista;
    private $idUsuarioComum;
    private $idMissed;

    public function setIdPista($idPista){
        $this->idPista = $idPista;
    }
    public function getIdPista(){
        return $this->idPista;
    }


    public function setDescricaoPista($descricaoPista){
        $this->descricaoPista = $descricaoPista;
    }
    public function getDescricaoPista(){
        return $this->descricaoPista;
    }


    public function setIdUsuarioComum($idUsuarioComum){
        $this->idUsuarioComum = $idUsuarioComum;
    }
    public function getIdUsuarioComum(){
        return $this->idUsuarioComum;
    }


    public function setIdMissed($idMissed){
        $this->idMissed = $idMissed;
    }
    public function getIdMissed(){
        return $this->idMissed;
    }

}




?>