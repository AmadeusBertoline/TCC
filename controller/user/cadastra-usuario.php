<?php


require_once '../../Global.php';

if (
    !empty($_POST['nome']) &&
    !empty($_POST['nascimento']) &&
    !empty($_POST['email']) &&
    !empty($_POST['cep']) &&
    !empty($_POST['cpf']) &&
    !empty($_POST['estado']) &&
    !empty($_POST['cidade']) &&
    !empty($_POST['bairro']) &&
    !empty($_POST['numero']) &&
    !empty($_POST['logradouro']) &&
    !empty($_POST['password']) &&
    !empty($_POST['confirm-password'])
) {

    if (($_POST['password']) == ($_POST['confirm-password'])) {

        //remover o traço
        $cpf = str_replace("-", "", $_POST['cpf']);
        //remover o ponto
        $cpfArray = str_replace(".", "", $cpf); // agora é o cpf se tornou um ARRAY



        if (validarCpf($cpfArray) == true) {
            $usuario = new Person();

            $usuario->setName($_POST['nome']);
            $usuario->setDateBirth($_POST['nascimento']);
            $usuario->setEmail($_POST['email']);
            $usuario->setCep($_POST['cep']);
            $usuario->setCpf($_POST['cpf']);
            $usuario->setState($_POST['estado']);
            $usuario->setCity($_POST['cidade']);
            $usuario->setNeighborhood($_POST['bairro']);
            $usuario->setNumberStreet($_POST['numero']);
            $usuario->setStreet($_POST['logradouro']);
            $usuario->setComplement($_POST['complemento']);
            $usuario->setPassword($_POST['password']);


            try {
                UsuarioDao::cadastrar($usuario);
                header("Location: ../../view/user/index.php");
                
            } catch (Exception $e) {
                echo 'Erro no DAO' . $e;
            }
            
        } else {
            echo 'CPF inválido';
        }
    } else {
        echo '<script>alert("Digite senhas iguais para a confirmação")</script>';
    }
} else {
    echo 'Algum campo não preenchido';
}




//função para validar cpf
function validarCpf($cpfArray)
{
    //        --------verificação digito 1--------
    $j = 10;
    $soma1 = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma1 = $soma1 + ($cpfArray[$i] * $j);
        $j--;
    }

    $digito1 = 0;
    $res1 = $soma1 % 11;
    if ($res1 < 2) {
        $digito1 = 0;
    } else {
        $digito1 = 11 - $res1;
    }

    //reset 
    $j = 11;
    $i = 0;

    //        --------verificação digito 2--------
    $soma2 = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma2 = $soma2 + ($cpfArray[$i] * $j);
        $j--;
    }
    $soma2 = $soma2 + (2 * $digito1);
    $res2 = $soma2 % 11;
    $digito2 = 0;
    if ($res2 < 2) {
        $digito2 = 0;
    } else {
        $digito2 = 11 - $res2;
    }

    if (($digito1 == $cpfArray[9]) && ($digito2 == $cpfArray[10])) {
        return true;
    } else {
        return false;
    }
}
