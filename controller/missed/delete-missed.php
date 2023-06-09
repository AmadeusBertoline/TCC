<?php 
    require_once '../../Global.php';

    if(isset($_POST['missedId'])){
        $missedDao = new MissedDao();

        $missedDao::delete($_POST['missedId']);
    }

?>