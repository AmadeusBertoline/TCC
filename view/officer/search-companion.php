<?php include '../../controller/officer/verify-login-officer.php'?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autoridade | Página principal</title>
    <link rel="stylesheet" href="../../assets/css/officer/search-companion.style.css">
    <link rel="stylesheet" href="../../assets/css/officer/global-officer.style.css">
    <script src="../../assets/js/officer/formMask.script.js" defer></script>
    <script src="../../assets/js/officer/global-officer.script.js" defer></script>
    <script src="../../assets/js/officer/search-companion.script.js" defer></script>
    <script src="https://kit.fontawesome.com/b62fa57115.js" crossorigin="anonymous" defer></script>
</head>
<body>
    <!-- Modal delete -->
    <div id="deleteModal" class="deleteModal">
      <div class="deleteModal-content">
        <div class="delete-header">
          <h3>Confirmar</h3>
          <p>Deseja deletar este acompanhante?</p>
        </div>
        <form id="deleteForm" method="post" action="../../controller/companion/delete-companion.php">
          <input type="hidden" id="companionId" name="companionId" value="">
          <button type="button" class="close neutral-button" onclick="closeModalDelete()">Cancelar</button>
          <button type="submit" class="red-button">Excluir</button>
        </form>
      </div>
    </div>

 


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
            <fieldset class="search-content">
                <legend class="search-title">Pesquisar Acompanhante:</legend>
                <div class="query-container">
                    <div class="query">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" placeholder="Pesquisar..." name="txtQuery" id="query" onkeyup="filterTable()">
                    </div>
                </div>
                <?php   
                  require_once '../../Global.php';
                  try {
                    $listCompanion = CompanionDao::list();
                  } catch(Exception $e) {
                      echo '<pre>';
                          print_r($e);
                      echo '</pre>';
                      echo $e->getMessage();
                  }
                 ?>
                <div class="table-container">
                    <table>
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Qtd Acompanhante</th>
                            <th>Editar</th>
                            <th>Deletar</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($listCompanion as $companion): ?>
                            <tr>
                              <td><?php echo $companion['idCompanion']; ?></td>
                              <td><?php echo $companion['nameCompanion']; ?></td>
                              <td><?php echo $companion['cpfCompanion']; ?></td>
                              <td><?php echo $companion['missedCount']; ?>
                              <td><button class="orange-button update-button-open" data-id="<?php echo $companion['idCompanion']; ?>">Editar</button></td>
                              <td><button class="red-button" data-id="<?php echo $companion['idCompanion']; ?>" onclick="openModalDelete(this)">Deletar</button></td>
                            </tr>
                        <!-- Modal edit -->
                        <div  class="updateModal">
                        <div class="updateModal-content">
                          <fieldset class="register-content">
                                  <legend class="register-title">Editar Acompanhante:</legend>
                                  <div class="register">
                                    <form class="form-update" action="../../controller/companion/update-companion.php" method="POST">
                                      <div class="row">
                                          <div class="col">
                                              <div class="row">
                                                  <span class="upper-title">Dados pessoais</span>
                                              </div>
                                              <div class="row name-line">
                                                  <div class="col">
                                                      <label>Nome Completo:</label>
                                                      <input required type="text" id="txtName" name="txtName"  value="<?php echo( $companion['nameCompanion']);?>">
                                                  </div>
                                                  <div class="col">
                                                      <label>CPF:</label>
                                                      <input required type="text" id="txtCpf" name="txtCpf"  value="<?php echo( $companion['cpfCompanion']);?>">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col">
                                              <label>Telefone:</label>
                                              <input required type="text" id="txtPhone" name="txtPhone" value="<?php echo( $companion['phoneCompanion']);  ?>" >
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col">
                                              <div class="row">
                                                  <span class="upper-title">Localização</span>
                                              </div>
                                              <div class="col">
                                                  <label>CEP:</label>
                                                  <input required maxlength="9" type="text" id="txtCep" name="txtCep" value="<?php echo( $companion['cepCompanion']); ?>" >
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row city-line">
                                          <div class="col">
                                              <label>Rua:</label>
                                              <input required type="text" id="txtStreet" name="txtStreet" value="<?php echo( $companion['streetCompanion']); ?>" >
                                          </div>
                                          <div class="col">
                                              <label>Bairro:</label>
                                              <input required type="text" id="txtNeighborhood" name="txtNeighborhood" value="<?php echo( $companion['neighborhoodCompanion']); ?>">
                                          </div>
                                          <div class="col">
                                              <label>N° Rua:</label>
                                              <input required type="number" name="txtNumberStreet" value="<?php echo( $companion['numberStreetCompanion']); ?>" >
                                          </div>
                                      </div>
                                      <div class="row city-line">
                                          <div class="col">
                                            <label>Complemento:</label>
                                            <input required type="text" id="txtComplement" name="txtComplement" value="<?php echo( $companion['complementCompanion']); ?>">
                                          </div>
                                          <div class="col">
                                              <label>Estado:</label>
                                              <select required name="txtState" id="states">
                                          <option value="" selected>Escolher...</option>
                                          <option value="AC"<?php echo ($companion['stateCompanion'] == 'AC') ? ' selected' : ''; ?>>Acre</option>
                                          <option value="AL"<?php echo ($companion['stateCompanion'] == 'AL') ? ' selected' : ''; ?>>Alagoas</option>
                                          <option value="AP"<?php echo ($companion['stateCompanion'] == 'AP') ? ' selected' : ''; ?>>Amapá</option>
                                          <option value="AM"<?php echo ($companion['stateCompanion'] == 'AM') ? ' selected' : ''; ?>>Amazonas</option>
                                          <option value="BA"<?php echo ($companion['stateCompanion'] == 'BA') ? ' selected' : ''; ?>>Bahia</option>
                                          <option value="CE"<?php echo ($companion['stateCompanion'] == 'CE') ? ' selected' : ''; ?>>Ceará</option>
                                          <option value="DF"<?php echo ($companion['stateCompanion'] == 'DF') ? ' selected' : ''; ?>>Distrito Federal</option>
                                          <option value="ES"<?php echo ($companion['stateCompanion'] == 'ES') ? ' selected' : ''; ?>>Espírito Santo</option>
                                          <option value="GO"<?php echo ($companion['stateCompanion'] == 'GO') ? ' selected' : ''; ?>>Goiás</option>
                                          <option value="MA"<?php echo ($companion['stateCompanion'] == 'MA') ? ' selected' : ''; ?>>Maranhão</option>
                                          <option value="MT"<?php echo ($companion['stateCompanion'] == 'MT') ? ' selected' : ''; ?>>Mato Grosso</option>
                                          <option value="MS"<?php echo ($companion['stateCompanion'] == 'MS') ? ' selected' : ''; ?>>Mato Grosso do Sul</option>
                                          <option value="MG"<?php echo ($companion['stateCompanion'] == 'MG') ? ' selected' : ''; ?>>Minas Gerais</option>
                                          <option value="PA"<?php echo ($companion['stateCompanion'] == 'PA') ? ' selected' : ''; ?>>Pará</option>
                                          <option value="PB"<?php echo ($companion['stateCompanion'] == 'PB') ? ' selected' : ''; ?>>Paraíba</option>
                                          <option value="PR"<?php echo ($companion['stateCompanion'] == 'PR') ? ' selected' : ''; ?>>Paraná</option>
                                          <option value="PE"<?php echo ($companion['stateCompanion'] == 'PE') ? ' selected' : ''; ?>>Pernambuco</option>
                                          <option value="PI"<?php echo ($companion['stateCompanion'] == 'PI') ? ' selected' : ''; ?>>Piauí</option>
                                          <option value="RJ"<?php echo ($companion['stateCompanion'] == 'RJ') ? ' selected' : ''; ?>>Rio de Janeiro</option>
                                          <option value="RN"<?php echo ($companion['stateCompanion'] == 'RN') ? ' selected' : ''; ?>>Rio Grande do Norte</option>
                                          <option value="RS"<?php echo ($companion['stateCompanion'] == 'RS') ? ' selected' : ''; ?>>Rio Grande do Sul</option>
                                          <option value="RO"<?php echo ($companion['stateCompanion'] == 'RO') ? ' selected' : ''; ?>>Rondônia</option>
                                          <option value="RR"<?php echo ($companion['stateCompanion'] == 'RR') ? ' selected' : ''; ?>>Roraima</option>
                                          <option value="SC"<?php echo ($companion['stateCompanion'] == 'SC') ? ' selected' : ''; ?>>Santa Catarina</option>
                                          <option value="SP"<?php echo ($companion['stateCompanion'] == 'SP') ? ' selected' : ''; ?>>São Paulo</option>
                                          <option value="SE"<?php echo ($companion['stateCompanion'] == 'SE') ? ' selected' : ''; ?>>Sergipe</option>
                                          <option value="TO"<?php echo ($companion['stateCompanion'] == 'TO') ? ' selected' : ''; ?>>Tocantins</option>
                                        </select>

                                          </div>
                                          <div class="col"  id="wrapper-cities">
                                              <label>Cidade:</label>
                                              <input required type="text" id="txtCity" name="txtCity" value="<?php echo( $companion['cityCompanion']); ?>" maxlength="14">
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col">
                                              <span class="upper-title">Dados de acesso</span>
                                              <div class="row">
                                                  <div class="col">
                                                      <label>Email:</label>
                                                      <input required type="email" name="txtEmail" value="<?php echo( $companion['emailCompanion']); ?>" >
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="row pass-line">
                                        <div class="col">
                                          <label>Senha:</label>
                                          <input required type="password" name="txtPassword" value="<?php echo( $companion['passwordCompanion']); ?>" >
                                        </div>
                                        <div class="col">
                                          <label>Confirmar Senha</label>
                                          <input required type="password" name="txtConfirmPassword" value="<?php echo( $companion['passwordCompanion']); ?>" >
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col">
                                          <input type="hidden" name="idCompanion" value="<?php echo($companion['idCompanion']); ?>">
                                        </div>
                                      </div>
                                      <div class="button-line">
                                        <div class="column-button">
                                          <button class="neutral-button button update-button-close" type="button">Fechar</button>
                                          <button class="red-button button" type="reset">Limpar</button>
                                          <button class="green-button button" type="submit">Editar</button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                              </fieldset>
                        </div>
                      </div>
                          <?php endforeach; ?>
                        </tbody>
                      </table>    
                      <script>
                        function openModalDelete(button) {
                          var modal = document.getElementById("deleteModal");
                          var companionId = button.getAttribute("data-id");
                          document.getElementById("companionId").value = companionId; // Define o valor do ID do usuário no campo oculto do formulário
                          modal.style.display = "block";
                        }

                        function closeModalDelete() {
                          var modal = document.getElementById("deleteModal");
                          modal.style.display = "none";
                        }
                        

                        function filterTable() {
                          var input = document.getElementById("query");
                          var filter = input.value.toUpperCase();
                          var table = document.querySelector("table");
                          var rows = table.getElementsByTagName("tr");

                          // Percorre todas as linhas da tabela e mostra apenas aquelas que correspondem à pesquisa
                          for (var i = 0; i < rows.length; i++) {
                            var columns = rows[i].getElementsByTagName("td");
                            var display = false;

                            for (var j = 0; j < columns.length; j++) {
                              var cell = columns[j];
                              if (cell) {
                                var text = cell.textContent || cell.innerText;
                                if (text.toUpperCase().indexOf(filter) > -1) {
                                  display = true;
                                  break;
                                }
                              }
                            }

                            rows[i].style.display = display ? "" : "none";
                          }
                        }
                      </script>
                  
                </div>
            </fieldset>
        </section>
    </main>
</body>
</html>
<?php 
  unset($_SESSION['form_values']);
?>

