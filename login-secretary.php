<?php include './controller/secretary/redirect-login-secretary.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Gestão Policial</title>
    <link rel="stylesheet" href="./assets/css/secretary/login-secretary.style.css">
    <link rel="stylesheet" href="./assets/css/secretary/global-secretary.style.css">
    <script src="./assets/js/global-secretary.script.js" defer></script>

</head>
<body>
    <div class="main-login">
        <div class="box-login">
            <div class="row login-title">
                <h1>Login</h1>
            </div>
            <form class="form-login" method="POST" action="./controller/secretary/login-secretary.php">
                <div class="row">
                    <div class="col">
                        <label>Username:</label>
                        <input type="text" name="txtUsername">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label>Senha:</label>
                        <input type="text" name="txtPassword">
                    </div>
                </div>
                <div class="row button-line">
                    <div class="col button-column">
                        <button >Entrar</button>
                    </div>
                </div>
                <div class="row line-login">
                    <div class="col">
                        <span>Faça login como <a href="./login-officer.php">Autoridade</a></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>