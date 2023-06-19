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


    $missed = new Missed();

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


    if (
        !empty($_POST['txtCpfMissed']) && !empty($_POST['txtDateBirthMissed']) && !empty($_POST['txtPhoneMissed'])
        && !empty($_POST['txtCepMissed']) && !empty($_POST['txtStreetMissed']) && !empty($_POST['txtStreetNumberMissed'])
    ) {


        $txtCpf = $_POST['txtCpfMissed'];
        $txtDateBirth = $_POST['txtDateBirthMissed'];
        $txtPhone = $_POST['txtPhoneMissed'];
        $txtCep = $_POST['txtCepMissed'];
        $txtStreet = $_POST['txtStreetMissed'];
        $txtNumberStreet = $_POST['txtStreetNumberMissed'];

        $cpf = str_replace("-", "", $txtCpf);
        $cpfArray = str_replace(".", "", $cpf);

        if (checkCpf($cpfArray) == true) {

            $missed->setCpf($txtCpf);
            $date = $txtDateBirth;
            $date = date("Y-m-d", strtotime(str_replace('/', '-', $date)));
            $missed->setDateBirth($date);
            $missed->setPhone($txtPhone);
            $missed->setCep($txtCep);
            $missed->setStreet($txtStreet);
            $missed->setNumberStreet($txtNumberStreet);

        } else {
            echo ('
            <script>
                alert("Coloque um CPF válido!");
                window.location = "../../view/feed/feed-network.php";
            </script>
            ');
        }



    }

    if (empty($_POST['txtCpfMissed']) && empty($_POST['txtDateBirthMissed']) && empty($_POST['txtPhoneMissed'])
    && empty($_POST['txtCepMissed']) && empty($_POST['txtStreetMissed']) && empty($_POST['txtStreetNumberMissed'])
    && empty($missed->getReasons()) && empty($missed->getFeatures())){

        echo ('
        <script>
            alert("Nenhum campo foi preechido!");
            window.location = "../../view/feed/feed-network.php";
        </script>
        ');

    }



    $missed->setId($missedItem['idMissed']);
    MissedDao::registerMissedSession($missed);


}

?>