<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Caminho, arquivo CSS-->
    <link rel="stylesheet" href="../../assets/css/feed/swiper-bundle.min.css"><!-- Caminho, arquivo CSS do Carrosel-->

    <script src="../../assets/js/feed/feed-home.script.js" defer></script><!-- Caminho, arquivo JS-->
    <script src="../../assets/js/feed/swiper.script.js" defer></script><!-- Caminho, arquivo JS do Carrosel-->
    <script src="../../assets/js/feed/swiper-bundle.min.js" defer></script><!-- Caminho, arquivo JS do Carrosel-->

    <title>ANJOS PERDIDOS | Feed de Divulgações</title><!-- Título-->
    <link rel="icon" href="../../assets/ico/feed/browser_logo.png"><!-- Ícone, navegador-->
    <?php


    if (isset($_SESSION['login-familiar']) && isset($_SESSION['password-familiar'])) {
        //familiar
        echo '<link rel="stylesheet" href="../../assets/css/feed/home-family.style.css">';
        echo '<link rel="stylesheet" href="../../assets/css/feed/home_UserCommon.css">';
    } else if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
        //usuário comum e guest
        echo '<link rel="stylesheet" href="../../assets/css/feed/home_UserCommon.css">';
    } else {
        echo '<link rel="stylesheet" href="../../assets/css/feed/home-UserCommon.style.css">';
    }



    ?>
</head>

<!--Esse é um teste de branch-->

