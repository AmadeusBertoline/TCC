<?php

require_once '../../Global.php';

if(isset($_POST['edit-pista'])){

    $pista = new Pista();

    $pista->setIdPista($_POST['idPistaEdit']);
    $pista->setDescricaoPista($_POST['comment-edit']);


    try{
        PistaDao::editarPista($pista);
    }catch(Exception $e){
        echo '<pre>';
        echo $e;
        echo '</pre>';
        echo $e->getMessage();
    }


    header("Location: ../../view/feed/feed.php");
}



?>