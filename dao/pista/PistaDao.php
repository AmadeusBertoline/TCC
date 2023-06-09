<?php

require_once '../../Global.php';

if(!isset($_SESSION)){
    session_start();
}

class PistaDao{

    public static function cadastraPista($pista){
        $connection = Connection::connect();

        $queryInsert = "INSERT INTO tbpista(descricaoPista, codUsuarioComum, idMissed)
                        VALUES(?,?,?)";
        
        $statement = $connection->prepare($queryInsert);

        $statement->bindValue(1, $pista->getDescricaoPista());
        $statement->bindValue(2, $pista->getIdUsuarioComum());
        $statement->bindValue(3, $pista->getIdMissed());


        try{
            $statement->execute();
            echo 'Cadastrou a pista';
        }catch(Exception $e){
            echo '<pre>';
            echo $e;
            echo '</pre>';
            echo $e->getMessage();
        }

        
    }






//     <?php
// // Iniciar a sessão
// session_start();

// // Verificar se o usuário comum está logado
// if (!isset($_SESSION['idUsuarioComum'])) {
//     // Redirecionar o usuário para a página de login, por exemplo
//     header("Location: login.php");
//     exit;
// }

// Conexão com o banco de dados
// $servername = "localhost";
// $username = "seu_usuario";
// $password = "sua_senha";
// $dbname = "seu_banco_de_dados";

// $conn = new mysqli($servername, $username, $password, $dbname);

// // Verificar a conexão
// if ($conn->connect_error) {
//     die("Falha na conexão com o banco de dados: " . $conn->connect_error);
// }

// // Informações recebidas do formulário
// $comentario = $_POST['comentario'];
// $idComentario = null; // Variável para armazenar o ID do comentário recém-inserido

// // Inserir o comentário na tabela de comentários
// $sql = "INSERT INTO tbpista (comentario) VALUES ('$comentario')";
// if ($conn->query($sql) === TRUE) {
//     $idComentario = $conn->insert_id; // Obtém o ID do comentário recém-inserido

//     // Relaciona o ID do usuário comum e o ID do comentário
//     $idUsuarioComum = $_SESSION['idUsuarioComum'];
//     $sqlRelacionamentoUsuario = "INSERT INTO tbUsuarioComum_tbPista (idUsuario, idPista) VALUES ('$idUsuarioComum', '$idComentario')";
//     if ($conn->query($sqlRelacionamentoUsuario) === FALSE) {
//         // Erro ao criar o relacionamento entre o usuário comum e o comentário
//         echo "Erro ao criar relacionamento com o usuário comum: " . $conn->error;
//         exit;
//     }

//     // Relaciona o ID do dono da postagem e o ID do comentário
//     $idDonoPostagem = $_SESSION['idDonoPostagem'];
//     $sqlRelacionamentoDono = "INSERT INTO tbDonoPostagem_tbPista (idDonoPostagem, idPista) VALUES ('$idDonoPostagem', '$idComentario')";
//     if ($conn->query($sqlRelacionamentoDono) === FALSE) {
//         // Erro ao criar o relacionamento entre o dono da postagem e o comentário
//         echo "Erro ao criar relacionamento com o dono da postagem: " . $conn->error;
//         exit;
//     }

//     // Comentário adicionado com sucesso
//     echo "Comentário adicionado com sucesso!";
// } else {
//     // Erro ao inserir o comentário
//     echo "Erro ao adicionar o comentário: " . $conn->error;
// }

// // Fecha a conexão com



}
