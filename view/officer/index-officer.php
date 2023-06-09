<?php include '../../controller/officer/verify-login-officer.php'?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoridade | Página principal</title>
    <link rel="stylesheet" href="../../assets/css/officer/index-officer.style.css">
    <link rel="stylesheet" href="../../assets/css/officer/global-officer.style.css">
    <script src="../../assets/js/officer/global-officer.script.js" defer></script>
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
          <div class="header-option">
            
          </div>
        </section>
    </main>



</body>
</html>