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

    <link rel="stylesheet" href="../../assets/css/feed/global.style.css">
    <?php

    if (isset($_SESSION['login-familiar']) && isset($_SESSION['password-familiar'])) {
        //familiar
        echo '<link rel="stylesheet" href="../../assets/css/feed/network-family.style.css">';
        echo ' <script src="../../assets/js/feed/network-family.script.js" defer></script><!-- Caminho, arquivo JS-->';
        echo '<link rel="stylesheet" href="../../assets/css/feed/network-family.style copy.css">';
    } else if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
        //usuário comum 
        echo '<link rel="stylesheet" href="../../assets/css/feed/network-userCommon.style.css">';
    } else {
        //guest
        header("Location: ../../index.php");
    }

    ?>


    <script src="https://kit.fontawesome.com/98872a96e6.js" crossorigin="anonymous"></script>
    <title>ANJOS PERDIDOS | Feed de Divulgações</title><!-- Título-->
    <link rel="icon" href="../../assets/ico/feed/browser_logo.png"><!-- Ícone, navegador-->
</head>

<body>


    <header>
        <div class="flex-container_header"> <!-- 'flexbox' dentro da tag '<header>'-->
            <a href="javascript:location.reload()"
                class="flexbox_brand-system"><!-- tag link, Item do 'flex-container_header' / 'flexbox' do nome e logo do sistema -->


                <?php

                if (isset($_SESSION['login-familiar']) && isset($_SESSION['password-familiar'])) {
                    //familiar
                    echo '<img src= "../../assets/ico/feed/logo-family.svg" alt="img_logo" >';
                } else if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                    //usuário comum
                    echo "<img src= '../../assets/ico/feed/logo.svg' alt='img_logo'><!-- logo -->";
                }
                ?>
                <span>Anjos Perdidos</span><!-- nome -->

            </a>

            <div tabindex="0" class="flexbox_container-search">
                <!-- Item do 'flex-container_header' / 'flexbox' barra de pesquisa, tabindex faz ele ser selecionável pela tecla tab. -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="#9c9c9c"
                    style="width: 35px; height: 50px;">
                    <path
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg><!-- Imagem da lupa, barra de pesquisa -->
                <input type="search" class="inputSearchClass" id="inputSearchId"
                    placeholder="Buscar no Anjos Perdidos..." /><!-- 'input' barra de pesquisa -->
            </div>


            <nav class="nav"><!--Item do 'flex-container_header' / tag semântica '<nav>' -->
                <ul><!-- <ul> - Lista não ordenada, lista dos itens da navbar -->
                    <?php

                    if (isset($_SESSION['login-familiar']) && isset($_SESSION['password-familiar'])) {
                        //familiar
                        include '../../assets/components/familiar/nav-family.php';

                    } else if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                        //usuário comum
                        include '../../assets/components/userCommon/nav-user.php';
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
    </header>

    <?php
    require_once '../../Global.php';

    try {
        $missedList = MissedDao::listMissedSession();
    } catch (Exception $e) {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }

    ?>

    <main class="main-missed">
        <?php foreach ($missedList as $missed) { ?>



            <section class="container-missed">
                <article class="left-side-missed">
                    <div class="profile-missed">
                        <label class="pm-description">
                            <b class="description-name-missed">
                                <?php echo $missed['nameMissed']; ?>
                            </b>
                            <span class="description-name-family">
                                <b>Acompanhate:</b>
                                <?php
                                $limitedName = substr($missed['nameCompanion'], 0, 20);
                                echo $limitedName;
                                ?>...
                            </span>
                        </label>
                        <div class="pm-box-img">
                            <img src="<?php echo $missed['picturePathMissed']; ?>" alt="">
                        </div>
                        <div class="pm-buttons">
                            <button class="button update-img" id="btn-update-img">Trocar foto <svg
                                    xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z" />
                                </svg></button>
                            <div class="fade-modal" id="modal-update-img">
                                <div class="modal update-img">
                                    <div class="content update-img">
                                        <button type="button" class="x-btn" id="cancel-btn-update-img">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 384 512">
                                                <path
                                                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                            </svg>
                                        </button>
                                        <div class="content-head">
                                            <b class="modal-title">Editar Foto</b>
                                            <p class="subtitle-modal">Insira uma foto abaixo.</p>
                                        </div>
                                        <form class="form update-img"
                                            action="../../controller/missed/updatePictureMissed.php" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="form box-img">
                                                <img id="pictureMissed" src="<?php echo $missed['picturePathMissed']; ?>"
                                                    alt="">
                                            </div>
                                            <div class="update-img-btns">
                                                <input type="file" accept="image/*" class="button file-input" id="picture"
                                                    name="txtPicturePath" aria-describedby="inputGroupFile01"
                                                    onchange="loadFile(event)">
                                                <input type="submit" value="Salvar" class="button submit-input">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="pm-buttons-edit">
                                <button class="button edit-missed" id="btn-edit-missed">Incluir informações</button>
                                <button class="button edit-missed" id="btn-edit-missed">Editar informações</button>
                            </div>

                            <div class="fade-modal" id="modal-edit-missed">
                                <div class="modal edit-missed">
                                    <div class="content edit-missed">
                                        <button type="button" class="x-btn" id="cancel-btn-edit-missed">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 384 512">
                                                <path
                                                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                                            </svg>
                                        </button>
                                        <div class="content-head">
                                            <b class="modal-title">Incluir informações</b>
                                            <p class="modal-subtitle">Adicione informações aos campos vazios.</p>
                                        </div>
                                        <form class="form edit-missed"
                                            action="../../controller/missed/insertCompanionMissed.php" method="POST">
                                            <fieldset class="fieldset-personal-date">
                                                <legend><b>Dados pessoais - desaparecido (a)</b> ( OBRIGATÓRIO ) </legend>

                                                <?php if (!empty($missed['cpfMissed'])) { ?>

                                                    <div class="input-flex">
                                                        <label>CPF desaparecido(a):</label>
                                                        <fieldset>
                                                            <?php echo $missed['cpfMissed']; ?>
                                                        </fieldset>
                                                    </div>

                                                <?php } else { ?>

                                                    <div class="input-flex">
                                                        <label for="txtCpfMissed">CPF desaparecido(a):</label>
                                                        <input type="text" name="txtCpfMissed">
                                                    </div>

                                                <?php } ?>

                                                <?php if (!empty($missed['dateBirthMissed'])) { ?>

                                                    <div class="input-flex">
                                                        <label>Data de nascimento:</label>
                                                        <fieldset>
                                                            <?php $date = new DateTime($missed['dateBirthMissed']);
                                                            echo $date->format('d/m/Y'); ?>
                                                        </fieldset>
                                                    </div>

                                                <?php } else { ?>

                                                    <div class="input-flex">
                                                        <label for="txtDateBirthMissed">Data de nascimento:</label>
                                                        <input type="date" name="txtDateBirthMissed">
                                                    </div>

                                                <?php } ?>

                                                <?php if (!empty($missed['phoneMissed'])) { ?>

                                                    <div class="input-flex">
                                                        <label>Telefone Celular:</label>
                                                        <fieldset>
                                                            <?php echo $missed['phoneMissed']; ?>
                                                        </fieldset>
                                                    </div>

                                                <?php } else { ?>

                                                    <div class="input-flex">
                                                        <label for="txtPhoneMissed">Telefone Celular</label>
                                                        <input type="text" name="txtPhoneMissed">
                                                    </div>

                                                <?php } ?>


                                               



                                            </fieldset>
                                            <fieldset class="fieldset-add-features">
                                                <legend><b>Caracaterísticas adicionais - desaparecido (a)</b> ( OPCIONAL )</legend>

                                                <div class="list-features">
                                                    <?php
                                                    require_once '../../Global.php';

                                                    try {
                                                        $list = FeatureDao::listFeatureSession();
                                                    } catch (Exception $e) {
                                                        echo '<pre>';
                                                        print_r($e);
                                                        echo '</pre>';
                                                        echo $e->getMessage();
                                                    }

                                                    $features = array();

                                                    foreach ($list as $keylist) {
                                                        $typeFeature = $keylist['typeFeature'];
                                                        $descFeatureMissed = $keylist['descFeatureMissed'];

                                                        if (!isset($features[$typeFeature])) {
                                                            $features[$typeFeature] = array();
                                                        }

                                                        $features[$typeFeature][] = $descFeatureMissed;
                                                    }

                                                    foreach ($features as $typeFeature => $descFeatureMissedList) {
                                                        echo ('<div class="item-feature"> <b>' . $typeFeature . ':</b> ' . implode(', ', $descFeatureMissedList) . '.<br></div>');
                                                    } ?>
                                                </div>

                                                <div class="col">
                                                    <div class="row">
                                                        <span class="upper-title"> <b> Adicionar Características adicionais:
                                                            </b></span>
                                                    </div>
                                                    <div class="col" id="camposCaracteristica">
                                                        <div class="row middle-line">
                                                            <div class="col">
                                                                <?php
                                                                require_once '../../Global.php';

                                                                try {
                                                                    $listFeature = FeatureDao::list();
                                                                } catch (Exception $e) {
                                                                    echo '<pre>';
                                                                    print_r($e);
                                                                    echo '</pre>';
                                                                    echo $e->getMessage();
                                                                }
                                                                ?>
                                                                <select id="caracteristica" name="caracteristica[]"
                                                                    class="form-control"
                                                                    style="width:130px; height:30px !important; border: 1px solid #12122038; border-radius: 5px;">
                                                                    <option selected>Caracaterísticas...</option>
                                                                    <?php foreach ($listFeature as $feature) { ?>
                                                                        <option value="<?php echo $feature['idFeature']; ?>">
                                                                            <?php echo $feature['typeFeature']; ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                                <script>
                                                                    $(document).ready(function () {
                                                                        $('#caracteristica').select2();
                                                                    });
                                                                </script>
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" name="descricao[]"
                                                                    placeholder="Descrição"
                                                                    style=" height:30px !important; border-radius: 4px; border: 1px solid #12122038;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row button-container">
                                                        <div class="col">
                                                            <div class="row button-content">
                                                                <button id="btnAddCaracteristica"
                                                                    class="button submit-attributes"
                                                                    type="button">Adicionar</button>
                                                                <button id="btnRemoverCaracteristica"
                                                                    class="button reset-attributes"
                                                                    type="button">Remover</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="fieldset-add-reasons">
                                                <legend><b>Motivos desaparecimento - ( possíveis )</b> ( OPCIONAL ) </legend>
                                                <div class="list-reason">
                                                    <?php
                                                    require_once '../../Global.php';

                                                    try {
                                                        $list = ReasonDao::listReasonSession();
                                                    } catch (Exception $e) {
                                                        echo '<pre>';
                                                        print_r($e);
                                                        echo '</pre>';
                                                        echo $e->getMessage();
                                                    }


                                                    foreach ($list as $keylist) {

                                                        echo ('<div class="item-reason"><b>' . $keylist['typeReason'] . ': </b>' . $keylist['descReason'] . '.</div>');

                                                    } ?>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        <span class="upper-title"><b>Adicionar motivos do
                                                                desaparecimento:</b> </span>
                                                    </div>
                                                    <div class="col" id="camposMotivo">
                                                        <div class="row middle-line">
                                                            <div class="col">
                                                                <input type="text" name="tipoMotivo[]" placeholder="Assunto"
                                                                    style="height:30px !important; border-radius: 5px; border: 1px solid #12122038;">
                                                            </div>
                                                            <div class="col">
                                                                <input type="text" name="motivo[]" placeholder="Descrição"
                                                                    style="height:30px !important; border-radius: 5px; border: 1px solid #12122038;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row button-container">
                                                        <div class="col">
                                                            <div class="row button-content">
                                                                <button id="btnAddMotivo" class="button submit-attributes"
                                                                    type="button">Adicionar</button>
                                                                <button id="btnRemoverMotivo"
                                                                    class="button reset-attributes"
                                                                    type="button">Remover</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="fieldset-last-location">
                                                <legend><b>Último lugar visto (a)</b> ( OBRIGATÓRIO ) </legend>

                                               <?php if (!empty($missed['cepMissed'])) { ?>

                                                    <div class="input-flex">
                                                        <label>CEP desaparecido(a):</label>
                                                        <fieldset>
                                                            <?php echo $missed['cepMissed']; ?>
                                                        </fieldset>
                                                    </div>

                                                <?php } else { ?>

                                                    <div class="input-flex">
                                                        <label for="txtCepMissed">CEP desaparecido(a):</label>
                                                        <input type="text" name="txtCepMissed">
                                                    </div>

                                                <?php } ?>

                                                <?php if (!empty($missed['streetMissed'])) { ?>

                                                    <div class="input-flex">
                                                        <label>Rua desaparecido(a):</label>
                                                        <fieldset>
                                                            <?php echo ($missed['streetMissed']); ?>
                                                        </fieldset>
                                                    </div>

                                                <?php } else { ?>

                                                    <div class="input-flex">
                                                        <label for="txtStreetMissed">Rua desaparecido(a):</label>
                                                        <input type="date" name="txtStreetMissed">
                                                    </div>

                                                <?php } ?>

                                                <?php if (!empty($missed['streetNumberMissed'])) { ?>

                                                    <div class="input-flex">
                                                        <label>N° Rua desaparecido(a)</label>
                                                        <fieldset>
                                                            <?php echo $missed['streetNumberMissed']; ?>
                                                        </fieldset>
                                                    </div>

                                                <?php } else { ?>

                                                    <div class="input-flex">
                                                        <label for="txtStreetNumberMissed">N° Rua desaparecido(a)</label>
                                                        <input type="number" name="txtStreetNumberMissed">
                                                    </div>

                                                <?php } ?>

                                            </fieldset>
                                            <div class="buttons-add-attributes">
                                                <input type="submit" value="Salvar" class="button submit-attributes">
                                                <input type="reset" value="Limpar" class="button reset-attributes">
                                            </div>


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="non-editableData">
                            <label>Desaparecido (a) em:
                                <br>
                                <span>
                                    <?php
                                    $date = new DateTime($missed['dateDisappearance']);
                                    echo $date->format('d/m/Y')
                                        ?>.
                                </span>
                            </label>
                            <br>
                            <label>Visto (a) por último em:
                                <br>
                                <span>
                                    <?php echo ($missed['neighborhoodMissed'] . ", "); ?>
                                    <?php echo ($missed['cityMissed']); ?> -
                                    <?php echo ($missed['stateMissed']); ?>.
                                </span>
                            </label>
                            <br>
                            <label>Ponto de referência:
                                <br>
                                <span>
                                    <?php echo ($missed['referenceMissed']); ?>
                                </span>
                            </label>
                            <br>
                            <label>Por volta das:
                                <br>
                                <span>
                                    <?php
                                    $data = new DateTime($missed['hourDisappearance']);
                                    echo $data->format('h:i');
                                    ?>h
                                </span>
                            </label>
                            <br>
                            <a class="see-more" id="see-more">Ver mais...</a>
                        </div>

                    </div>
                </article>
                <article class="center-side-missed">
                    <div class="pistas">

                    </div>
                </article>
            </section>
        <?php } ?>

        <script>
            <?php
            require_once '../../Global.php';

            try {
                $listFeature = FeatureDao::list();
            } catch (Exception $e) {
                echo 'console.error("' . addslashes($e->getMessage()) . '");';
            }
            ?>

            var listFeature = <?php echo json_encode($listFeature); ?>;
        </script>




    </main>
</body>

</html>