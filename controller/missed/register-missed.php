<?php 
    require_once '../../Global.php';

    if(!empty($_POST['txtCompanion'])){
        
        $missed = new Missed();
        $txtName = $_POST['txtName'];
        $txtCpf = $_POST['txtCpf'];
        $txtPhone = $_POST['txtPhone'];
        $txtCep = $_POST['txtCep'];
        $txtDateBirth = $_POST['txtDateBirth'];
        $txtStreet  = $_POST['txtStreet'];
        $txtNeighborhood = $_POST['txtNeighborhood'];
        $txtNumberStreet  = $_POST['txtNumberStreet'];
        $txtReference  = $_POST['txtReference'];
        $txtCity  = $_POST['txtCity'];
        $txtState  = $_POST['txtState'];
        $txtCompanion = $_POST['txtCompanion'];
        $txtDateDisappearance = $_POST['txtDateDisappearance'];
        $txtHourDisappearance = $_POST['txtHourDisappearance'];
    
        if((isset($_POST['caracteristica'])) && (isset($_POST['descricao']))){
            $tipoCaracteristica = $_POST['caracteristica'];
            $caracteristica = $_POST['descricao'];
        }

        if((isset($_POST['tipoMotivo']) && isset($_POST['motivo']))){
            $tipoMotivo = $_POST['tipoMotivo'];
            $motivo = $_POST['motivo'];
        }
        
        if(!empty($_POST['txtCpf'])){
            $cpf = str_replace("-","",$txtCpf);
            $cpfArray= str_replace(".","",$cpf);
    
            if(checkCpf($cpfArray)==true){
                //caracteristica
                if((isset($_POST['caracteristica'])) && (isset($_POST['descricao']))){
                    if (!empty(array_filter($tipoCaracteristica))) {
                        if (!empty(array_filter($caracteristica))) {
                            foreach($_POST['caracteristica'] as $key => $value) {
                                $type = $_POST['caracteristica'][$key];
                                $description = $_POST['descricao'][$key];
                                $missed->addFeature($type, $description);
        
                            }
                        }
                    }
                }
        }
                
            
            if((isset($_POST['tipoMotivo']) && isset($_POST['motivo']))){
                //motivos
                if (!empty(array_filter($tipoMotivo))) {
                    if (!empty(array_filter($motivo))) {
                        foreach($_POST['tipoMotivo'] as $key => $value) {
                            $type = $_POST['tipoMotivo'][$key];
                            $description = $_POST['motivo'][$key];
                            $missed->addReason($type, $description);
    
                        }
                    }
                }
            }

            
            $missed->setName($txtName);
            $missed->setCpf($txtCpf);
            $missed->setPhone($txtPhone);
            $date = $txtDateBirth;
            $date = date("Y-m-d",strtotime(str_replace('/','-',$date)));  
            $missed->setDateBirth($date);

            $missed->setCep($txtCep);
            $missed->setStreet($txtStreet);
            $missed->setNeighborhood($txtNeighborhood);
            $missed->setNumberStreet($txtNumberStreet);
            $missed->setReference($txtReference);
            $missed->setCity($txtCity);
            $missed->setState($txtState);
            $missed->setCompanion($txtCompanion);
            $missed->setPicturePath(""); // Inicialmente definimos como vazio, pois atualizaremos o caminho da foto posteriormente
            $missed->setDateDisappearance($txtDateDisappearance);
            $missed->setHourDisappearance($txtHourDisappearance);
            MissedDao::register($missed);

            $missed->setId(MissedDao::getOnlyId($missed));


            // Nome original do arquivo no computador do usuário
            $nome = $_FILES['txtPicturePath']['name'];
            
            //para validações que possam ser necessárias, na nossa loja não será obrigatório
            $tipo = $_FILES['txtPicturePath']['type']; // exemplo image/gif
            $tamanho = $_FILES['txtPicturePath']['size']; // tamanho em bytes
            
            //nome temporário do arquivo como foi armazenado no servidor, é o ARQUIVO!!!
            $arquivo = $_FILES['txtPicturePath']['tmp_name'];
            
            $diretorio = "../../resource/missed/img/"; // diretório raiz do projeto

            $extensao = strtolower(pathinfo($nome, PATHINFO_EXTENSION)); // obtém a extensão em letras minúsculas
            $timestamp = time(); // obtém o timestamp atual
            $nomenovo = $missed->getId() . '_' . $timestamp . '.' . $extensao; // combina o ID do objeto Missed com o timestamp e a extensão
            
            $nomecompleto = $diretorio.$nomenovo;
            
            move_uploaded_file($arquivo, $nomecompleto);
            
            $missed->setPicturePath($nomecompleto);
            
            MissedDao::updatePicture($missed);
            
        }else{
            echo('
            <script>
                alert("Coloque um CPF válido!");
                window.location = "../../view/officer/register-missed.php";
            </script>
            ');
        }
    }else{
        echo('
        <script>
            alert("Adicione um acompanhante!");
            window.location = "../../view/officer/register-missed.php";
        </script>
        ');
    }
    function checkCpf($cpfArray){
        //        --------verificação digito 1--------
       $j = 10;
       $soma1 = 0;
       for($i = 0;$i<9;$i++){
           $soma1 = $soma1 + ($cpfArray[$i]*$j);
           $j--;
       }

       $digito1 = 0;
       $res1 = $soma1 % 11;
       if($res1 < 2){
           $digito1 = 0;
       }else{
           $digito1 = 11-$res1;
       }

       //reset 
       $j = 11;
       $i = 0;

       //        --------verificação digito 2--------
       $soma2 = 0;
       for($i = 0;$i<9;$i++){
           $soma2 = $soma2 + ($cpfArray[$i]*$j);
           $j--;
       }
       $soma2 = $soma2 +(2*$digito1);
       $res2 = $soma2 % 11;
       $digito2 = 0;
       if($res2 <2){
           $digito2 = 0;
       }else{
           $digito2 = 11 - $res2;
       }
       
       if(($digito1 == $cpfArray[9]) && ($digito2 == $cpfArray[10])){
           return true;
       }else{
           return false;
       }
   }
    
?>