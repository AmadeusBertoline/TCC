<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/user/cadastro-usuario.css">
    <script src="../../assets/js/user/cep-autocomplete.js" defer></script>
    <link rel="icon" href="../../assets/ico/feed/browser_logo.png">
    <title>Cadastro - Usuario</title>
</head>

<body>
    
    <!-- Modal Message-->
    <div id="fade" class="hide">

      <div id="loader" class="spinner-border text-info hide" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>

      <div id="message" class="hide">
        <div class="alert alert-light" role="alert">
          <h4>Mensagem:</h4>
          <p></p>
          <button id="close-message" type="button" class="btn-modal">
            Fechar
          </button>
        </div>
      </div>

    </div>
    <!-- End modal message -->
    <div id="container">
        <div class="left-side">

            <div class="top-form">
                <div class="logotipo">
                    <img src="../../assets/img/user/logo.png" alt="logo">
                    <h1>Anjos Perdidos</h1>
                </div>
                <h1>Cadastre-se</h1>

            </div>
            <form method="post" action="../../controller/user/cadastra-usuario.php" id="address-form">
                <div class="left-form">
                    <input placeholder="Nome" name="nome" class="input-text" required type="text">
                    <input placeholder="Nascimento" name="nascimento" class="input-text" required type="date">
                    <input placeholder="Email" name="email" class="input-text" required type="email">
                    <input placeholder="CEP" id="cep" name="cep" class="input-text" required type="number">
                    <input placeholder="Estado" id="region" name="estado" class="input-text" required type="text">
                    <input placeholder="Cidade" id="city" name="cidade" class="input-text" required type="text">
                    <input placeholder="Bairro" id="neighborhood" name="bairro" class="input-text" required type="text">
                </div>
                <div class="right-form">
                    <input placeholder="Logradouro" id="address" name="logradouro" class="input-text" required type="text">
                    <input placeholder="Número" name="numero" class="input-text" required type="number">
                    <input placeholder="Complemento" name="complemento" class="input-text" type="text">
                    <input placeholder="CPF" name="cpf" class="input-text" required type="text">
                    <input placeholder="Senha" name="password" class="input-text" required type="password">
                    <input placeholder="Confirme sua senha" name="confirm-password" class="input-text" required type="password">
                </div>
                <div class="bottom-form">
                    <input class="submit" type="submit" value="Cadastrar">
                    <div class="form-bottom">
                        <label for="">Já possui uma conta ?</label>
                        <a class="entrar" href="../../view/user/index.php">Entrar</a>
                        <!-- <input class="entrar" type="submit" value="Entrar"> -->
                    </div>
                </div>
            </form>

        </div>

        <div class="right-side">
            <div class="image"></div>
        </div>
    </div>
</body>

</html>