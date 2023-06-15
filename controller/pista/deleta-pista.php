<?php

require_once '../../Global.php';

if (isset($_POST['delete-pista'])) {

    $pista = new Pista();

    $pista->setIdPista($_POST['delete-pista']);


    try {
        PistaDao::deletePista($pista);
    } catch (Exception $e) {
        echo '<pre>';
        echo $e;
        echo '</pre>';
        echo $e->getMessage();
    }
    


    

    

}
