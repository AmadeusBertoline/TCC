<?php
    require_once '../../Global.php';

    class LoginSecretaryDao {
        public function verifySecretary($secretary) {
            $username = $secretary->getUsername();
            $password = $secretary->getPassword();

            $connection = Connection::connect();

            $querySelect = "SELECT * FROM tbSecretary WHERE usernameSecretary = '$username' AND passwordSecretary = '$password'";

            $result = $connection->query($querySelect);

            $secretaryObject = $result->fetchAll();

            return $secretaryObject;

        }
    }
?>