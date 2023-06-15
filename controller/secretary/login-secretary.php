<?php 
   if(!isset($_SESSION)){
    session_start();
   }
   
    require_once '../../Global.php';
    
    //verdadeira
        $secretary = new Secretary();
        $loginDao = new LoginSecretaryDao();
        $secretaryDao = new SecretaryDao();
        
        $secretary->setUsername($_POST['txtUsername']);
        $secretary->setPassword($_POST['txtPassword']);

        
        if($loginDao->verifySecretary($secretary)){
            $secretaryObject = $loginDao->verifySecretary($secretary);

            $_SESSION['id-secretary'] = $secretaryObject[0]['idSecretary'];
            $_SESSION['name-secretary'] = $secretaryObject[0]['nameSecretary'];
            $_SESSION['logo-secretary'] = $secretaryObject[0]['logoSecretary'];
                    
                echo('<script>
                window.location = "../../view/secretary/index-secretary.php";
                </script>'
            );
        }else{
            echo('
            <script>
                alert("Usuarios ou Senha incorreta!");
                // window.location = "../../login-secretary.php";
            </script>
        ');
        }




    // //temporária
    // if(($_POST['txtUsername'] == 'admin') && ($_POST['txtPassword'] == '123')){
    //     $_SESSION['username-secretary'] = $_POST['txtPassword'];
    //     $_SESSION['password-secretary'] = $_POST['txtUsername'];
    //     echo('<script>
    //             window.location = "../../view/secretary/index-secretary.php";
    //         </script>'
    //     );
    // }else{
    //     echo('<script>
    //         alert("Login incorreto!");
    //         window.location = "../../login-secretary.php";
    //     </script>'
    //     );
    // }
    

?>