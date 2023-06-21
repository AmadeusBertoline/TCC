<?php

class CompanionDao
{
    public static function register($companion)
    {
        require_once '../../Global.php';

        $connection = Connection::connect();

        $queryInsert = "INSERT INTO tbCompanion(nameCompanion,cpfCompanion,phoneCompanion,
                                                    cepCompanion, streetCompanion,neighborhoodCompanion,
                                                    numberStreetCompanion,complementCompanion,cityCompanion,
                                                    stateCompanion,emailCompanion,passwordCompanion)
                            VALUES (?,?,?,
                                    ?,?,?,
                                    ?,?,?,
                                    ?,?,?)";

        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $companion->getName());
        $prepareStatement->bindValue(2, $companion->getCpf());
        $prepareStatement->bindValue(3, $companion->getPhone());
        $prepareStatement->bindValue(4, $companion->getCep());
        $prepareStatement->bindValue(5, $companion->getStreet());
        $prepareStatement->bindValue(6, $companion->getNeighborhood());
        $prepareStatement->bindValue(7, $companion->getNumberStreet());
        $prepareStatement->bindValue(8, $companion->getComplement());
        $prepareStatement->bindValue(9, $companion->getCity());
        $prepareStatement->bindValue(10, $companion->getState());
        $prepareStatement->bindValue(11, $companion->getEmail());
        $prepareStatement->bindValue(12, $companion->getPassword());



        try {
            $prepareStatement->execute();
            unset($_SESSION['form_values']);
            echo ('
                <script>
                    alert("Acompanhante cadastrado com sucesso!");
                    window.location = "../../view/officer/search-companion.php";
                </script>
            ');
            return 'Cadastrou';
        } catch (Exception $e) {
            echo ('
                    <script>
                        alert("Ocorreu um erro ao se cadastrar");
                    </script>
                ');
            echo ($e);
        }
    }
    public static function delete($idCompanion)
    {
        $connection = Connection::connect();

        try {

            try {
                // Excluir registros relacionados em tbFeatureMissed
                $queryDeleteFeatureMissed = "DELETE FROM tbFeatureMissed WHERE idMissed IN (SELECT idMissed FROM tbMissed WHERE idCompanion = ?)";
                $prepareStatementFeatureMissed = $connection->prepare($queryDeleteFeatureMissed);
                $prepareStatementFeatureMissed->bindValue(1, $idCompanion);
                $prepareStatementFeatureMissed->execute();
            } catch (Exception $e) {
                // Excluir registros relacionados em tbReason
                $queryDeleteReason = "DELETE FROM tbReason WHERE idMissed IN (SELECT idMissed FROM tbMissed WHERE idCompanion = ?)";
                $prepareStatementReason = $connection->prepare($queryDeleteReason);
                $prepareStatementReason->bindValue(1, $idCompanion);
                $prepareStatementReason->execute();
            }
            try {
                // Excluir registros em tbMissed
                $queryDeleteMissed = "DELETE FROM tbMissed WHERE idCompanion = ?";
                $prepareStatementMissed = $connection->prepare($queryDeleteMissed);
                $prepareStatementMissed->bindValue(1, $idCompanion);
                $prepareStatementMissed->execute();
            } catch (Exception $e) {
            }


            // Excluir registro em tbCompanion
            $queryDeleteCompanion = "DELETE FROM tbCompanion WHERE idCompanion = ?";
            $prepareStatementCompanion = $connection->prepare($queryDeleteCompanion);
            $prepareStatementCompanion->bindValue(1, $idCompanion);
            $prepareStatementCompanion->execute();

            echo ('
                    <script>
                        alert("Acompanhante deletado com sucesso!");
                        window.location = "../../view/officer/search-companion.php";
                    </script>
                ');

            return 'Apagou';
        } catch (Exception $e) {
            echo ('<script>alert("Não foi possível deletar o companion!");</script>');
            echo ($e);
        }
    }


    public static function getAllData($id)
    {
        $connection = Connection::connect();
        $companionObject = new Companion();

        $querySelect = "SELECT *
                             FROM tbcompanion WHERE idCompanion = " . $id;

        $result = $connection->query($querySelect);
        $list = $result->fetchAll();

        foreach ($list as $p) {
            $companionObject->setName($p['nameCompanion']);
            // $user->setSurname($p['precoproduto']);
            // $user->setDateBirth($p['fotoproduto']);
        }
        return $companionObject;
    }

    public static function list()
    {
        $connection = Connection::connect();
        $querySelect = "SELECT c.idCompanion, c.nameCompanion, c.cpfCompanion, c.phoneCompanion, c.cepCompanion, c.streetCompanion,
                                 c.neighborhoodCompanion, c.numberStreetCompanion, c.complementCompanion, c.stateCompanion, c.cityCompanion, c.emailCompanion, c.passwordCompanion, COUNT(m.idMissed) AS missedCount
                            FROM tbCompanion c
                            LEFT JOIN tbMissed m ON c.idCompanion = m.idCompanion
                            GROUP BY c.idCompanion, c.nameCompanion, c.cpfCompanion";
        $result = $connection->query($querySelect);
        $list = $result->fetchAll();
        return $list;
    }


    public static function update($companion)
    {
        $connection = Connection::connect();

        $queryUpdate = "UPDATE tbCompanion
            SET nameCompanion = ?, phoneCompanion = ?, cpfCompanion = ?, cepCompanion = ?, streetCompanion = ?, neighborhoodCompanion = ?, numberStreetCompanion = ?,
               complementCompanion = ?, stateCompanion = ?, cityCompanion = ?, emailCompanion = ?, passwordCompanion = ?
            WHERE idCompanion = ?";

        $prepareStatement = $connection->prepare($queryUpdate);

        $prepareStatement->bindValue(1, $companion->getName());
        $prepareStatement->bindValue(2, $companion->getPhone());
        $prepareStatement->bindValue(3, $companion->getCpf());
        $prepareStatement->bindValue(4, $companion->getCep());
        $prepareStatement->bindValue(5, $companion->getStreet());
        $prepareStatement->bindValue(6, $companion->getNeighborhood());
        $prepareStatement->bindValue(7, $companion->getNumberStreet());
        $prepareStatement->bindValue(8, $companion->getComplement());
        $prepareStatement->bindValue(9, $companion->getState());
        $prepareStatement->bindValue(10, $companion->getCity());
        $prepareStatement->bindValue(11, $companion->getEmail());
        $prepareStatement->bindValue(12, $companion->getPassword());
        $prepareStatement->bindValue(13, $companion->getId());

        try {
            $prepareStatement->execute();

            echo ('
                <script>
                    alert("Editado com sucesso!");
                    window.location = "../../view/officer/search-companion.php";
                </script>
                ');

            return 'Editou';
        } catch (Exception $e) {
            echo $e;
        }
    }


    public static function verificar($familiar)
    {

        $conexao = Connection::connect();

        $querySelect = "SELECT idCompanion FROM tbCompanion
                            WHERE cpfCompanion = '" . $familiar->getCpf() . "' AND passwordCompanion = '" . $familiar->getPassword() . "'";


        $resultado = $conexao->query($querySelect);

        $familiar = $resultado->fetchAll();

        return $familiar;
    }


    public static function listSession()
    {
        $connection = Connection::connect();
        $querySelect = "SELECT c.idCompanion, c.nameCompanion, c.cpfCompanion, c.phoneCompanion, c.cepCompanion, c.streetCompanion,
                                 c.neighborhoodCompanion, c.numberStreetCompanion, c.complementCompanion, c.stateCompanion, c.cityCompanion, c.emailCompanion, c.passwordCompanion, COUNT(m.idMissed) AS missedCount
                            FROM tbCompanion c
                            LEFT JOIN tbMissed m ON c.idCompanion = m.idCompanion
                            GROUP BY c.idCompanion, c.nameCompanion, c.cpfCompanion";
        $result = $connection->query($querySelect);
        $list = $result->fetchAll();
        return $list;
    }


    public static function listUpdateCompanion()
    {
        $conexao = Connection::connect();

        $querySelect = "SELECT idCompanion, nameCompanion, emailCompanion, passwordCompanion
                        FROM tbCompanion
                        WHERE idCompanion = '".$_SESSION['id-familiar']."'";

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
}}
