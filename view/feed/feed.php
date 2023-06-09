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

    <link rel="stylesheet" href="../../assets/css/feed/home_UserCommon.css"><!-- Caminho, arquivo CSS-->
    <link rel="stylesheet" href="../../assets/css/feed/swiper-bundle.min.css"><!-- Caminho, arquivo CSS do Carrosel-->

    <script src="../../assets/js/feed/feed-home.script.js" defer></script><!-- Caminho, arquivo JS-->
    <script src="../../assets/js/feed/swiper.script.js" defer></script><!-- Caminho, arquivo JS do Carrosel-->
    <script src="../../assets/js/feed/swiper-bundle.min.js" defer></script><!-- Caminho, arquivo JS do Carrosel-->
    <script src="https://kit.fontawesome.com/98872a96e6.js" crossorigin="anonymous"></script>

    <title>ANJOS PERDIDOS | Feed de Divulgações</title><!-- Título-->
    <link rel="icon" href="../../assets/ico/feed/browser_logo.png"><!-- Ícone, navegador-->
</head>

<!--Esse é um teste de branch-->

<body>
    
    <main>
        <div class="flex-container_header"> <!-- 'flexbox' dentro da tag '<header>'-->
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

            <div tabindex="0" class="flexbox_container-search">
                <!-- Item do 'flex-container_header' / 'flexbox' barra de pesquisa, tabindex faz ele ser selecionável pela tecla tab. -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#9c9c9c" style="width: 35px; height: 50px;">
                    <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg><!-- Imagem da lupa, barra de pesquisa -->
                <input type="search" class="inputSearchClass" id="inputSearchId" placeholder="Buscar no Anjos Perdidos..." /><!-- 'input' barra de pesquisa -->
            </div>


            <nav class="nav"><!--Item do 'flex-container_header' / tag semântica '<nav>' -->
                <ul><!-- <ul> - Lista não ordenada, lista dos itens da navbar -->
                    <?php

                    if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) {
                        // Incluí componente sem a sessão
                        include '../../assets/components/access-buttons.php';
                    } else {
                        include '../../assets/components/navList-home.php';
                    }

                    ?>
                </ul>
            </nav>
            <div class="burguerBar"><!-- Container BurguerBar-->
                <span></span><!-- linhas-->
                <span></span><!-- Linhas-->
                <span></span><!-- Linhas-->
            </div>
        </div>
        <!--início carrossel-->

        <div id="carousel-space">
            <div class="flex-container_main"><!--'grid-container'-->

                <div class="slide-container swiper"><!-- Container, 'box-shadow' carrosel -->

                    <span class="location_item">Desaparecimentos próximos<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500" style="width: 5px; height: 5px; cursor: pointer; <?php if (!isset($_SESSION['user']) || isset($_SESSION['user'])) {
                                                                                                                                                                                            echo 'fill: #00B7EA;';
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo 'fill: #2065AA;';
                                                                                                                                                                                        } ?> ">
                            <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"></path>
                        </svg>Guaianases</span>

                    <div class="slide-content"><!-- Container, slides visíveis-->
                        <div class="card-wrapper swiper-wrapper"><!-- Container, todos os slides -->
                            <div class="card swiper-slide"><!-- Container, slide único-->
                                <div class="image-content"><!-- Container, fundo azul & foto-->
                                    <span class="overlay"></span><!-- fundo azul & foto-->

                                    <div class="card-image"><!-- Container foto-->
                                        <img src="../../assets/img/feed/user0.png" alt="" class="card-img"><!-- Foto-->
                                    </div>
                                </div>

                                <div class="card-content"><!-- Container, nome & "Ver Mais"-->
                                    <h2 class="name">Isabelly Carvalho</h2><!-- Nome -->
                                    <button class="button"><a href="#">Ver Mais</a></button><!-- btn "Ver Mais"  -->
                                </div>
                            </div>

                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <span class="overlay"></span>

                                    <div class="card-image">
                                        <img src="../../assets/img/feed/user1.png" alt="" class="card-img">
                                    </div>
                                </div>

                                <div class="card-content">
                                    <h2 class="name">Isaac Souza</h2>
                                    <button class="button"><a href="#">Ver Mais</a></button>
                                </div>
                            </div>

                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <span class="overlay"></span>

                                    <div class="card-image">
                                        <img src="../../assets/img/feed/user2.png" alt="" class="card-img">
                                    </div>
                                </div>

                                <div class="card-content">
                                    <h2 class="name">Seann Barroso</h2>
                                    <button class="button"><a href="#">Ver Mais</a></button>
                                </div>
                            </div>

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

                    <div class="family-post">

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

                                <p><b>Idade: </b><?php $date = new DateTime($missed['dateBirthMissed']);
                                                    $interval = $date->diff(new DateTime(date('Y-m-d')));
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
                            <button name="pista" id="open-modal-comment" class="open-modal-comment"><i class="fa-solid fa-magnifying-glass-plus" style="color: #00b7ea;"></i> Pista</button>
                            <button id="open-modal" class="open-modal">Ver mais</button>
                        </div>

                    </div>

                    <!--Modal de comentário-->
                    <div id="fadeComment" class="fadeComment"></div>
                    <div id="modalComment" class="modalComment">
                        <div class="modal-header-comment">
                            <h2>Escreva a sua pista</h2>
                            <button id="close-modal-comment" class="close-modal-comment">x</button>
                        </div>

                        <?php

                        ?>
                        <div class="modal-body-comment">
                            <form class="form-pista" method="post" action="../../controller/pista/cadastra-pista.php">


                                <textarea maxlength="300" wrap="hard" name="comment" id="comment" cols="30" rows="2"></textarea>
                                <textarea class="idMissed" name="idMissed" id="idMissed" cols="30" rows="10"><?php echo $missed['idMissed'] ?></textarea>


                                <button id="submit-pista" class="close-modal-submit" type="submit"><i class="fa-solid fa-magnifying-glass-plus" style="color: #38BDF8;"></i></button>

                            </form>
                        </div>
                    </div>
                    <!--Fim do modal de comentário-->


                    <!--Modal do "Ver Mais"-->
                    <div id="fade" class="fade"></div>
                    <div id="modal" class="modal">
                        <div class="modal-header">
                            <h2>Informações do desaparecido</h2>
                        </div>
                        <?php
                        $listFeatures = MissedDao::listFeaturesByMissedId($missed['idMissed']);
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
    <script type="text/javascript" src="../../assets/js/feed/more-info-modal.js"></script>
</body>


</html>