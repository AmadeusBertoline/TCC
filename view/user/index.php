<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/user/login-usuario.css">
    <script type="text/javascript" src="../../assets/js/user/login-secretaria.js" defer></script>
    <script type="text/javascript" src="../../assets/js/user/error-login.js" defer></script>
    <link rel="icon" href="../../assets/ico/feed/browser_logo.png">
    <title>Login - Usuário Comum</title>
</head>

<body>
    <div id="container">
        <div class="side-left">

            <div class="logotipo">
                <img src="../../assets/img/user/logo.png" alt="logo">
                <h1>Anjos Perdidos</h1>
            </div>

            <form method="post" action="../../controller/user/login-usuario.php">

                <h1>Faça seu login</h1>

                <div class="checkboxes">
                    <label class="label-name" for="">Sou Familiar</label>
                    <input class="checkbox-familiar checkbox-familiar--shadow" type="checkbox" name="familiar" id="familiar">
                    <label for="familiar"></label>
                </div>

                <input class="input-text" placeholder="CPF" type="text" name="cpf" id="" maxlength="14" required>
                <div class="password-div">
                    <input class="input-text-password" placeholder="Senha" type="password" name="password" id="password" maxlength="30" required>
                    <img onclick="eyeClick()" width="20px" src="../../assets/img/user/olho.png" id="eyeSvg" alt="">
                </div>
                <div class="eye-div">
                </div>
                <input class="submit" type="submit" value="Entrar">

                <div class="form-bottom">
                    <p>Esqueci minha senha</p>
                    <div class="cadastre-se">
                        <label for="">Não possui uma conta ?</label>
                        <a href="./register-user.php"><input class="cadastre-se-button" type="button" value="Cadastre-se"></a>
                    </div>
                </div>
            </form>

        </div>
        <div class="side-right">
            <div class="image"></div>
        </div>

    </div>
</body>

</html>