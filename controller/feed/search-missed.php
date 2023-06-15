<?php

require_once '../../Global.php';

if(isset($_POST['search'])){

    $missed = new Missed();


    $missed->setName($_POST['input-search']);


    try{
        MissedDao::searchMissed($missed);
    }catch(Exception $e){
        echo '<pre>';
        echo $e;
        echo '</pre>';
        echo $e->getMessage();
    }

}



?>