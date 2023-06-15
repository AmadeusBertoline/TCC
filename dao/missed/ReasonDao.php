<?php
class ReasonDao
{

    public static function listReasonSession()
    {
        require_once '../../Global.php';
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
            $connection = Connection::connect();
            $querySelect = "SELECT tbReason.idReason, tbReason.typeReason, tbReason.descReason, tbReason.idMissed
                        FROM tbReason
                        WHERE idMissed = '".$missedItem['idMissed']."'";
            $result = $connection->query($querySelect);
            $list = $result->fetchAll();
            return $list;
        }
    }


}


?>