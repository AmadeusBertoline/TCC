<?php

if(!isset($_SESSION)){
    session_start();
}


unset($_SESSION['id-user']);
// unset($_SESSION['password']);
unset($_SESSION['id-familiar']);


session_destroy();

header("Location: ../index.php")


?>