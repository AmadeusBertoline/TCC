<?php

require_once '../../Global.php';

if (isset($_POST['familiar'])) {
    if (!empty($_POST['cpf']) && !empty($_POST['password'])) {

        $familiar = new Companion();

        $familiar->setCpf($_POST['cpf']);
        $familiar->setPassword($_POST['password']);

        if (!isset($_SESSION)) {
            session_start();
        }

        if (!empty(CompanionDao::verificar($familiar))) {
            $idFamiliar = CompanionDao::verificar($familiar);
            $_SESSION['login-familiar'] = $familiar->getCpf();
            $_SESSION['password-familiar'] = $familiar->getPassword();
            $id = ($idFamiliar[0]['idCompanion']);
            $_SESSION['id-familiar'] = $id;


            header("Location: ../../view/feed/feed-network.php");
        } else {
            echo '<head><script type="text/javascript" src="../../assets/js/user/error-login.js" defer></script>
            <link rel="stylesheet" href="../../assets/css/user/login-usuario.css">
            </head>
                        
                        <!--mensagem de erro-->
                        <div id="fade"></div>
                        <div id="modal">
                            <div class="modal-header">
                                <h2>Login Inválido</h2>
                            </div>
                            <div class="modal-body">
                                <p>Dados incorretos, digite novamente.</p>
                            </div>
                            <a href="../../view/user/index.php"><button id="close-modal">Tentar novamente</button></a>
                        </div>
                    
                        <!--Fim mensagem de erro-->
                            
                            ';
        }
    }
} else {

    if (!empty($_POST['cpf']) && !empty($_POST['password'])) {

        
        $usuario = new Person();

        $usuario->setCpf($_POST['cpf']);
        $usuario->setPassword($_POST['password']);


        if (!isset($_SESSION)) {
            session_start();
        }


        if (!empty(UsuarioDao::verificar($usuario))) {

            $idUser = UsuarioDao::verificar($usuario);
            $_SESSION['login'] = $usuario->getCpf();
            $_SESSION['password'] = $usuario->getPassword();
            $id = ($idUser[0]['codusuariocomum']);
            $_SESSION['id-user'] = $id;

            // echo $_SESSION['id-user'];

            header("Location: ../../view/feed/feed.php");
        } else {

            echo '

    
    <head><script type="text/javascript" src="../../assets/js/user/error-login.js" defer></script>
    <link rel="stylesheet" href="../../assets/css/user/login-usuario.css">
    </head>
                
                <!--mensagem de erro-->
                <div id="fade"></div>
                <div id="modal">
                    <div class="modal-header">
                        <h2>Login Inválido</h2>
                    </div>
                    <div class="modal-body">
                        <p>Dados incorretos, digite novamente.</p>
                    </div>
                    <a href="../../view/user/index.php"><button id="close-modal">Tentar novamente</button></a>
                </div>
            
                <!--Fim mensagem de erro-->
                    
                    ';
        }
    }
}
