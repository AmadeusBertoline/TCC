<?php
if (!isset($_SESSION)) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/feed/settings-userCommon.style.css">
    <link rel="icon" href="../../assets/ico/feed/browser_logo.png">
    <title>Atualização de dados</title>
</head>

<body>
    <div id="container">
        <div class="dados">
            <h1>Meus Dados</h1>
            <p>
                <label for="">Email</label>
                <span>aqui vai o email</span>
            </p>
            <p>
                <label for="">Senha</label>
                <span>aqui vai a senha</span>
            </p>

        </div>
        <!-- Modal de editar -->
        <!-- <div class="configs">
            <form action="" method="post">
                <h1>Edite seus dados</h1>
                <input maxlength="40" placeholder="Novo email..." type="text">
                <input maxlength="40" placeholder="Nova senha..." type="text">
                <input maxlength="40" placeholder="Confirme sua senha..." type="text">
                <input maxlength="40" class="submit" type="submit" value="Salvar">
            </form>
        </div> -->
        <!-- Fim do modal editar -->
    </div>
</body>

</html>