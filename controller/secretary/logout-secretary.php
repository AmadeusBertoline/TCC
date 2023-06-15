<?php 
    header("Location: ../../login-secretary.php");

    session_start();
    // verdadeiro
    unset($_SESSION['id-secretary']);

    //temporário
    // unset($_SESSION['$username-secretary']);
    // unset($_SESSION['password-secretary']);

    session_destroy();
?>