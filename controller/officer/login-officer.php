<?php 
   if(!isset($_SESSION)){
    session_start();
   }
   
    require_once '../../Global.php';
    
    //verdadeira
    //     $officer = new Officer();
    //     $loginDao = new LoginOfficerDao();
    //     $officerDao = new OfficerDao();
        
    //     $officer->setCpf($_POST['txtCpf']);
    //     $officer->setPassword($_POST['txtPassword']);

        
    //     $idOfficer = $loginDao::verifyOfficer($officer);

    //     if(!empty($idOfficer)){
    //         $id = ($idOfficer[0]['idOfficer']);

    //         $officerObject = $officerDao::getAllData($id);

    //         // print_r($officerObject);
    //         // echo($id); 
            
    //         session_start();
    //         $_SESSION['id-officer'] = $officerObject->getId();

    //         echo('<script>
    //                 alert("Login executado com sucesso!");
    //                 window.location = "../views/index-officer.php";
    //               </script>'
    //         );

    //     }else{
    //     echo('
    //         <script>
    //             alert("Cpf ou Senha incorreta!");
    //             window.location = "../login-officer.php";
    //         </script>
    //     ');
    //    }


    //temporária
    if(($_POST['txtCpf'] == '111.222.333-96') && ($_POST['txtPassword'] == '123')){
        $_SESSION['cpf-officer'] = $_POST['txtPassword'];
        $_SESSION['password-officer'] = $_POST['txtCpf'];
        echo('<script>
                alert("Login executado com sucesso!");
                window.location = "../../view/officer/index-officer.php";
            </script>'
        );
    }else{
        echo('<script>
            alert("Login incorreto!");
            window.location = "../../login-officer.php";
        </script>'
);
    }
    

?>