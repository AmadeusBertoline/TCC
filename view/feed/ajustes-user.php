<?php
if (!isset($_SESSION)) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/feed/settings-userCommon.style.css">
    <link rel="icon" href="../../assets/ico/feed/browser_logo.png">
    <script src="../../assets/js/feed/feed-home.script.js" defer></script>
    <script src="../../assets/js/feed/home_UserCommon.js" defer></script>
    <script src="../../assets/js/feed/index.script.js" defer></script>
    <script src="../../assets/js/user/login-secretaria.js"></script>
    <script src="https://kit.fontawesome.com/98872a96e6.js" crossorigin="anonymous"></script>

    <title>Minhas informações</title>
</head>

<body>
    <header>

        <a href="javascript:location.reload()" class="flexbox_brand-system"><!-- tag link, Item do 'flex-container_header' / 'flexbox' do nome e logo do sistema -->

            <div class="img-logo">
                <?php

                if (!isset($_SESSION['login']) || isset($_SESSION['password'])) {
                    // Incluí componente sem a sessão
                    //include '../assets/components/access-buttons.php';
                    echo "<img src= '../../assets/ico/feed/logo.svg' alt='img_logo'><!-- logo -->";
                }
                ?>
                <span>Anjos Perdidos</span><!-- nome -->

            </div>
        </a>

        <div tabindex="0" class="flexbox_container-search">

            <form class="search-form" method="post">
                <button name="search" class="button-busca" type="submit"><i class="fa-solid fa-magnifying-glass-plus" style="color: #00b7ea;"></i></button>
                <input name="input-search" type="search" class="inputSearchClass" id="inputSearchId" placeholder="Buscar no Anjos Perdidos..." />
            </form>

        </div>

        <nav class="nav"><!--Item do 'flex-container_header' / tag semântica '<nav>' -->
            <ul><!-- <ul> - Lista não ordenada, lista dos itens da navbar -->
                <?php

                if (isset($_SESSION['login']) || isset($_SESSION['password'])) {
                    // Incluí componente sem a sessão
                    include '../../assets/components/navBar-user.php';
                } else if (isset($_SESSION['login-familiar']) || isset($_SESSION['password-familiar'])) {
                    include '../../assets/components/familiar/nav-family.php';
                }

                ?>
            </ul>
        </nav>
        <div class="burguerBar"><!-- Container BurguerBar-->
            <span></span><!-- linhas-->
            <span></span><!-- Linhas-->
            <span></span><!-- Linhas-->
        </div>

    </header>

    <?php
    require_once '../../Global.php';

    if (isset($_SESSION['login']) || isset($_SESSION['password'])) {
        try {
            $listUser = UsuarioDao::listUpdate();
        } catch (Exception $e) {
            echo '<pre>';
            echo $e;
            echo '</pre>';
            echo $e->getMessage();
        }
    }

    ?>
    <div id="container">
        <div class="left-side">
            <div class="congratulations">
                <h1>Olá, Amadeus Bertoline da Silva</h1>
                <span>Você deu 10 pistas</span>
                <span class="span-agradecimento">Obrigado por ajudar a salvar vidas <svg class="heart" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            .heart {
                                fill: #38bdf8
                            }
                        </style>
                        <path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                    </svg></span>

            </div>
        </div>
        <div class="right-side">
            <?php foreach ($listUser as $list) { ?>
                <div class="dados">
                    <h1>Meus Dados</h1>
                    <div class="campos">
                        <div>
                            <label for=""><b>Email</b></label>
                            <input class="email" disabled type="email" name="email" id="email" value="<?php echo $list['emailUsuarioComum'] ?>">
                        </div>

                        
                        <div class="password-div">
                            <label for=""><b>Senha</b></label>
                            <input class="password" disabled type="password" name="password" id="password" value="<?php echo $list['senhaUsuarioComum'] ?>">
                            <img onclick="eyeClick()" width="20px" src="../../assets/img/user/olho.png" id="eyeSvg" alt="">
                        </div>

                        
                    </div>


                    <button id="open-modal-edit" class="">Editar dados</button>

                </div>
            <?php } ?>
        </div>

        <!-- Modal de editar -->
        <!-- <div class="configs">
            <form class="edit" action="" method="post">
                <h1>Edite seus dados</h1>
                <input maxlength="40" placeholder="Novo email..." type="text">
                <input maxlength="40" placeholder="Nova senha..." type="text">
                <input maxlength="40" placeholder="Confirme sua senha..." type="text">
                <input maxlength="40" class="submit" type="submit" value="Salvar">
            </form>
        </div> -->
        <!-- Fim do modal editar -->
    </div>
</body>

</html>