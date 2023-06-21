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
    <script src="../../assets/js/user/login-secretaria.js" defer></script>
    <script src="../../assets/js/feed/ajustes-edit.js" defer></script>
    <script src="../../assets/js/feed/show-password.js" defer></script>
    <script src="https://kit.fontawesome.com/98872a96e6.js" crossorigin="anonymous"></script>

    <title>Minhas informações</title>
</head>

<body>
    <header>

        <a href="javascript:location.reload()" class="flexbox_brand-system"><!-- tag link, Item do 'flex-container_header' / 'flexbox' do nome e logo do sistema -->

            <div class="img-logo">
                <?php

                if (isset($_SESSION['id-user'])) {
                    echo "<img src= '../../assets/ico/feed/logo.svg' alt='img_logo'><!-- logo -->";
                } else if(isset($_SESSION['id-familiar'])){
                    echo "<img src= '../../assets/ico/feed/logo-family.svg' alt='img_logo'>";
                }
                ?>
                <span>Anjos Perdidos</span><!-- nome -->

            </div>
        </a>

        <div tabindex="0" class="flexbox_container-search">

            <form class="search-form" method="post">
                <button name="search" class="button-busca" type="submit"><svg class="lupa" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <style>
                            .lupa {
                                fill: #38bdf8
                            }
                        </style>
                        <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM184 296c0 13.3 10.7 24 24 24s24-10.7 24-24V232h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H232V120c0-13.3-10.7-24-24-24s-24 10.7-24 24v64H120c-13.3 0-24 10.7-24 24s10.7 24 24 24h64v64z" />
                    </svg></button>
                <input name="input-search" type="search" class="inputSearchClass" id="inputSearchId" placeholder="Buscar no Anjos Perdidos..." />
            </form>

        </div>

        <nav class="nav"><!--Item do 'flex-container_header' / tag semântica '<nav>' -->
            <ul><!-- <ul> - Lista não ordenada, lista dos itens da navbar -->
                <?php

                if (isset($_SESSION['id-user'])) {
                    include '../../assets/components/navBar-user.php';
                } else if (isset($_SESSION['id-familiar'])) {
                    include '../../assets/components/familiar/nav-family-network.php';
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

    if (isset($_SESSION['id-user'])) {

        if(!isset($_SESSION)){
            session_start();
        }


        try {
            $listUser = UsuarioDao::listUpdate();
        } catch (Exception $e) {
            echo '<pre>';
            echo $e;
            echo '</pre>';
            echo $e->getMessage();
        }



        try {
            $listCount = PistaDao::countPista();
        } catch (Exception $e) {
            echo '<pre>';
            echo $e;
            echo '</pre>';
            echo $e->getMessage();
        }
    } else {
        try {
            $listFamiliar = CompanionDao::listUpdateCompanion();
        } catch (Exception $e) {
            echo '<pre>';
            echo $e;
            echo '</pre>';
            echo $e->getMessage();
        }



        try {
            $listCount = PistaDao::countPista();
        } catch (Exception $e) {
            echo '<pre>';
            echo $e;
            echo '</pre>';
            echo $e->getMessage();
        }
    }

    ?>

    <?php if (isset($_SESSION['id-user'])) { ?>
        <div id="container">
            <div class="left-side">
                <div class="congratulations">
                    <?php foreach ($listUser as $hello) { ?>
                        <h1>Olá, <?php echo $hello['nomeUsuarioComum'] ?> </h1>
                    <?php } ?>
                    <?php foreach ($listCount as $count) { ?>
                        <span>Você deu <?php echo $count['COUNT(idPista)'] ?> pistas</span>
                    <?php } ?>
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
                                <input class="email" disabled type="email" id="email" value="<?php echo $list['emailUsuarioComum'] ?>">
                            </div>

                            <div>
                                <label for=""><b>Senha</b></label>
                                <input class="password" disabled type="password" id="password" name="password" value="<?php echo $list['senhaUsuarioComum'] ?>">
                                <!-- <img onclick="eyeClick()" width="20px" src="../../assets/img/user/olho.png" id="eyeSvg" alt=""> -->
                            </div>

                        </div>

                        <button id="open-modal-update-data" class="open-modal-update-data">Editar dados</button>

                    </div>


                    <!--Modal de editar dadoss-->
                    <div id="fadeUpdateData" class="fadeUpdateData"></div>
                    <div id="modalUpdateData" class="modalUpdateData">
                        <div class="modal-header-update-data">
                            <h2>Edite seus dados</h2>
                            <button id="close-modal-update-data" class="close-modal-update-data">x</button>
                        </div>

                        <div class="modal-body-update-data">
                            <form class="edit" action="../../controller/user/update-usuario.php" method="post">
                                <input name="email" maxlength="40" placeholder="Novo email..." type="text" value="<?php echo $list['emailUsuarioComum']
                                                                                                                    ?>">
                                <input name="password" maxlength="40" placeholder="Nova senha..." type="password" id="password-edit" value="<?php echo $list['senhaUsuarioComum']
                                                                                                                                            ?>">
                                <div class="password-div-edit">
                                    <input name="password-edit-confirm" maxlength="40" placeholder="Confirme sua senha..." type="password" id="password-edit-confirm">
                                    <img onclick="eyeClick()" width="20px" src="../../assets/img/user/olho.png" id="eyeSvgEdit" alt="">
                                </div>
                                <button name="codUser" class="submit" type="submit" value="<?php echo $list['codUsuarioComum'] ?>">Salvar</button>
                            </form>
                        </div>

                    </div>
                <?php } ?>

            </div>


        </div>

    <?php }?>

    <!-- listagem só pro familiar -->

    <?php if (isset($_SESSION['id-familiar'])) { ?>
        <div id="container">
            <div class="left-side">
                <div class="congratulations">
                    <?php foreach ($listFamiliar as $helloFamiliar) { ?>
                        <h1>Olá, <?php echo $helloFamiliar['nameCompanion'] ?> </h1>
                    <?php } ?>
                    <?php //foreach ($listCount as $count) { ?>
                        <span>Você deu 0<?php //echo //$count['COUNT(idPista)'] ?> pistas</span>
                    <?php //} ?>
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

                <?php foreach ($listFamiliar as $familiar) { ?>

                    <div class="dados">
                        <h1>Meus Dados</h1>
                        <div class="campos">
                            <div>
                                <label for=""><b>Email</b></label>
                                <input class="email" disabled type="email" id="email" value="<?php echo $familiar['emailCompanion'] ?>">
                            </div>

                            <div>
                                <label for=""><b>Senha</b></label>
                                <input class="password" disabled type="password" id="password" name="password" value="<?php echo $familiar['passwordCompanion'] ?>">
                                <!-- <img onclick="eyeClick()" width="20px" src="../../assets/img/user/olho.png" id="eyeSvg" alt=""> -->
                            </div>

                        </div>

                        <button id="open-modal-update-data" class="open-modal-update-data">Editar dados</button>

                    </div>


                    <!--Modal de editar dadoss-->
                    <div id="fadeUpdateData" class="fadeUpdateData"></div>
                    <div id="modalUpdateData" class="modalUpdateData">
                        <div class="modal-header-update-data">
                            <h2>Edite seus dados</h2>
                            <button id="close-modal-update-data" class="close-modal-update-data">x</button>
                        </div>

                        <div class="modal-body-update-data">
                            <form class="edit" action="../../controller/user/update-usuario.php" method="post">
                                <input name="email" maxlength="40" placeholder="Novo email..." type="text" value="<?php echo $familiar['emailCompanion']
                                                                                                                    ?>">
                                <input name="password" maxlength="40" placeholder="Nova senha..." type="password" id="password-edit" value="<?php echo $familiar['passwordCompanion']
                                                                                                                                            ?>">
                                <div class="password-div-edit">
                                    <input name="password-edit-confirm" maxlength="40" placeholder="Confirme sua senha..." type="password" id="password-edit-confirm">
                                    <img onclick="eyeClick()" width="20px" src="../../assets/img/user/olho.png" id="eyeSvgEdit" alt="">
                                </div>
                                <button name="codUser" class="submit" type="submit" value="<?php echo $familiar['idCompanion'] ?>">Salvar</button>
                            </form>
                        </div>

                    </div>
                <?php } ?>

            </div>


        </div>
    <?php } ?>

</body>

</html>