<?php
    session_start();

    //exemplo, o certo é ID
    if((!empty($_SESSION['id-secretary']))){
        header("Location: ../../login-secretary.php");
    }

?>