<body>


    <main>
        <header>
            <!-- 'flexbox' dentro da tag '<header>'-->
            <a href="javascript:location.reload()" class="flexbox_brand-system"><!-- tag link, Item do 'flex-container_header' / 'flexbox' do nome e logo do sistema -->

                <div class="img-logo">
                    <?php

                    if (!isset($_SESSION['login']) || isset($_SESSION['password'])) {
                        // Incluí componente sem a sessão
                        //include '../assets/components/access-buttons.php';
                        echo "<img src= '../../assets/ico/feed/logo.svg' alt='img_logo'><!-- logo -->";
                    } else {
                        include '../../assets/components/private/family/family-logo.php';
                    }

                    ?>
                    <span>Anjos Perdidos</span><!-- nome -->

                </div>
            </a>

            <?php
            require_once '../../Global.php';
            try {
                $listMissed = MissedDao::list();
            } catch (Exception $e) {
                echo '<pre>';
                print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            }
            ?>
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
                    <input name="input-search" type="search" class="inputSearchClass" id="inputSearchId" placeholder="Buscar no Anjos Perdidos..." /><!-- 'input' barra de pesquisa -->
                </form>

            </div>
            <script>
                function filterTable() {
                    var input = document.getElementById("search");
                    var filter = input.value.toUpperCase();
                    var posts = document.getElementsByClassName("family-post");

                    // Percorre todos os posts e mostra apenas aqueles que correspondem à pesquisa
                    for (var i = 0; i < posts.length; i++) {
                        var post = posts[i];
                        var nome = post.getAttribute("data-nome");
                        var display = false;

                        if (nome.toUpperCase().indexOf(filter) > -1) {
                            display = true;
                        }

                        post.style.display = display ? "block" : "none";
                    }
                }
            </script>



            <nav class="nav"><!--Item do 'flex-container_header' / tag semântica '<nav>' -->
                <ul><!-- <ul> - Lista não ordenada, lista dos itens da navbar -->
                    <?php

                    if (isset($_SESSION['login']) || isset($_SESSION['password'])) {
                        // Incluí componente sem a sessão
                        include '../../assets/components/navList-home.php';
                    } else if (isset($_SESSION['login-familiar']) || isset($_SESSION['password-familiar'])) {
                        include '../../assets/components/familiar/nav-family.php';
                    } else {

                        include '../../assets/components/access-buttons.php';
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

        <!--início carrossel-->

        <div id="carousel-space">
            <div class="flex-container_main"><!--'grid-container'-->

                <div class="slide-container swiper"><!-- Container, 'box-shadow' carrosel -->

                    <span class="location_item">Crianças<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" style="width: 5px; height: 5px; cursor: pointer; <?php if (!isset($_SESSION['login']) || isset($_SESSION['password'])) {
                                                                                                                                                                            echo 'fill: #00B7EA;';
                                                                                                                                                                        } else {
                                                                                                                                                                            echo 'fill: #2065AA;';
                                                                                                                                                                        } ?> ">
                            <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"></path>
                        </svg>Adolecentes</span>

                    <div class="slide-content"><!-- Container, slides visíveis-->
                        <div class="card-wrapper swiper-wrapper"><!-- Container, todos os slides -->

                            <?php

                            require_once '../../Global.php';

                            try {
                                $listaMenor = MissedDao::listaMenor();
                            } catch (Exception $e) {
                                echo '<pre>';
                                echo $e;
                                echo '</pre>';
                                echo $e->getMessage();
                            }

                            ?>

                            <?php foreach ($listaMenor as $menor) { ?>
                                <div class="card swiper-slide">
                                    <div class="image-content">
                                        <span class="overlay"></span>

                                        <div class="card-image">
                                            <img src="<?php echo $menor['picturePathMissed'] ?>" alt="" class="card-img">
                                        </div>
                                    </div>

                                    <?php
                                    // Supondo que o nome completo do usuário está armazenado na coluna 'nome'
                                    $nomeCompleto = $menor['nameMissed'];

                                    // Separar o nome completo em partes usando o espaço como delimitador
                                    $partesNome = explode(' ', $nomeCompleto);

                                    // Pegar o primeiro nome
                                    $primeiroNome = $partesNome[0];

                                    // Verificar se existe um segundo nome
                                    if (isset($partesNome[1])) {
                                        // Pegar o segundo nome
                                        $segundoNome = $partesNome[1];
                                    } else {
                                        // Definir o segundo nome como vazio se não existir
                                        $segundoNome = '';
                                    }


                                    ?>

                                    <div class="card-content">
                                        <h2 class="name"><?php echo $primeiroNome . ' ' . $segundoNome; ?></h2>
                                        <button class="button"><a href="#">Ver Mais</a></button>
                                    </div>

                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="swiper-button-next swiper-navBtn"></div><!-- 'btn' próximo slide -->
                    <div class="swiper-button-prev swiper-navBtn"></div><!-- 'btn' slide anterior  -->
                    <div class="swiper-pagination"></div><!-- Índice dos slide  -->
                </div>
            </div>
        </div>
        <!--Início do feed-->
        <div id="feed">
            <?php
            require_once '../../Global.php';

            try {
                $missedList = MissedDao::list();
            } catch (Exception $e) {
                echo '<pre>';
                print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            }

            ?>

            <div id="post-container">
                <?php foreach ($missedList as $missed) { ?>


                    <div class="family-post" data-nome="<?php echo $missed['nameMissed'] ?>">

                        <div class="family">
                            <div class="img-nome">
                                <img class="icon-family" src="../../assets/img/feed/family-logo.svg" alt="">
                                <label class="name-family" for=""><?php echo $missed['nameCompanion'] ?></label>
                            </div>

                            <p><?php $date = new DateTime($missed['hourRegister']);
                                echo $date->format('h:i') ?></p>
                        </div>

                        <div class="post">


                            <div class="img-post"><img class="img-desaparecido" src="<?php echo $missed['picturePathMissed']; ?>" alt="imagem do desaparecido" width="100%"></div>

                            <div class="content-post">
                                <h1 class="name-missed"><b>Você viu</b> <?php echo $missed['nameMissed']; ?>?</h1>

                                <p><b>Idade: </b><?php $dateBirth = new DateTime($missed['dateBirthMissed']);
                                                    $interval = $dateBirth->diff(new DateTime(date('Y-m-d')));
                                                    echo $interval->format('%Y anos') ?></p>

                                <p class="date-disappear"><b>Desaparecido em:</b>
                                    <?php $date = new DateTime($missed['dateDisappearance']);
                                    echo $date->format('d/m/Y');
                                    ?></p>
                                <p><b>Por volta das:</b> <?php $data = new DateTime($missed['hourDisappearance']);
                                                            echo $data->format('h:i')  ?></p>

                                <p class="date-disappear"><b>Visto por último em:</b> <?php echo $missed['CityMissed'] ?>, <?php echo $missed['streetMissed'] ?></p>

                                <div class="contact">
                                    <p><b>Contate-me:</b></p>
                                    <p><b><i class="fa-brands fa-whatsapp"></i></b> <?php echo $missed['phoneCompanion'];  ?></p>
                                    <p><i class="fa-solid fa-envelope"></i> <?php echo $missed['emailCompanion']; ?></p>
                                </div>

                            </div>

                        </div>

                        <div class="bottom-post">
                            <div class="pistas">
                                <button name="pista" id="open-modal-comment" class="open-modal-comment"><svg class="lupa" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <style>
                                            .lupa {
                                                fill: #38bdf8
                                            }
                                        </style>
                                        <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM184 296c0 13.3 10.7 24 24 24s24-10.7 24-24V232h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H232V120c0-13.3-10.7-24-24-24s-24 10.7-24 24v64H120c-13.3 0-24 10.7-24 24s10.7 24 24 24h64v64z" />
                                    </svg> Pista</button>
                                <button name="pista" id="open-modal-comment-view" class="open-modal-comment-view"> Ver pistas</button>
                            </div>

                            <button id="open-modal" class="open-modal">Ver mais</button>
                        </div>

                    </div>


                    <!--Modal de exibir minhas pistas-->
                    <div id="fadeCommentViewEdit" class="fadeCommentViewEdit"></div>
                    <div id="modalCommentViewEdit" class="modalCommentViewEdit">

                        <div class="modal-header-comment">
                            <div class="title-modal">
                                <h2>Minhas pistas</h2>
                                <img src="../../assets/ico/feed/logo.svg" alt="">
                            </div>
                            <div class="buttons">
                                <button class="minhas-pistas">Todas as pistas</button>
                                <button id="close-modal-comment-view-edit" class="close-modal-comment-view-edit">x</button>
                            </div>
                        </div>
                        <?php
                        require_once '../../Global.php';

                        if (isset($_SESSION['login']) || isset($_SESSION['password'])) {
                            if (!isset($_SESSION)) {
                                session_start();
                            }

                            $usuario = new Person();

                            $usuario->setCpf($_SESSION['login']);
                            $usuario->setPassword($_SESSION['password']);
                            $usuario->setIdMissed($missed['idMissed']);

                            try {
                                $listaPistaUser = PistaDao::listarPistaSession($usuario);
                            } catch (Exception $e) {
                                echo '<pre>';
                                echo $e;
                                echo '</pre>';
                                echo $e->getMessage();
                            }
                        }


                        ?>

                        <div class="modal-body-comment-view">
                            <div class="user-identify">
                                <div class="name-comment-edit">
                                    <?php
                                    if (isset($_SESSION['login']) || isset($_SESSION['password'])) {


                                        foreach ($listaPistaUser as $listaUser) { ?>
                                            <div class="comment-content-edit">
                                                <div class="descricao-pista">
                                                    <p><?php echo $listaUser['descricaoPista']; ?></p>
                                                </div>

                                                <!--Modal de editar pistas-->
                                                <div id="fadeCommentEdit" class="fadeCommentEdit"></div>
                                                <div id="modalCommentEdit" class="modalCommentEdit">
                                                    <div class="modal-header-comment">
                                                        <h2>Edite a sua pista</h2>
                                                        <button id="close-modal-comment-edit" class="close-modal-comment-edit">x</button>
                                                    </div>

                                                    <div class="modal-body-comment">
                                                        <form required class="form-pista" method="post" action="../../controller/pista/edita-pista.php">


                                                            <textarea maxlength="100" wrap="hard" name="comment-edit" id="comment" cols="30" rows="2" required></textarea>
                                                            <textarea class="idMissed" name="idPistaEdit" id="idMissed" cols="30" rows="10"><?php echo $listaUser['idPista'] ?></textarea>

                                                            <button id="submit-pista-edit" class="close-modal-submit-edit" type="submit" name="edit-pista" value=""><svg class="lupa" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                    <style>
                                                                        .lupa {
                                                                            fill: #00b7ea
                                                                        }
                                                                    </style>
                                                                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                                </svg></button>

                                                        </form>
                                                    </div>
                                                </div>
                                                <!--Fim do modal de editar pistas-->


                                                <!--Modal de deletar pistas-->
                                                <div id="fadeCommentDelete" class="fadeCommentDelete"></div>
                                                <div id="modalCommentDelete" class="modalCommentDelete">
                                                    <div class="modal-header-comment">
                                                        <h2>Deseja excluir sua pista ?</h2>
                                                        <button id="close-modal-comment-delete" class="close-modal-comment-delete">x</button>
                                                    </div>

                                                    <div class="modal-body-comment-delete">
                                                        <p>Você apagará uma atitude nobre.</p>
                                                        <form required class="form-pista-delete" method="post" action="../../controller/pista/deleta-pista.php">

                                                            <button id="submit-pista-delete" class="close-modal-submit-delete" type="submit" name="delete-pista" value="<?php echo $listaUser['idPista'] ?>"><svg class="lupa" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                    <style>
                                                                        .lupa {
                                                                            fill: #00b7ea
                                                                        }
                                                                    </style>
                                                                    <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                                </svg></button>
                                                            <button id="close-pista-delete" class="close-pista-delete">Cancelar</button>

                                                        </form>
                                                    </div>
                                                </div>



                                                <div class="update-delete-pista">
                                                    <button id="open-modal-comment-edit" class="open-modal-comment-edit"><svg class="lupa" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                            <style>
                                                                .lupa {
                                                                    fill: #00b7ea
                                                                }
                                                            </style>
                                                            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                        </svg></button>
                                                    <button id="open-modal-comment-delete" class="open-modal-comment-delete"><svg class="lupa" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                            <style>
                                                                .lupa {
                                                                    fill: #00b7ea
                                                                }
                                                            </style>
                                                            <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                        </svg></button>
                                                </div>

                                            </div>
                                    <?php }
                                    } ?>

                                </div>

                            </div>

                        </div>
                    </div>
                    <!--Fim do modal de exibir minhas pistas-->



                    <!--Modal para ver as pistas-->
                    <div id="fadeCommentView" class="fadeCommentView"></div>
                    <div id="modalCommentView" class="modalCommentView">

                        <div class="modal-header-comment">
                            <div class="title-modal">
                                <h2>Pistas</h2>
                                <img src="../../assets/ico/feed/logo.svg" alt="">
                            </div>
                            <div class="buttons">
                                <button id="open-modal-comment-view-edit" class="open-modal-comment-view-edit">Minhas pistas</button>
                                <button id="close-modal-comment-view" class="close-modal-comment-view">x</button>
                            </div>
                        </div>
                        <?php
                        try {

                            require_once '../../Global.php';

                            $pista = new Pista();

                            $pista->setIdMissed($missed['idMissed']);

                            $listaPista = PistaDao::listarPista($pista);
                        } catch (Exception $e) {
                            echo '<pre>';
                            echo $e;
                            echo '</pre>';
                            echo $e->getMessage();
                        }
                        ?>

                        <div class="modal-body-comment-view">
                            <?php foreach ($listaPista as $pista) { ?>
                                <div class="user-identify">

                                    <div class="name-comment">
                                        <div class="comment-content">
                                            <h1><?php echo $pista['nomeUsuarioComum']; ?></h1>
                                            <p><?php echo $pista['descricaoPista']; ?></p>
                                        </div>

                                    </div>

                                </div>

                            <?php } ?>
                        </div>
                    </div>
                    <!--Fim do modal para ver as pistas-->

                    <!--Modal de comentário-->
                    <div id="fadeComment" class="fadeComment"></div>
                    <div id="modalComment" class="modalComment">
                        <div class="modal-header-comment">
                            <h2>Escreva a sua pista</h2>
                            <button id="close-modal-comment" class="close-modal-comment">x</button>
                        </div>

                        <div class="modal-body-comment">
                            <form required class="form-pista" method="post" action="../../controller/pista/cadastra-pista.php">


                                <textarea maxlength="100" wrap="hard" name="comment" id="comment" cols="30" rows="2" required></textarea>
                                <textarea class="idMissed" name="idMissed" id="idMissed" cols="30" rows="10"><?php echo $missed['idMissed'] ?></textarea>

                                <button id="submit-pista" class="close-modal-submit" type="submit"><svg class="lupa" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <style>
                                            .lupa {
                                                fill: #38bdf8
                                            }
                                        </style>
                                        <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM184 296c0 13.3 10.7 24 24 24s24-10.7 24-24V232h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H232V120c0-13.3-10.7-24-24-24s-24 10.7-24 24v64H120c-13.3 0-24 10.7-24 24s10.7 24 24 24h64v64z" />
                                    </svg></button>

                            </form>
                        </div>
                    </div>
                    <!--Fim do modal de comentário-->


                    <!-- Modal do "Ver Mais" -->
                    <div id="fade" class="fade"></div>
                    <div id="modal" class="modal">
                        <div class="modal-header">
                            <h2>Informações do desaparecido</h2>
                        </div>
                        <?php
                        try {
                            $listFeatures = MissedDao::listFeaturesByMissedId($missed['idMissed']);
                        } catch (Exception $e) {
                            echo '<pre>';
                            echo $e;
                            echo '</pre>';
                            echo $e->getMessage();
                        }

                        ?>
                        <div class="modal-body">
                            <?php foreach ($listFeatures as $feature) { ?>
                                <p><b><?php echo $feature['typefeature'] ?>:</b> <?php echo $feature['descFeatureMissed'] ?></p>
                            <?php } ?>
                        </div>
                        <button id="close-modal" class="close-modal">Voltar</button>
                    </div>
                    <!--Fim do modal do ver mais-->



                <?php } ?>



            </div>



        </div>
    </main>
    <script type="text/javascript" src="../../assets/js/feed/more-info-modal.js" defer></script>
</body>


</html>