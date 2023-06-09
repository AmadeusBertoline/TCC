<?php
    session_start();

    if((empty($_SESSION['cpf-officer']))){
        header("Location: ../login-officer.php");
    }

    // verdadeira
    // if((empty($_SESSION['id-officer']))){
    //     header("Location: ../index.php");
    // }

?>