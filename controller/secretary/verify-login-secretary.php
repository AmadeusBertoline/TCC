<?php
    session_start();

    if((empty($_SESSION['username-secretary']))){
        header("Location: ../login-secretary.php");
    }

    // verdadeira
    // if((empty($_SESSION['id-officer']))){
    //     header("Location: ../index.php");
    // }

?>