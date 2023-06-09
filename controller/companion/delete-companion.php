<?php 
    require_once '../../Global.php';

    if(isset($_POST['companionId'])){
        $companionDao = new CompanionDao();

        $companionDao::delete($_POST['companionId']);
    }

?>