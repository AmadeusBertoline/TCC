<?php

// if(!isset($_SESSION)){
//     session_start();
// }

    class MissedDao{
        public static function register($missed){
            require_once '../../Global.php';

            $connection = Connection::connect();

            $queryInsert = "INSERT INTO tbMissed(nameMissed,cpfMissed,phoneMissed,
                                                    dateBirthMissed,cepMissed,streetMissed,dateDisappearance,hourDisappearance,
                                                    neighborhoodMissed,streetNumberMissed,referenceMissed,
                                                    stateMissed,CityMissed,idCompanion,picturePathMissed)
                            VALUES (?,?,?,
                                    ?,?,?,
                                    ?,?,?,
                                    ?,?,?,
                                    ?,?,?)";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $missed->getName());
            $prepareStatement->bindValue(2, $missed->getCpf());
            $prepareStatement->bindValue(3, $missed->getPhone());
            $prepareStatement->bindValue(4, $missed->getDateBirth());
            $prepareStatement->bindValue(5, $missed->getCep());
            $prepareStatement->bindValue(6, $missed->getStreet());
            $prepareStatement->bindValue(7,$missed->getDateDisappearance());
            $prepareStatement->bindValue(8,$missed->getHourDisappearance());
            $prepareStatement->bindValue(9, $missed->getNeighborhood());
            $prepareStatement->bindValue(10, $missed->getNumberStreet());
            $prepareStatement->bindValue(11, $missed->getReference());
            $prepareStatement->bindValue(12, $missed->getState());
            $prepareStatement->bindValue(13, $missed->getCity());
            $prepareStatement->bindValue(14, $missed->getCompanion());
            $prepareStatement->bindValue(15, $missed->getPicturePath());
            

            


            try{
                $prepareStatement->execute();

                // Obtém o ID do Missed recém-cadastrado
                $id = self::getOnlyId($missed);
                                // Obtém o ID do Missed recém-cadastrado
                $missedId = $connection->lastInsertId();

                $missed->setId($missedId);
                                
                // adicionar as características do desaparecimento
                if (!empty($missed->getFeatures())) {
                    $queryInsertFeatures = "INSERT INTO tbFeatureMissed(idMissed, idFeature, descFeatureMissed) VALUES (?, ?, ?)";
                    $prepareStatementFeatures = $connection->prepare($queryInsertFeatures);


                    foreach($missed->getFeatures() as $feature) {
                        $prepareStatementFeatures->bindValue(1,  $missedId);
                        $prepareStatementFeatures->bindValue(2, $feature['type']);
                        $prepareStatementFeatures->bindValue(3, $feature['description']);

                        $prepareStatementFeatures->execute();
                    }
                }
                // // adicionar as razões do desaparecimento
                if (!empty($missed->getReasons())) {
                    $queryInsertReasons = "INSERT INTO tbreason(idMissed, typeReason, descReason) VALUES (?, ?, ?)";
                    $prepareStatementReasons = $connection->prepare($queryInsertReasons);
                    

                    foreach($missed->getReasons() as $reason) {
                        $prepareStatementReasons->bindValue(1, $missedId);
                        $prepareStatementReasons->bindValue(2, $reason['type']);
                        $prepareStatementReasons->bindValue(3, $reason['description']);

                        $prepareStatementReasons->execute();
                    }
                }
                unset($_SESSION['form_values']);
                echo('
                    <script>
                        alert("Desaparecido cadastrado com sucesso!");
                        window.location = "../../view/officer/search-missed.php";
                    </script>
                ');
                return true;
                
            }catch(Exception $e){
                echo('
                    <script>
                        alert("Ocorreu um erro ao se cadastrar os dados do desaparecido!");
                    </script>
                ');
                echo($e);
            }
        }

        public static function delete($idMissed){
            $connection = Connection::connect();
        
            try {

                try{
                    // Excluir registros da tabela tbfeaturemissed
                    $queryDeleteFeatureMissed = "DELETE FROM tbfeaturemissed WHERE idMissed = ?";
                    $prepareStatementFeatureMissed = $connection->prepare($queryDeleteFeatureMissed);
                    $prepareStatementFeatureMissed->bindValue(1, $idMissed);
                    $prepareStatementFeatureMissed->execute();
                }catch(Exception $e){
                    
                }
        
                try{
                    // Excluir registros da tabela tbreason
                    $queryDeleteReason = "DELETE FROM tbreason WHERE idMissed = ?";
                    $prepareStatementReason = $connection->prepare($queryDeleteReason);
                    $prepareStatementReason->bindValue(1, $idMissed);
                    $prepareStatementReason->execute();
        
                }catch(Exception $e){
                    
                }

                // Excluir registro da tabela tbMissed
                $queryDeleteMissed = "DELETE FROM tbMissed WHERE idMissed = ?";
                $prepareStatementMissed = $connection->prepare($queryDeleteMissed);
                $prepareStatementMissed->bindValue(1, $idMissed);
                $prepareStatementMissed->execute();
        
                echo('
                    <script>
                        alert("Desaparecido deletado com sucesso!");
                        window.location = "../../view/officer/search-missed.php";
                    </script>
                ');
                return 'Apagou';
            } catch(Exception $e) {
                echo('<script>alert("Não foi possível deletar este desaparecido!");</script>');
                echo($e);
            }
        }
        

        public static function getOnlyId($missed){
            $connection = Connection::connect();
            $missedObject = new Missed();

            $querySelect = "SELECT idMissed FROM tbmissed 
            WHERE cpfMissed = '".$missed->getCpf()."'  AND dateBirthMissed = '".$missed->getDateBirth()."'";



            $result = $connection->query($querySelect);
            $list = $result->fetchAll();

            foreach ($list as $p){
                $missedObject->setId($p['idMissed']);
            }

            return $missedObject->getId();  
        }
        public static function getAllData($id){
            $connection = Connection::connect();
            $missedObject = new Companion();

            $querySelect = "SELECT *
                             FROM tbmissed WHERE idMissed = ".$id;

            $result = $connection->query($querySelect);
            $list = $result->fetchAll();

            foreach ($list as $p){
                $missedObject->setName($p['nameMissed']);
                // $user->setSurname($p['precoproduto']);
                // $user->setDateBirth($p['fotoproduto']);
            }
            return $missedObject;   
        }

        public static function list(){
            $connection = Connection::connect();
            $querySelect = "SELECT tbMissed.idMissed, tbMissed.nameMissed, tbMissed.hourRegister, tbMissed.picturePathMissed, tbMissed.dateBirthMissed, tbMissed.cpfMissed, tbMissed.dateDisappearance, tbMissed.hourDisappearance ,
                            tbCompanion.nameCompanion, tbCompanion.phoneCompanion, tbCompanion.emailCompanion, 
                            tbMissed.streetMissed, tbMissed.CityMissed
                            FROM tbMissed
                            INNER JOIN tbCompanion ON tbMissed.idCompanion = tbCompanion.idCompanion
                            ORDER BY tbMissed.idMissed DESC";
            $result = $connection->query($querySelect);
            $list = $result->fetchAll();
            return $list;   
        }

        

        public static function listFeaturesByMissedId($missedId){
            $connection = Connection::connect();
            $querySelect = "SELECT tbfeature.idfeature, tbfeature.typefeature, tbfeaturemissed.descFeatureMissed
                            FROM tbfeature
                            INNER JOIN tbfeaturemissed ON tbfeature.idfeature = tbfeaturemissed.idfeature
                            WHERE tbfeaturemissed.idMissed = :missedId";
        
            $statement = $connection->prepare($querySelect);
            $statement->bindParam(':missedId', $missedId);
            $statement->execute();
            $list = $statement->fetchAll();
            return $list;
        }

        public static function updatePicture($missed){
            $connection =  Connection::connect();

            $queryInsert = "UPDATE tbMissed
                            SET picturePathMissed = ?
                            WHERE idMissed = ?";
            
            $prepareStatement = $connection->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $missed->getPicturePath());
            $prepareStatement->bindValue(2, $missed->getId());

            try{
                $prepareStatement->execute();
            }catch(Exception $e){
                echo('<script>alert("Não foi possível registrar a foto!");</script>');
            }
            return 'Atualizou';
        }


        public static function searchMissed($missed){
            $connection = Connection::connect();

            $querySelect = "SELECT nameMissed FROM tbMissed WHERE nameMissed 
            LIKE '%".$missed->getName()."%'";

            $list = $connection->query($querySelect);

            $name = $list->fetchAll();

            return $name;
        }



        public static function listaMenor(){
            $connection = Connection::connect();

            $querySelect = "SELECT nameMissed, picturePathMissed
                            FROM tbMissed
                            WHERE DATEDIFF(CURDATE(), dateBirthMissed) / 365.25 <= 18";

            $result = $connection->query($querySelect);

            $list = $result->fetchAll();

            return $list;
        }

        public static function listMissedSession()
    {
        $connection = Connection::connect();
        $querySelect = "SELECT tbMissed.nameMissed, tbMissed.hourRegister, tbMissed.picturePathMissed, tbMissed.dateBirthMissed, tbMissed.cpfMissed, tbMissed.dateDisappearance, tbMissed.hourDisappearance , tbMissed.streetNumberMissed, tbMissed.neighborhoodMissed, tbMissed.cityMissed, tbMissed.stateMissed, tbMissed.cepMissed, tbMissed.referenceMissed,tbMissed.phoneMissed,tbMissed.idMissed,
                            tbCompanion.idCompanion,tbCompanion.nameCompanion, tbCompanion.phoneCompanion, tbCompanion.emailCompanion, 
                            tbMissed.streetMissed, tbMissed.CityMissed
                            FROM tbMissed
                            INNER JOIN tbCompanion ON tbMissed.idCompanion = tbCompanion.idCompanion
                            WHERE tbCompanion.idCompanion = '" . ($_SESSION['id-familiar']) . "'";
        $result = $connection->query($querySelect);
        $list = $result->fetchAll();
        return $list;
    }


    public static function updatePictureSession($missed)
    {
        $connection = Connection::connect();

        $queryInsert = "UPDATE tbMissed
                            INNER JOIN tbCompanion ON tbMissed.idCompanion = tbCompanion.idCompanion
                            SET picturePathMissed = ?
                            WHERE idCompanion = '" .($_SESSION['id-familiar']) . "'";
        $prepareStatement = $connection->prepare($queryInsert);

        $prepareStatement->bindValue(1, $missed->getPicturePath());

        try {
            $prepareStatement->execute();
        
            if ($prepareStatement->rowCount() > 0) {
                echo '<script>
                        alert("Foto do desaparecido atualizada!");
                        window.location = "../../view/feed/feed-network.php";
                    </script>';
            } else {
                echo '<script>
                        alert("Não foi possível atualizar a foto!");
                    </script>';
            }
        } catch (Exception $e) {
            echo '<script>
                    alert("Ocorreu um erro indefinido!");
                </script>';
        }
        
    }

    public static function registerMissedSession($missed){

        require_once '../../Global.php';

        $missedId = $missed->getId();

        $connection = Connection::connect();


        try {
        
            // adicionar as características do desaparecimentos
            if (!empty($missed->getFeatures())) {
                $queryInsertFeatures = "INSERT INTO tbFeatureMissed(idMissed, idFeature, descFeatureMissed) VALUES (?, ?, ?)";
        
                foreach ($missed->getFeatures() as $feature) {
                    $prepareStatementFeatures = $connection->prepare($queryInsertFeatures);
        
                    $prepareStatementFeatures->bindValue(1, $missedId);
                    $prepareStatementFeatures->bindValue(2, $feature['type']);
                    $prepareStatementFeatures->bindValue(3, $feature['description']);
        
                    $prepareStatementFeatures->execute();
                }
            }
        
            // adicionar as razões do desaparecimento
            if (!empty($missed->getReasons())) {
                $queryInsertReasons = "INSERT INTO tbreason(idMissed, typeReason, descReason) VALUES (?, ?, ?)";
        
                foreach ($missed->getReasons() as $reason) {
                    $prepareStatementReasons = $connection->prepare($queryInsertReasons);
        
                    $prepareStatementReasons->bindValue(1, $missedId);
                    $prepareStatementReasons->bindValue(2, $reason['type']);
                    $prepareStatementReasons->bindValue(3, $reason['description']);
        
                    $prepareStatementReasons->execute();
                }
            }

            echo ('
                    <script>
                        alert("Dados cadastrados com sucesso!");
                        window.location = "../../view/feed/feed-network.php";
                    </script>
                ');
            return true;

        } catch (Exception $e) {
            echo ('
                    <script>
                        alert("Ocorreu um erro no cadastro de dados do desaparecido!");
                    </script>
                ');
            echo ($e);
        }
    }
      
    
}
?>