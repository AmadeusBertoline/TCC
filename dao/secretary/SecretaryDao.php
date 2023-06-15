<?php
    require_once '../../Global.php';

    class SecretaryDao{
        public static function list(){
            $connection = Connection::connect();
            $querySelect = "SELECT idSecretary, nameSecretary, usernameSecretary, passwordSecretary, logoSecretary
                            FROM tbSecretary";
            $result = $connection->query($querySelect);
            $list = $result->fetchAll();
            return $list;   
        }
    }
?>