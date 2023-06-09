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
    }

?>