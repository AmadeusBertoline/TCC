<?php include '../../controller/officer/verify-login-officer.php'?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoridade | Página principal</title>
    <link rel="stylesheet" href="../../assets/css/officer/register-missed.style.css">
    <link rel="stylesheet" href="../../assets/css/officer/global-officer.style.css">
    <script src="../../assets/js/officer/global-officer.script.js" defer></script>
    <script src="../../assets/js/officer/register-missed.script.js" defer></script>
    <script src="https://kit.fontawesome.com/b62fa57115.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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
                              <a href="../officer/register-companion.php">
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
                              <a href="#">
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
                <legend class="register-title">Cadastrar Desaparecido(a):</legend>
                <div class="register">
                    <form class="form-register" action="../../controller/missed/register-missed.php" method="POST" enctype="multipart/form-data">
                      
                      <div class="col">
                        <div class="row">
                          <div class="col">
                              <div class="row">
                                  <span class="upper-title">Dados pessoais</span>
                              </div>
                              <div class="row">
                                  <div class="col">
                                      <label>Nome Completo:</label>
                                      <input type="text" name="txtName">
                                  </div>
                                  <div class="col">
                                      <label>CPF:</label>
                                      <input type="text" name="txtCpf">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row phone-line">
                          <div class="col">
                              <label>Telefone:</label>
                              <input type="text" name="txtPhone">
                          </div>
                          <div class="col">
                              <label>Data de Nascimento:</label>
                              <input type="date" name="txtDateBirth">
                          </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <div class="row">
                                <span class="upper-title">Características</span>
                            </div>
                            <div class="col" id="camposCaracteristica">
                                <div class="row middle-line">
                                    <div class="col">
                                        <label>Característica:</label>
                                        <?php
                                        require_once '../../Global.php';
                                        
                                        try {
                                            $listFeature = FeatureDao::list();
                                        } catch(Exception $e) {
                                            echo '<pre>';
                                                print_r($e);
                                            echo '</pre>';
                                            echo $e->getMessage();
                                        }
                                    ?>
                                    <select id="caracteristica" name="caracteristica[]" class="form-control" style="width:130px; height:30px !important;">
                                                  <option selected>Escolher...</option>
                                                  <?php foreach($listFeature as $feature){ ?>
                                                  <option value="<?php echo $feature['idFeature'];?>">
                                                      <?php echo  $feature['typeFeature'];?>
                                                  </option>
                                                  <?php } ?>
                                              </select>
                                    <script>
                                        $(document).ready(function() {
                                            $('#caracteristica').select2();
                                        });
                                    </script>
                                    </div>
                                    <div class="col">
                                        <label>Descrição:</label>
                                        <input type="text" name="descricao[]" style=" height:26px !important; border-radius: 4px; border: 1px solid rgb(150, 150, 150);">
                                    </div>  
                                </div>
                            </div>
                            <div class="row button-container">
                              <div class="col">
                                <div class="row button-content">
                                  <button id="btnAddCaracteristica" class="neutral-button" type="button">Adicionar</button>
                                  <button id="btnRemoverCaracteristica" class="red-button" type="button">Remover</button>
                                </div>
                              </div>
                          </div>
                        </div>
                    </div>
                  <div class="row">
                    <div class="col">
                        <div class="row">
                            <span class="upper-title">Motivos do desaparecimento (possíveis)</span>
                        </div>
                        <div class="col" id="camposMotivo">
                            <div class="row middle-line">
                                <div class="col">
                                    <label>Assunto:</label>
                                    <input type="text" name="tipoMotivo[]">
                                </div>
                                <div class="col">
                                    <label>Descrição:</label>
                                    <input type="text" name="motivo[]">
                                </div>  
                            </div>
                        </div>
                        <div class="row button-container">
                          <div class="col">
                            <div class="row button-content">
                              <button id="btnAddMotivo" class="neutral-button" type="button">Adicionar</button>
                              <button id="btnRemoverMotivo" class="red-button" type="button">Remover</button>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col">
                      <div class="row">
                          <span class="upper-title">Último lugar visto</span>
                      </div>
                      <div class="col">
                          <label>CEP:</label>
                          <input type="text" name="txtCep">
                      </div>
                  </div>
                </div>
                <div class="row city-line-one">
                    <div class="col">
                        <label>Rua:</label>
                        <input type="text" name="txtStreet">
                    </div>
                    <div class="col">
                        <label>Data de desaparecimento:</label>
                        <input type="date" name="txtDateDisappearance">
                    </div>
                    <div class="col">
                        <label>Horário:</label>
                      <input type="time" name="txtHourDisappearance">
                    </div>
                    <div class="col">
                        <label>Bairro:</label>
                        <input type="text" name="txtNeighborhood">
                    </div>
                    <div class="col">
                        <label>N° Rua:</label>
                        <input type="number" name="txtNumberStreet">
                    </div>
                </div>
                <div class="row city-line-two">
                    <div class="col">
                      <label>Referência:</label>
                      <input type="text" name="txtReference">
                    </div>
                    <div class="col">
                        <label>Estado:</label>
                        <select name="txtState" id="states">
                              <option selected style="display:none;">Estado</option>
                              <option value="AC">Acre</option>
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
                            <select id="cities" name="txtCity">
                              <option selected>Escolha um estado</option>
                            </select>
                        </div>
                    </div>
                </div>
                  </div>
                  <div class="row side">
                      <div class="col">
                        <div class="row">
                            <span class="upper-title">Referencial</span>
                        </div>

                        <div class="row company-line">
                            <div class="col">
                              <label for="">Acompanhante:</label>
                              <?php
                                  require_once '../../Global.php';
                                  
                                  try {
                                      $listCompanion = CompanionDao::list();
                                  } catch(Exception $e) {
                                      // echo '<pre>';
                                      //     print_r($e);
                                      // echo '</pre>';
                                      // echo $e->getMessage();
                                  }
                              ?>
                              <select id="acompanhante" name="txtCompanion" class="form-control">
                                            <option selected>Escolher...</option>
                                            <?php foreach($listCompanion as $companion){ ?>
                                            <option value="<?php echo $companion['idCompanion'];?>">
                                                <?php echo  $companion['nameCompanion'];?> |<?php echo  $companion['cpfCompanion'];?>
                                            </option>
                                            <?php } ?>
                                        </select>
                              <script>
                                  $(document).ready(function() {
                                      $('#acompanhante').select2();
                                  });
                              </script>
                            </div>
                          </div>

                        <div class="col">
                          <div class="row">
                              <span class="upper-title">Foto desaparecido</span>
                          </div>
                          <div class="row picture-line">
                            <div class="col">
                              <label for="inputPic">Desaparecido: </label>
                              <div>
                                  <div class="custom-file">
                                      <input type="file" accept="image/*" class="custom-file-input" id="picture" name="txtPicturePath" aria-describedby="inputGroupFile01" onchange="loadFile(event)">
                                  </div>
                              </div>
                              <div style="height:350px; width: 96%; border: 1px solid rgb(196, 196, 196);">
                                <div class="card" style="width: 18rem; margin: 0 auto 0 auto;">
                                        <img id="output" class="img-input" style="height:180px; background-color: aqua;"/>
                                    </div>
                                    <script>
                                        var loadFile = function(event) {
                                            var output = document.getElementById('output');
                                            output.src = URL.createObjectURL(event.target.files[0]);
                                            output.onload = function() {
                                            URL.revokeObjectURL(output.src) // free memory
                                            }
                                        };
                                </script>   
                            </div>   
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="row button-line">
                          <button class="red-button" type="reset">Limpar</button>
                          <button class="green-button" type="submit">Cadastrar</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
            </fieldset>
        </section>
    </main>
    <script>
  <?php
    require_once '../../Global.php';

    try {
      $listFeature = FeatureDao::list();
    } catch(Exception $e) {
      echo 'console.error("' . addslashes($e->getMessage()) . '");';
    }
  ?>
  
  var listFeature = <?php echo json_encode($listFeature); ?>;
</script>

</body>
</html>