<?php 
    class FeatureDao{
        public static function list(){
            $connection = Connection::connect();
            $querySelect = "SELECT idFeature, typeFeature
                            FROM tbFeature";
            $result = $connection->query($querySelect);
            $list = $result->fetchAll();
            return $list;   
        }

        public static function listFeatureSession() {
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
            $querySelect = "SELECT tbfeature.idFeature, tbfeature.typeFeature, tbfeaturemissed.descFeatureMissed, tbfeaturemissed.idFeature, tbfeaturemissed.idMissed
                            FROM tbfeature
                            INNER JOIN tbfeaturemissed ON tbfeature.idfeature = tbfeaturemissed.idfeature
                            WHERE idMissed = '".$missedItem['idMissed']."'";
    
            $result = $connection->query($querySelect);
            $list = $result->fetchAll();
            return $list;
            }
        }

    }

    

?>