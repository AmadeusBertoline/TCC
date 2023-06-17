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


        $missed = new Missed();

        if ((isset($_POST['caracteristica'])) && (isset($_POST['descricao']))) {
            $tipoCaracteristica = $_POST['caracteristica'];
            $caracteristica = $_POST['descricao'];
        }

        if ((isset($_POST['tipoMotivo']) && isset($_POST['motivo']))) {
            $tipoMotivo = $_POST['tipoMotivo'];
            $motivo = $_POST['motivo'];
        }

        //caracteristica
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

        $missed->setId($missedItem['idMissed']);
        MissedDao::registerMissedSession($missed);

}

?>