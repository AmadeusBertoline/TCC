<?php
    session_start();

    //exemplo, o certo é ID
    if((!empty($_SESSION['cpf-officer']))){
        header("Location: ./view/officer/index-officer.php");
    }

?>