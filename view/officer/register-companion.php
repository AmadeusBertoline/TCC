<?php include '../../controller/officer/verify-login-officer.php'?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoridade | Página principal</title>
    <link rel="stylesheet" href="../../assets/css/officer/register-companion.style.css">
    <link rel="stylesheet" href="../../assets/css/officer/global-officer.style.css">
    <script src="../../assets/js/officer/formMask.script.js" defer></script>
    <script src="../../assets/js/officer/global-officer.script.js" defer></script>
    <script src="../../assets/js/officer/register-companion.script.js" defer></script>
    <script src="https://kit.fontawesome.com/b62fa57115.js" crossorigin="anonymous" defer></script>
</head>
<body>
    <header class="header-officer">
        <div class="inner-header">
            <div class="department-container">
                <img src="../../assets/img/officer/logo-departament.svg" alt="logo departamento">
                <div class="department-title">
                    <h1>Autoridade Policial - <span>AP</span></h1>
                    <h2><span>Policial Civil</span> do Estado de São Paulo</h2>
                </div>
            </div>
            <div class="info-container">
                <div class="info">
                    <p>Rua Feliciano de Mendonça, n120 2BTM</p>
                    <p>(+55) 11 94002-8922</p>
                    <p>btm120@pcsp.com</p>
                </div>
                <button class="log-out" id="log-out-btn">Sair</button>
                <!-- modal logout -->
                <div class="modal-container" id="modal-container">
                  <div class="modal">
                    <h2>Logout</h2>
                    <p>Certeza que deseja sair?</p>
                    <div class="modal-buttons">
                      <form action="../../controller/officer/logout-officer.php">
                        <button type="button" class="neutral-button" id="cancel-btn">Cancelar</button>
                        <button class="red-button" id="confirm-btn">Confirmar</button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main-officer">
        <aside class="side-bar">
            <fieldset class="officer-data">
                <legend class="officer-data-title">Policial:</legend>
                <label>ID: <span>8291</span></label>
                <label>Nome: <span>Jean Charles</span></label>
                <label>CPF: <span>111.222.333-96</span></label>
                <label>Data de Nascimento: <span>25/08/2000</span></label>
            </fieldset>
            <div class="system-ap">
                SISTEMA - AP
            </div>
            <nav class="navigation">
              <ul class="nav-list">
                <li class="nav-item">
                  <h2 class="accordion-header">
                    <i class="fa-solid fa-caret-right arrow"></i>
                    <i class="fa-solid fa-bars"></i>
                    Cabeçalho 
                  </h2>
                  <div class="accordion-content">
                    <div class="content">
                      <a href="./index-officer.php">
                        <h4>
                          <i class="fa-solid fa-house icon"></i>
                          Menu
                        </h4>
                      </a>
                    </div>
                    <div class="content">
                      <a href="#">
                        <h4>
                          <i class="fa-solid fa-chart-simple icon"></i>
                          Dashboard
                        </h4>
                      </a>
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <h2 class="accordion-header">
                    <i class="fa-solid fa-caret-right arrow"></i>
                    <i class="fa-solid fa-book"></i>
                    Ocorrência
                  </h2>
                  <div class="accordion-content">
                    <div class="content">
                      <ul class="nav-list">
                        <li class="nav-item">
                          <h3 class="accordion-header">
                            <i class="fa-solid fa-caret-right arrow"></i>
                            <i class="fa-solid fa-users"></i>
                            Acompanhante
                          </h3>
                          <div class="accordion-content">
                            <div class="content">
                              <a href="./register-companion.php">
                                <h4>
                                  <i class="fa-solid fa-pen icon"></i>
                                  Cadastrar
                                </h4>
                              </a>
                            </div>
                            <div class="content">
                              <a href="./search-companion.php">
                                <h4>
                                  <i class="fa-solid fa-magnifying-glass icon"></i>
                                  Pesquisar
                                </h4>
                              </a>
                            </div>
                          </div>
                        </li>
                        <li class="nav-item">
                          <h3 class="accordion-header">
                            <i class="fa-solid fa-caret-right arrow"></i>
                            <i class="fa-solid fa-user"></i>
                            Desaparecido
                          </h3>
                          <div class="accordion-content">
                            <div class="content">
                              <a href="./register-missed.php">
                                <h4>
                                  <i class="fa-solid fa-pen icon"></i>
                                  Cadastrar
                                </h4>
                              </a>
                            </div>
                            <div class="content">
                              <a href="./search-missed.php">
                                <h4>
                                  <i class="fa-solid fa-magnifying-glass icon"></i>
                                  Pesquisar
                                </h4>
                              </a>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
            </nav> 
        </aside>
        <!-- main Content -->
        <section class="content-officer">
            <fieldset class="register-content">
                <legend class="register-title">Cadastrar Acompanhante:</legend>
                <div class="register">
                  <form id="formId" class="form-register" action="../../controller/companion/register-companion.php" method="POST">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <span class="upper-title">Dados pessoais</span>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label>Nome Completo:</label>
                                    <input type="text" id="txtName" name="txtName"  value="<?php echo isset($_SESSION['form_values']['txtName']) ? $_SESSION['form_values']['txtName'] : ''; ?>" required>
                                </div>
                                <div class="col">
                                    <label>CPF:</label>
                                    <input type="text" id="txtCpf" name="txtCpf" value="<?php echo isset($_SESSION['form_values']['txtCpf']) ? $_SESSION['form_values']['txtCpf'] : ''; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Telefone:</label>
                            <input type="text" id="txtPhone" name="txtPhone" value="<?php echo isset($_SESSION['form_values']['txtPhone']) ? $_SESSION['form_values']['txtPhone'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <span class="upper-title">Localização</span>
                            </div>
                            <div class="col">
                                <label>CEP:</label>
                                <input maxlenght="9" type="text" id="txtCep" name="txtCep" value="<?php echo isset($_SESSION['form_values']['txtCep']) ? $_SESSION['form_values']['txtCep'] : ''; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Rua:</label>
                            <input type="text" id="txtStreet" name="txtStreet" value="<?php echo isset($_SESSION['form_values']['txtStreet']) ? $_SESSION['form_values']['txtStreet'] : ''; ?>" required>
                        </div>
                        <div class="col">
                            <label>Bairro:</label>
                            <input type="text" id="txtNeighborhood" name="txtNeighborhood" value="<?php echo isset($_SESSION['form_values']['txtNeighborhood']) ? $_SESSION['form_values']['txtNeighborhood'] : ''; ?>" required>
                        </div>
                        <div class="col">
                            <label>N° Rua:</label>
                            <input type="number" name="txtNumberStreet" value="<?php echo isset($_SESSION['form_values']['txtNumberStreet']) ? $_SESSION['form_values']['txtNumberStreet'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                          <label>Complemento:</label>
                          <input type="text" id="txtComplement" name="txtComplement" value="<?php echo isset($_SESSION['form_values']['txtComplement']) ? $_SESSION['form_values']['txtComplement'] : ''; ?>">
                        </div>
                        <div class="col">
                            <label>Estado:</label>
                            <select name="txtState" id="states" required>
                              <option value="" selected>Escolher...</option>
                              <option value="AC" >Acre</option>
                              <option value="AL">Alagoas</option>
                              <option value="AP">Amapá</option>
                              <option value="AM">Amazonas</option>
                              <option value="BA">Bahia</option>
                              <option value="CE">Ceará</option>
                              <option value="DF">Distrito Federal</option>
                              <option value="ES">Espírito Santo</option>
                              <option value="GO">Goiás</option>
                              <option value="MA">Maranhão</option>
                              <option value="MT">Mato Grosso</option>
                              <option value="MS">Mato Grosso do Sul</option>
                              <option value="MG">Minas Gerais</option>
                              <option value="PA">Pará</option>
                              <option value="PB">Paraíba</option>
                              <option value="PR">Paraná</option>
                              <option value="PE">Pernambuco</option>
                              <option value="PI">Piauí</option>
                              <option value="RJ">Rio de Janeiro</option>
                              <option value="RN">Rio Grande do Norte</option>
                              <option value="RS">Rio Grande do Sul</option>
                              <option value="RO">Rondônia</option>
                              <option value="RR">Roraima</option>
                              <option value="SC">Santa Catarina</option>
                              <option value="SP">São Paulo</option>
                              <option value="SE">Sergipe</option>
                              <option value="TO">Tocantins</option>
                            </select>
                        </div>
                        <div class="col"  id="wrapper-cities">
                            <label>Cidade:</label>
                            <input type="text" id="txtCity" name="txtCity" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span class="upper-title">Dados de acesso</span>
                            <div class="row">
                                <div class="col">
                                    <label>Email:</label>
                                    <input type="email" name="txtEmail" value="<?php echo isset($_SESSION['form_values']['txtEmail']) ? $_SESSION['form_values']['txtEmail'] : ''; ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <label>Senha:</label>
                        <input type="password" name="txtPassword" value="<?php echo isset($_SESSION['form_values']['txtPassword']) ? $_SESSION['form_values']['txtPassword'] : ''; ?>" required>
                      </div>
                      <div class="col">
                        <label>Confirmar Senha</label>
                        <input type="password" name="txtConfirmPassword" value="<?php echo isset($_SESSION['form_values']['txtConfirmPassword']) ? $_SESSION['form_values']['txtConfirmPassword'] : ''; ?>" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <button class="red-button" type="reset" onclick="resetForm()">Limpar</button>
                        <script>
                          function resetForm() {
                            var form = document.getElementById("formId");
                            var inputs = form.getElementsByTagName("input");

                            for (var i = 0; i < inputs.length; i++) {
                              inputs[i].value = "";
                            }

                            <?php unset($_SESSION['form_values']); ?>
                          }
                        </script>
                        </script>
                      </div>
                      <div class="col">
                        <button class="green-button" type="submit">Cadastrar</button>
                      </div>
                    </div>
                </form>
                <div class="generator">
                  <div class="row side">
                    <div class="col">
                      <div class="row">
                        <span class="upper-title">Gerador de Senhas Aleatórias</span><br>
                      </div>
                      <div class="row side">
                        <div class="col lengthPassword ">
                          <label for="length">Comprimento da senha:</label>
                          <input type="number" id="length" name="length" min="1" max="12" value="12">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col passwordGenerated">
                          <label>Senha Gerada:</label>
                          <input type="text" id="password" name="password" readonly>
                        </div>
                      </div>
                      <div class="row">
                        <button class="neutral-button" onclick="generatePassword()">Gerar senha</button>
                        <button class="green-button" onclick="copyToClipboard()">Copiar senha</button> 
                      </div>
                    </div>
                  </div>
                  <script>
                    function generatePassword() {
                      var length = document.getElementById("length").value;
                      var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+";
                      var password = "";
                      for (var i = 0; i < length; i++) {
                        password += characters.charAt(Math.floor(Math.random() * characters.length));
                      }
                      document.getElementById("password").value = password;
                    }
                    
                    function copyToClipboard() {
                      var passwordInput = document.getElementById("password");
                      passwordInput.select();
                      document.execCommand("copy");
                      alert("Senha copiada para a área de transferência!");
                    }
                  </script>
                </div>
                </div>
            </fieldset>
        </section>
    </main>
</body>
</html>
<?php 
  unset($_SESSION['form_values']);
?>