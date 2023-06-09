<?php
    class Connection
    {
        public static function connect()
        {
            // $conexao = new PDO("TIPO_BANCO:host=SERVIDOR;dbname=NOME_BANCO", "USUARIO", "SENHA"); 
            $connection = new PDO("mysql:host=localhost;dbname=dbfirelook"
                                , "root", ""); 
            //mysqli
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $connection;
        }
    }
?>