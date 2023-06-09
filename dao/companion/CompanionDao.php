<?php

    class CompanionDao{
        public static function register($companion){
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
            


            try{
                $prepareStatement->execute();
                unset($_SESSION['form_values']);
                echo('
                <script>
                    alert("Acompanhante cadastrado com sucesso!");
                    window.location = "../../view/officer/search-companion.php";
                </script>
            ');
                return 'Cadastrou';
                
            }catch(Exception $e){
                echo('
                    <script>
                        alert("Ocorreu um erro ao se cadastrar");
                    </script>
                ');
                echo($e);
            }
        }
        public static function delete($idCompanion) {
            $connection = Connection::connect();
        
            try {

                try{
                    // Excluir registros relacionados em tbFeatureMissed
                    $queryDeleteFeatureMissed = "DELETE FROM tbFeatureMissed WHERE idMissed IN (SELECT idMissed FROM tbMissed WHERE idCompanion = ?)";
                    $prepareStatementFeatureMissed = $connection->prepare($queryDeleteFeatureMissed);
                    $prepareStatementFeatureMissed->bindValue(1, $idCompanion);
                    $prepareStatementFeatureMissed->execute();

                }catch(Exception $e){
                    // Excluir registros relacionados em tbReason
                    $queryDeleteReason = "DELETE FROM tbReason WHERE idMissed IN (SELECT idMissed FROM tbMissed WHERE idCompanion = ?)";
                    $prepareStatementReason = $connection->prepare($queryDeleteReason);
                    $prepareStatementReason->bindValue(1, $idCompanion);
                    $prepareStatementReason->execute();
                }
                try{
                    // Excluir registros em tbMissed
                    $queryDeleteMissed = "DELETE FROM tbMissed WHERE idCompanion = ?";
                    $prepareStatementMissed = $connection->prepare($queryDeleteMissed);
                    $prepareStatementMissed->bindValue(1, $idCompanion);
                    $prepareStatementMissed->execute();
        
                }catch(Exception $e){
                    
                }
        

                // Excluir registro em tbCompanion
                $queryDeleteCompanion = "DELETE FROM tbCompanion WHERE idCompanion = ?";
                $prepareStatementCompanion = $connection->prepare($queryDeleteCompanion);
                $prepareStatementCompanion->bindValue(1, $idCompanion);
                $prepareStatementCompanion->execute();
        
                echo('
                    <script>
                        alert("Acompanhante deletado com sucesso!");
                        window.location = "../../view/officer/search-companion.php";
                    </script>
                ');
        
                return 'Apagou';
            } catch(Exception $e) {
                echo('<script>alert("Não foi possível deletar o companion!");</script>');
                echo($e);
            }
        }
        

        public static function getAllData($id){
            $connection = Connection::connect();
            $companionObject = new Companion();

            $querySelect = "SELECT *
                             FROM tbcompanion WHERE idCompanion = ".$id;

            $result = $connection->query($querySelect);
            $list = $result->fetchAll();

            foreach ($list as $p){
                $companionObject->setName($p['nameCompanion']);
                // $user->setSurname($p['precoproduto']);
                // $user->setDateBirth($p['fotoproduto']);
            }
            return $companionObject;   
        }
        
        public static function list(){
            $connection = Connection::connect();
            $querySelect = "SELECT c.idCompanion, c.nameCompanion, c.cpfCompanion, c.phoneCompanion,
                            c.emailCompanion, COUNT(m.idMissed) AS missedCount
                            FROM tbCompanion c
                            LEFT JOIN tbMissed m ON c.idCompanion = m.idCompanion
                            GROUP BY c.idCompanion, c.nameCompanion, c.cpfCompanion";
            $result = $connection->query($querySelect);
            $list = $result->fetchAll();
            return $list;   
        }
        

        public static function updatePicture($companion){
            $connection =  Connection::connect();

            $queryInsert = "UPDATE tbCompanion
                            SET picturePath = ?
                            WHERE idCompanion = ?";
            
            $prepareStatement = $connection->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $companion->getPicturePath());
            $prepareStatement->bindValue(2, $companion->getId());
    }


    public static function verificar($familiar){

        //conexão ao banco
        $conexao = Connection::connect();
        //consultar se existe os dados no banco
        $querySelect = "SELECT idCompanion FROM tbcompanion
                        WHERE cpfCompanion = '".$familiar->getCpf()."' AND passwordCompanion = '".$familiar->getPassword()."' ";
        
        $resultado = $conexao->query($querySelect);

        $familiar = $resultado->fetchAll();

        return $familiar;

    }


}
?>s