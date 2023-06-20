<?php
require_once '../../Global.php';

if ($_FILES['txtPicturePath']['error'] !== UPLOAD_ERR_NO_FILE) {
    try {
        $missedList = MissedDao::listMissedSession();
    } catch (Exception $e) {
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }

    foreach ($missedList as $missedItem) {
        $missed = new Missed();

        $missed->setCpf($missedItem['cpfMissed']);
        $missed->setDateBirth($missedItem['dateBirthMissed']);

        $missed->setId($missedItem['idMissed']);
    }

    // Nome original do arquivo no computador do usuário
    $nome = $_FILES['txtPicturePath']['name'];

    // para validações que possam ser necessárias, na nossa loja não será obrigatório
    $tipo = $_FILES['txtPicturePath']['type']; // exemplo image/gif
    $tamanho = $_FILES['txtPicturePath']['size']; // tamanho em bytes

    // nome temporário do arquivo como foi armazenado no servidor, é o ARQUIVO!!!
    $arquivo = $_FILES['txtPicturePath']['tmp_name'];

    $diretorio = "../../resource/missed/img/"; // diretório raiz do projeto

    $extensao = strtolower(pathinfo($nome, PATHINFO_EXTENSION)); // obtém a extensão em letras minúsculas
    $timestamp = time(); // obtém o timestamp atual
    $nomenovo = $missed->getId() . '_' . $timestamp . '.' . $extensao; // combina o ID do objeto Missed com o timestamp e a extensão

    $nomecompleto = $diretorio.$nomenovo;

    move_uploaded_file($arquivo, $nomecompleto);

    $missed->setPicturePath($nomecompleto);

    MissedDao::updatePictureSession($missed);
} else {
    echo('
        <script>
            alert("Adicione uma foto do desaparecido!");
            window.location = "../../view/feed/feed-network.php";
        </script>
    ');
}
?>
