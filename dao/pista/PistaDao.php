<?php

require_once '../../Global.php';

if (!isset($_SESSION)) {
    session_start();
}

class PistaDao
{

    public static function cadastraPista($pista)
    {
        $connection = Connection::connect();

        $queryInsert = "INSERT INTO tbpista(descricaoPista, codUsuarioComum, idMissed)
                        VALUES(?,?,?)";

        $statement = $connection->prepare($queryInsert);

        $statement->bindValue(1, $pista->getDescricaoPista());
        $statement->bindValue(2, $pista->getIdUsuarioComum());
        $statement->bindValue(3, $pista->getIdMissed());


        try {
            $statement->execute();
            echo 'Cadastrou a pista';
        } catch (Exception $e) {
            echo '<pre>';
            echo $e;
            echo '</pre>';
            echo $e->getMessage();
        }
    }


    public static function listarPista($pista)
    {
        $connection = Connection::connect();

        $querySelect = "SELECT idPista, descricaoPista, nomeUsuarioComum 
                        FROM tbpista
                        INNER JOIN tbUsuarioComum ON 
                        tbpista.codUsuarioComum = tbusuarioComum.codUsuarioComum
                        WHERE idMissed = '" . $pista->getIdMissed() . "'
                        ORDER BY idPista DESC";

        $result = $connection->query($querySelect);

        $list = $result->fetchAll();

        return $list;
    }




    public static function listarPistaSession($usuario)
    {
        $connection = Connection::connect();

        $querySelect = "SELECT idPista, descricaoPista
                        FROM tbpista
                        INNER JOIN tbUsuarioComum ON
                        tbpista.codUsuarioComum = tbUsuarioComum.codUsuarioComum
                        WHERE cpfUsuarioComum = '" . $usuario->getCpf() . "' AND senhaUsuarioComum = '" . $usuario->getPassword() . "'
                        AND idMissed = '" . $usuario->getIdMissed() . "'
                        ORDER BY idPista DESC
                        ";

        $result = $connection->query($querySelect);

        $pistaSession = $result->fetchAll();

        return $pistaSession;
    }



    public static function editarPista($pista)
    {
        $connection = Connection::connect();

        $queryUpdate = "UPDATE tbPista
                        SET descricaoPista = ?
                        WHERE idPista = ?
                        ";

        $statement = $connection->prepare($queryUpdate);

        $statement->bindValue(1, $pista->getDescricaoPista());
        $statement->bindValue(2, $pista->getIdPista());

        try {
            $statement->execute();
        } catch (Exception $e) {
            echo '<pre>';
            echo $e;
            echo '</pre>';
            echo $e->getMessage();
        }
    }


    public static function deletePista($pista)
    {
        $connection = Connection::connect();

        $queryDelete = "DELETE FROM tbPista
                        WHERE idPista = ?";

        $statement = $connection->prepare($queryDelete);

        $statement->bindValue(1, $pista->getIdPista());

        try {
            $statement->execute();
        } catch (Exception $e) {
            echo '<pre>';
            echo $e;
            echo '</pre>';
            echo $e->getMessage();
        }
        echo ('
        <head>
        <link rel="stylesheet" href="../../assets/css/feed/home_UserCommon.css">
        <script type="text/javascript" src="../../assets/js/feed/more-info-modal.js" defer></script>
        </head>
        
        
                                 
        <!--Modal de alert deletar pistas-->
        <div id="fadeCommentDeleteAlert" class="fadeCommentDeleteAlert"></div>
        <div id="modalCommentDeleteAlert" class="modalCommentDeleteAlert">
        <div class="modal-header-comment-delete">
        <div class="title-delete-alert">
        <h2>Pista excluída com sucesso</h2>
        </div>
        <div class="close-button-delete-alert">
        <button id="close-modal-comment-delete-alert" class="close-modal-comment-delete-alert"><a href="../../view/feed/feed.php">x</a></button>
        </div>
        </div>              
        <div class="modal-body-comment-delete-alert">
        <button id="close-pista-delete-alert" class="close-pista-delete-alert"><a href="../../view/feed/feed.php">Voltar</a></button>
        </div>
        </div>
        <!--Fim do modal de alert deletar pistas-->
                                                ');
    }

    public static function countPista($usuario)
    {
        $connection = Connection::connect();

        $querySelect = "SELECT COUNT(idPista) FROM tbPista
                        WHERE cpfUsuarioComum = '" . $usuario->getCpf() . "' 
                        AND senhaUsuarioComum = '" . $usuario->getPassword() . "'
                         ";

        $result = $connection->query($querySelect);

        $list = $result->fetchAll();

        return $list;
    }
}
