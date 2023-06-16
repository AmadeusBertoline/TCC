<?php

require_once '../../Global.php';


    $missed = new Missed();


    $missed->setName($_POST['input-search']);

    try{
        MissedDao::searchMissed($missed);

        echo 'foi';
    }catch(Exception $e){
        echo '<pre>';
        echo $e;
        echo '</pre>';
        echo $e->getMessage();
    }




?>