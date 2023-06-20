<?php

require_once '../../Global.php';
require_once '../../dao/pista/PistaDao.php';


if (!empty($_POST['comment'])) {

    //adicionar filtro de palavras ofensivas !!!

    if (!isset($_SESSION)) {
        session_start();
    }

    $idUser = ($_SESSION['id-user']);

    $pista = new Pista();

    $pista->setDescricaoPista($_POST['comment']);
    $pista->setIdMissed($_POST['idMissed']);
    $pista->setIdUsuarioComum($idUser);

    

    try{
        PistaDao::listarPista($pista);
  
    }catch(Exception $e){
        echo '<pre>';
        echo $e;
        echo '</pre>';
        echo $e->getMessage();
    }




    try {
        PistaDao::cadastraPista($pista);
        header("Location: ../../view/feed/feed.php");
    } catch (Exception $e) {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
} else {
}
