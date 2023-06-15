<?php

    class DepartamentDao{
        public static function register($departament){
            require_once '../../Global.php';

            $connection = Connection::connect();

            $queryInsert = "INSERT INTO tbDepartament(nameDepartament,phoneDepartament,
                                                    cepDepartament,streetDepartament,
                                                    neighborhoodDepartament,streetNumberDepartament,
                                                    cityDepartament,idSecretary,picturePathDepartament)
                            VALUES (?,?,?,
                                    ?,?,?,
                                    ?,?,?)";

            $prepareStatement = $connection->prepare($queryInsert);

            $prepareStatement->bindValue(1, $departament->getName());
            $prepareStatement->bindValue(2, $departament->getPhone());
            $prepareStatement->bindValue(3, $departament->getCep());
            $prepareStatement->bindValue(4, $departament->getStreet());
            $prepareStatement->bindValue(5, $departament->getNeighborhood());
            $prepareStatement->bindValue(6, $departament->getNumberStreet());
            $prepareStatement->bindValue(7, $departament->getCity());
            $prepareStatement->bindValue(8, $departament->getSecretary());
            $prepareStatement->bindValue(9, $departament->getPicturePath());


            try{
                $prepareStatement->execute();

                unset($_SESSION['form_values']);
                echo('
                    <script>
                        alert("Departamento cadastrado com sucesso!");
                        window.location = "../../view/secretary/register-departament.php";
                    </script>
                ');
                return true;
            }catch(Exception $e){
                echo('
                    <script>
                        alert("Ocorreu um erro ao se cadastrar os dados do departamento!");
                    </script>
                ');
                echo($e);
            }
        }

        public static function delete($idDepartament){
            $connection = Connection::connect();
        
            try {

                // Excluir registro da tabela tbMissed
                $queryDeleteDepartament = "DELETE FROM tbDepartament WHERE idDepartament = ?";

                $prepareStatementDepartament = $connection->prepare($queryDeleteDepartament);

                $prepareStatementDepartament->bindValue(1, $idDepartament);

                $prepareStatementDepartament->execute();
        
                echo('
                    <script>
                        alert("Departamento deletado com sucesso!");
                        window.location = "../../view/officer/search-missed.php";
                    </script>
                ');
                return 'Apagou';
            } catch(Exception $e) {
                echo('<script>alert("Não foi possível deletar este departamento!");</script>');
                echo($e);
            }
        }
        

        public static function getAllData($id){
            $connection = Connection::connect();
            $departamentObject = new Companion();

            $querySelect = "SELECT *
                             FROM tbDepartament WHERE idDepartament = ".$id;

            $result = $connection->query($querySelect);
            $list = $result->fetchAll();

            foreach ($list as $p){
                $departamentObject->setName($p['nameDepartament']);
            }
            return $departamentObject;   
        }

        public static function list(){
            $connection = Connection::connect();
            $querySelect = "SELECT tbDepartament.idDepartament, tbDepartament.nameDepartament, tbDepartament.picturePathDepartament, tbDepartament.cpfDepartament, tbCompanion.nameSecretary, 
                            tbDepartament.streetDepartament, tbDepartament.CityDepartament
                            FROM tbDepartament
                            INNER JOIN tbSecretary ON tbDepartament.idSecretary = tbSecretary.idSecretary";
            $result = $connection->query($querySelect);
            $list = $result->fetchAll();
            return $list;   
        }

        public static function updatePicture($departament){
            $connection =  Connection::connect();

            $queryInsert = "UPDATE tbDepartament
                            SET picturePathDepartament = ?
                            WHERE idDepartament = ?";
            
            $prepareStatement = $connection->prepare($queryInsert);
            
            $prepareStatement->bindValue(1, $departament->getPicturePath());
            $prepareStatement->bindValue(2, $departament->getId());

            try{
                $prepareStatement->execute();
            }catch(Exception $e){
                echo('<script>alert("Não foi possível registrar a foto!");</script>');
            }
            return 'Atualizou';
        }

    }
?>