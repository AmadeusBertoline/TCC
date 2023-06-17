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
                <input name="input-search" type="search" class="inputSearchClass" id="inputSearchId" placeholder="Buscar no Anjos Perdidos..." /><!-- 'input' barra de pesquisa -->
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
        <?php foreach ($listUser as $list) { ?>
            <div class="dados">
                <h1>Meus Dados</h1>
                <p>
                    <label for=""><b>Email</b></label>
                    <input class="email" disabled type="email" name="email" id="email" value="<?php echo $list['emailUsuarioComum'] ?>">
                </p>
                <p>
                    <label for=""><b>Senha</b></label>
                    <input class="password" disabled type="password" name="password" id="password" value="<?php echo $list['senhaUsuarioComum'] ?>">
                </p>

                <button id="open-modal-edit" class="">Editar dados</button>

            </div>
        <?php } ?>
        <!-- Modal de editar -->
        <!-- <div class="configs">
            <form action="" method="post">
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