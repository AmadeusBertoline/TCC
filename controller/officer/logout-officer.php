<?php 
    header("Location: ../../login-officer.php");

    session_start();
    //verdadeiro
    // unset($_SESSION['$id-officer']);

    //temporário
    unset($_SESSION['$cpf-officer']);
    unset($_SESSION['password-officer']);

    session_destroy();
?>