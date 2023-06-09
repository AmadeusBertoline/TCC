<?php
    session_start();

    //exemplo, o certo é ID
    if((!empty($_SESSION['username-secretary']))){
        header("Location: ./view/secretary/index-secretary.php");
    }

?>