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

foreach ($missedList as $missedItem) {

    if(empty($_POST['txtCpfMissed']) && empty($_POST['txtDateBirthMissed']) && empty($_POST['txtPhoneMissed'])
    && empty($_POST['txtCepMissed']) && empty($_POST['txtStreetMissed']) && empty($_POST['txtStreetNumberMissed']) &&
    empty($_POST['caracteristica[]']) &&  empty($_POST['descricao[]']) && empty($_POST['tipoMotivo[]']) && empty($_POST['motivo[]'])  ){


        echo '<script>
                alert("Nenhum campo preechido!");
                window.location = "../../view/feed/feed-network.php";
            </script>';


    }

    if ((isset($_POST['caracteristica'])) && (isset($_POST['descricao']))) {
        $tipoCaracteristica = $_POST['caracteristica'];
        $caracteristica = $_POST['descricao'];
    }

    if ((isset($_POST['tipoMotivo']) && isset($_POST['motivo']))) {
        $tipoMotivo = $_POST['tipoMotivo'];
        $motivo = $_POST['motivo'];
    }

    if ((isset($_POST['caracteristica'])) && (isset($_POST['descricao']))) {
        if (!empty(array_filter($tipoCaracteristica))) {
            if (!empty(array_filter($caracteristica))) {
                foreach ($_POST['caracteristica'] as $key => $value) {
                    $type = $_POST['caracteristica'][$key];
                    $description = $_POST['descricao'][$key];
                    $missed->addFeature($type, $description);

                }
            }
        }
    }

    if ((isset($_POST['tipoMotivo']) && isset($_POST['motivo']))) {
        //motivos
        if (!empty(array_filter($tipoMotivo))) {
            if (!empty(array_filter($motivo))) {
                foreach ($_POST['tipoMotivo'] as $key => $value) {
                    $type = $_POST['tipoMotivo'][$key];
                    $description = $_POST['motivo'][$key];
                    $missed->addReason($type, $description);

                }
            }
        }
    }

    $missed = new Missed();

    $missed->setId($missedItem['idMissed']);
    MissedDao::registerMissedSession($missed);



    if (
        !empty($_POST['txtCpfMissed']) && !empty($_POST['txtDateBirthMissed']) && !empty($_POST['txtPhoneMissed'])
        && !empty($_POST['txtCepMissed']) && !empty($_POST['txtStreetMissed']) && !empty($_POST['txtStreetNumberMissed'])
    ) {

        $missed = new Missed();

        $txtCpf = $_POST['txtCpf'];
        $txtDateBirth = $_POST['txtDateBirth'];
        $txtPhone = $_POST['txtPhone'];
        $txtCep = $_POST['txtCep'];
        $txtStreet = $_POST['txtStreet'];
        $txtNumberStreet = $_POST['txtNumberStreet'];

        $cpf = str_replace("-", "", $txtCpf);
        $cpfArray = str_replace(".", "", $cpf);

        if (checkCpf($cpfArray) == true) {

            $missed->setCpf($txtCpf);
            $date = date("Y-m-d", strtotime(str_replace('/', '-', $date)));
            $missed->setDateBirth($date);
            $missed->setPhone($txtPhone);
            $date = $txtDateBirth;
            $missed->setCep($txtCep);
            $missed->setStreet($txtStreet);
            $missed->setNumberStreet($txtNumberStreet);

            $missed->setId($missedItem['idMissed']);
            MissedDao::registerMissedSession($missed);


        } else {
            echo ('
            <script>
                alert("Coloque um CPF válido!");
                window.location = "../../view/feed/feed-network.php";
            </script>
            ');
        }



    } else {
        echo '<script>
                alert("Preencha as sessões obrigatórias: Dados pessoais & Último lugar visto!");
                window.location = "../../view/feed/feed-network.php";
            </script>';
    }

    function checkCpf($cpfArray)
    {
        //        --------verificação digito 1--------
        $j = 10;
        $soma1 = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma1 = $soma1 + ($cpfArray[$i] * $j);
            $j--;
        }

        $digito1 = 0;
        $res1 = $soma1 % 11;
        if ($res1 < 2) {
            $digito1 = 0;
        } else {
            $digito1 = 11 - $res1;
        }

        //reset 
        $j = 11;
        $i = 0;

        //        --------verificação digito 2--------
        $soma2 = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma2 = $soma2 + ($cpfArray[$i] * $j);
            $j--;
        }
        $soma2 = $soma2 + (2 * $digito1);
        $res2 = $soma2 % 11;
        $digito2 = 0;
        if ($res2 < 2) {
            $digito2 = 0;
        } else {
            $digito2 = 11 - $res2;
        }

        if (($digito1 == $cpfArray[9]) && ($digito2 == $cpfArray[10])) {
            return true;
        } else {
            return false;
        }
    }



}

?>