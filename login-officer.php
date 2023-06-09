<?php include './controller/officer/redirect-login-officer.php' ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Gestão Policial</title>
    <link rel="stylesheet" href="./assets/css/officer/login-officer.style.css">
    <link rel="stylesheet" href="./assets/css/officer/global-officer.style.css">
    <script src="./assets/js/global-officer.script.js" defer></script>

</head>
<body>
    <div class="main-login">
        <div class="box-login">
            <div class="row login-title">
                <h1>Login</h1>
            </div>
            <form class="form-login" method="POST" action="./controller/officer/login-officer.php">
                <div class="row">
                    <div class="col">
                        <label>CPF:</label>
                        <input type="text" name="txtCpf">
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
                        <span>Faça login como <a href="./login-secretary.php">Secretaria</a></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>