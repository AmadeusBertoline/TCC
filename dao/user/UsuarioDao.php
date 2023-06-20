<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once '../../Global.php';

class UsuarioDao
{

    public static function cadastrar($usuario)
    {

        $conexao = Connection::connect();

        $queryInsert = "INSERT INTO tbusuariocomum (nomeUsuarioComum, dataNascimentoUsuarioComum, emailUsuarioComum, cepUsuarioComum,
                            estadoUsuarioComum, cidadeUsuarioComum, bairroUsuarioComum, numeroLogUsuarioComum, logradouroUsuarioComum,
                            complementoUsuarioComum, cpfUsuarioComum, senhaUsuarioComum)
                            VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";

        $stmt = $conexao->prepare($queryInsert);

        $stmt->bindValue(1, $usuario->getName());
        $stmt->bindValue(2, $usuario->getDateBirth());
        $stmt->bindValue(3, $usuario->getEmail());
        $stmt->bindValue(4, $usuario->getCep());
        $stmt->bindValue(5, $usuario->getState());
        $stmt->bindValue(6, $usuario->getCity());
        $stmt->bindValue(7, $usuario->getNeighborhood());
        $stmt->bindValue(8, $usuario->getNumberStreet());
        $stmt->bindValue(9, $usuario->getStreet());
        $stmt->bindValue(10, $usuario->getComplement());
        $stmt->bindValue(11, $usuario->getCpf());
        $stmt->bindValue(12, $usuario->getPassword());


        try {
            $stmt->execute();
        } catch (Exception $e) {

            echo 'Erro no DAO ' . $e;
        }
    }


    public static function verificar($usuario)
    {

        $conexao = Connection::connect();

        $querySelect = "SELECT codusuariocomum FROM tbusuariocomum
                        WHERE cpfUsuarioComum = '" . $usuario->getCpf() . "' AND senhaUsuarioComum = '" . $usuario->getPassword() . "'";


        $resultado = $conexao->query($querySelect);

        $usuario = $resultado->fetchAll();

        return $usuario;
    }

    public static function listUpdate()
    {
        $conexao = Connection::connect();

        $querySelect = "SELECT codUsuarioComum, nomeUsuarioComum, emailUsuarioComum, senhaUsuarioComum
                        FROM tbUsuarioComum
                        WHERE codUsuarioComum = '".$_SESSION['id-user']."'";

        $result = $conexao->query($querySelect);

        $list = $result->fetchAll();

        return $list;
    }

    public static function updateUser($user)
    {

        $conexao = Connection::connect();

        $queryInsert = "UPDATE tbUsuarioComum
                        SET emailUsuarioComum = ?,
                        senhaUsuarioComum = ?
                        WHERE codUsuarioComum = ? ";

        $statement = $conexao->prepare($queryInsert);

        $statement->bindValue(1, $user->getEmail());
        $statement->bindValue(2, $user->getPassword());
        $statement->bindValue(3, $user->getId());

        try {
            $statement->execute();
        } catch (Exception $e) {
            echo '<pre>';
            echo $e;
            echo '</pre>';
            echo $e->getMessage();
        }
        // header("Location: ../../view/feed/ajustes-user.php");

        // aaa

    }
}
