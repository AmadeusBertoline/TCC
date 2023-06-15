<?php
    require_once '../../Global.php';

    session_start();
    $_SESSION['form_values'] = $_POST;

    $txtName = $_POST['txtName'];
    $txtCpf = $_POST['txtCpf'];
    $txtPhone = $_POST['txtPhone'];
    $txtCep = $_POST['txtCep'];
    $txtStreet  = $_POST['txtStreet'];
    $txtNeighborhood = $_POST['txtNeighborhood'];
    $txtNumberStreet  = $_POST['txtNumberStreet'];
    $txtComplement  = $_POST['txtComplement'];
    $txtCity  = $_POST['txtCity'];
    $txtState  = $_POST['txtState'];
    $txtEmail  = $_POST['txtEmail'];
    $txtPassword  = $_POST['txtPassword'];
    $txtConfirmPassword = $_POST['txtConfirmPassword'];

    $txtId = $_POST['idCompanion'];

    if( (!empty($txtName)) && (!empty($txtCpf) ) &&
        (!empty($txtPhone)) && (!empty($txtCep) ) &&
        (!empty($txtStreet)) && (!empty($txtNeighborhood) ) &&
        (!empty($txtNumberStreet)) && (!empty($txtCity)) && 
        (!empty($txtState) ) && (!empty($txtEmail)) && 
        (!empty($txtPassword) ) && (!empty($txtConfirmPassword))
      ){ 
        $cpf = str_replace("-","",$txtCpf);
        $cpfArray= str_replace(".","",$cpf);

        if(($txtPassword ==  $txtConfirmPassword)){
            if(checkCpf($cpfArray)==true){
                $companion = new Companion();

                $companion->setName($txtName);
                $companion->setCpf($txtCpf);
                $companion->setPhone($txtPhone);
                $companion->setCep($txtCep);
                $companion->setStreet($txtStreet);
                $companion->setNeighborhood($txtNeighborhood);
                $companion->setNumberStreet($txtNumberStreet);
                $companion->setComplement($txtComplement);
                $companion->setCity($txtCity);
                $companion->setState($txtState);
                $companion->setEmail($txtEmail);
                $companion->setPassword($txtPassword);
                $companion->setId($txtId);

                CompanionDao::update($companion);
            }else{
                echo('
                <script>
                    alert("Coloque um CPF válido!");
                    window.location = "../../view/officer/search-companion.php";
                </script>
                ');
            }
        }else{
            echo('
            <script>
                alert("As senhas não combinam!");
                window.location = "../../view/officer/search-companion.php";
            </script>
            ');
        }
    }else{
        echo('
            <script>
                alert("Preencha todos os campos!");
                window.location = "../../view/officer/search-companion.php";
            </script>
        ');
    }

    function checkCpf($cpfArray){
        //        --------verificação digito 1--------
       $j = 10;
       $soma1 = 0;
       for($i = 0;$i<9;$i++){
           $soma1 = $soma1 + ($cpfArray[$i]*$j);
           $j--;
       }

       $digito1 = 0;
       $res1 = $soma1 % 11;
       if($res1 < 2){
           $digito1 = 0;
       }else{
           $digito1 = 11-$res1;
       }

       //reset 
       $j = 11;
       $i = 0;

       //        --------verificação digito 2--------
       $soma2 = 0;
       for($i = 0;$i<9;$i++){
           $soma2 = $soma2 + ($cpfArray[$i]*$j);
           $j--;
       }
       $soma2 = $soma2 +(2*$digito1);
       $res2 = $soma2 % 11;
       $digito2 = 0;
       if($res2 <2){
           $digito2 = 0;
       }else{
           $digito2 = 11 - $res2;
       }
       
       if(($digito1 == $cpfArray[9]) && ($digito2 == $cpfArray[10])){
           return true;
       }else{
           return false;
       }
   }
    
?>