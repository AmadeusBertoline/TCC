<?php 
    include '../../controller/secretary/verify-login-secretary.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secretaria Pública | Autoridade </title>
    <link rel="stylesheet" href="../../assets/css/secretary/register-officer.style.css">
    <link rel="stylesheet" href="../../assets/css/secretary/global.style.css">
    <link rel="shortcut icon" href="../../assets/img/secretary/logo-firelook.png" type="image/x-png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="../../assets/js/secretary/formMask.script.js" defer></script>
    <script src="https://kit.fontawesome.com/b62fa57115.js" crossorigin="anonymous" defer></script>
    <script src="../../assets/js/secretary/register-officer.script.js" defer></script>
    <script src="../../assets/js/secretary/global.script.js" defer></script>

</head>
<body>

    <!-- Header -->
    <header class="row">
        <div class="title-container">
            <h1>
                <?php
                    $name = $_SESSION['name-secretary'];
                    if(isset($_SESSION['id-secretary'])){
                        echo($name);
                    }
                ?>
            </h1>
        </div>
        <div class="config-container row">
            <a href="#" class="link-icon" id="logout">
                <i class="fa-solid fa-arrow-right-from-bracket fa-xl"></i>
            </a>
        </div>
    </header>


    <!-- Side--Bar -->
    <aside class="side-bar">
        <nav>
            <div class="logo-container">
                <!-- Linkar ao banco a imagem da secretária e o nome -->
                <img src="<?php
                    $logo = $_SESSION['logo-secretary'];
                    if(isset($_SESSION['logo-secretary'])){
                        echo($logo); 
                    }
                ?>" alt="logo" class="image-logo">
            </div>
            
            <div class="dashboard-container">
                <div class="dashboard-background" id="dashboard-background">
                    <a href="./index-secretary.php">Dashboard</a>
                </div>
            </div>

            <ul class="option-wrapper col">
                <div class="option-background" id="user-background">
                    <li class="option-container">
                        <a href="./register-user.php" class="option-links row" id="user-link">
                            Usuário
                        </a>
                    </li>
                </div>

                <div class="option-background" id="officer-background">
                    <li class="option-container">
                        <a href="./register-officer.php" class="option-links row" id="officer-link">
                            Autoridade
                        </a>
                    </li>
                </div>  

                <div class="option-background" id="missing-background">
                    <li class="option-container">
                        <a href="#" class="option-links row" id="missing-link">
                            Desaparecido
                        </a>
                    </li>
                </div>
            </ul>
        </nav>
    </aside>

    <!-- Main -->
    <main>

        <section class="listing-wrapper">
            <article>
                <h1 class="title-page">
                    Listagem Autoridade
                </h1>
            </article>
            <article class="list-wrapper col">
                <div class="search-wrapper">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Pesquisar..." class="input" name="txtQuery" id="query" onkeyup="filterTable()">
                </div>
                <div class="add-wrapper">
                    <a href="#" id="add">+adicionar autoridade</a>
                </div>
                <?php   
                  require_once '../../Global.php';
                  try {
                      $listUser = OfficerDao::list();
                  } catch(Exception $e) {
                      echo '<pre>';
                          print_r($e);
                      echo '</pre>';
                      echo $e->getMessage();
                  }
                 ?>
                <table class="table-list">
                    <tr class="title-col">
                        <th>id</th>
                        <th>nome</th>
                        <th>CPF</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                    <?php foreach ($listUser as $user): ?>
                        <tr>
                            <td><?php echo $user['idUser']; ?></td>
                            <td><?php echo $user['nameUser']; ?></td>
                            <td><?php echo $user['cpfUser']; ?></td>

                             <td>
                                <input type="hidden " id="idUserAlteration" name="idUserAlteration" value="<?php echo $user['idUser']; ?>">
                                <button class="orange-button" id="alteration">Editar</button>
                            </td>
                            <td>
                                <button type="button" class="red-button" data-id="<?php echo $user['idUser']; ?>" id="delete">Excluir</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </article>
        </section>

        <!-- SUBSTITUTION OF CONTEND -->
        <section class="register-wrapper">
            <article>
                <h1 class="title-page">
                    Cadastro Autoridade
                </h1>
            </article>
            <article class="form-wrapper col">
                <div class="input-row row">
                        <button type="button" class="back-button red-button" id="back" >Voltar</button>
                    </div>
                <form class="register" id="register-officer" action="../../controller/officer/register-officer.php" method="post">
                    <div class="input-wrapper col">
                        <div class="input-row row">
                            <div class="col">
                                <label for="txtName">Nome Complemento:</label>
                                <input 
                                    type="text" 
                                    name="txtName" 
                                    id="txtName" 
                                    class="input"
                                    maxlength="100"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txtCpf">CPF:</label>
                                <input 
                                    type="text" 
                                    name="txtCpf" 
                                    id="txtCpf" 
                                    class="input"
                                    maxlength="15"
                                    required 
                                />
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col">
                                <label for="txt-dateBirth">Data de Nascimento:</label>
                                <input 
                                    type="date" 
                                    name="txtDateBirth" 
                                    id="txtDateBirth" 
                                    class="input"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txtPhone">Telefone:</label>
                                <input 
                                    type="tel" 
                                    name="txtPhone" 
                                    id="txtPhone" 
                                    class="input"
                                    maxlength="19"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txtEmail">Email:</label>
                                <input 
                                    type="email" 
                                    name=txtEmail 
                                    id=txtEmail 
                                    class="input"
                                    require
                                />
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col">
                                <label for="txtCep">CEP:</label>
                                <input 
                                    type="text" 
                                    name="txtCep" 
                                    id="txtCep" 
                                    class="input"
                                    maxlength="9"
                                    required
                                />  
                            </div>
                            <div class="col">
                                <label for="txtStreet">Logradouro:</label>
                                <input 
                                    type="text" 
                                    name="txtStreet" 
                                    id="txtStreet" 
                                    class="input"
                                    maxlength="150"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txtNumberStreet">Nº Logradouro:</label>
                                <input 
                                    type="number" 
                                    name="txtNumberStreet" 
                                    id="txtNumberStreet" 
                                    class="input"
                                    maxlength="5"
                                    required
                                />
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col">
                                <label for="txtNeighborhood">Bairro:</label>
                                <input 
                                    type="text" 
                                    name="txtNeighborhood" 
                                    id="txtNeighborhood" 
                                    class="input"
                                    maxlength="150"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txtState">Estado:</label>
                                <select
                                    class="select"
                                    name="txtState"
                                    id="txtState" 
                                    required
                                >
                                    <option selected id="uf" disabled></option>
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
                            <div class="col">
                                <label for="txtCity">Cidade:</label>
                                <input 
                                    type="text" 
                                    name="txtCity" 
                                    id="txtCity" 
                                    class="input"
                                    maxlength="80"
                                    required
                                />
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col">
                                <label for="txtComplement">Complemento:</label>
                                <input 
                                    type="text" 
                                    name="txtComplement" 
                                    id="txtComplement" 
                                    class="input"
                                    maxlength="80"
                                />
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col">
                                <label for="txtComplement">Complemento:</label>
                                <input 
                                    type="text" 
                                    name="txtComplement" 
                                    id="txtComplement" 
                                    class="input"
                                    maxlength="80"
                                />
                            </div>
                            </div>
                            <div class="col">
                                <label for="txtDepartament">Departamento:</label>
                                <select 
                                    name="txtDepartament" 
                                    id="txtDepartament" 
                                    class="select"
                                    required
                                >
                                    <option selected disable id="departament-option"></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row button-wrapper">
                        <button type="reset" class="button red-button">Limpar</button>
                        <button type="submit" class="button green-button">Cadastrar</button>
                    </div>
                </form>
            </article>
        </section>
    </main>




    <!-- MODALs -->

    <!-- BEGIN MODAL ALTERATION -->
    <dialog class="modal-alteration modal">
    <section class="alteration-wrapper">
            <article>
                <h1 class="title-page title-alteration">
                    Alteração Usuário
                    <button class="cancel-logout black-button button" id="cancel-alteration">X</button>
                </h1>
            </article>
            <article class="form-wrapper form-alteration col">
                <form class="alteration" id="alteration-officer" action="../../controller/officer/alteration-officer.php" method="post">
                    <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        require_once '../../Global.php';
                        $id = $_POST['id'];
                        $userDao = new UserDao();
                        $userList = $userDao->getAllData($id);
                        echo '<script> alert("'.$userList->getName(['nameUser']).'")</script>';
                        }
                    ?>
                    <div class="input-wrapper col">
                        <div class="input-row row">
                            <div class="col">
                                <label for="txtName">Nome Complemento:
                                    <?php
                                    ?>
                                </label>
                                <input 
                                    type="text" 
                                    name="txtName" 
                                    id="txtName" 
                                    class="input"
                                    maxlength="100"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txtCpf">CPF:</label>
                                <input 
                                    type="text" 
                                    name="txtCpf" 
                                    id="txtCpf" 
                                    class="input"
                                    maxlength="15"
                                    required 
                                />
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col">
                                <label for="txt-dateBirth">Data de Nascimento:</label>
                                <input 
                                    type="date" 
                                    name="txtDateBirth" 
                                    id="txtDateBirth" 
                                    class="input"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txtPhone">Telefone:</label>
                                <input 
                                    type="tel" 
                                    name="txtPhone" 
                                    id="txtPhone" 
                                    class="input"
                                    maxlength="19"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txtEmail">Email:</label>
                                <input 
                                    type="email" 
                                    name=txtEmail 
                                    id=txtEmail 
                                    class="input"
                                    require
                                />
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col">
                                <label for="txtCep">CEP:</label>
                                <input 
                                    type="text" 
                                    name="txtCep" 
                                    id="txtCep" 
                                    class="input"
                                    maxlength="9"
                                    required
                                />  
                            </div>
                            <div class="col">
                                <label for="txtStreet">Logradouro:</label>
                                <input 
                                    type="text" 
                                    name="txtStreet" 
                                    id="txtStreet" 
                                    class="input"
                                    maxlength="150"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txtNumberStreet">Nº Logradouro:</label>
                                <input 
                                    type="number" 
                                    name="txtNumberStreet" 
                                    id="txtNumberStreet" 
                                    class="input"
                                    maxlength="5"
                                    required
                                />
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col">
                                <label for="txtNeighborhood">Bairro:</label>
                                <input 
                                    type="text" 
                                    name="txtNeighborhood" 
                                    id="txtNeighborhood" 
                                    class="input"
                                    maxlength="150"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txtState">Estado:</label>
                                <select
                                    class="select"
                                    name="txtState"
                                    id="txtState" 
                                    required
                                >
                                    <option selected id="uf" disabled></option>
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
                            <div class="col">
                                <label for="txtCity">Cidade:</label>
                                <input 
                                    type="text" 
                                    name="txtCity" 
                                    id="txtCity" 
                                    class="input"
                                    maxlength="80"
                                    required
                                />
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col">
                                <label for="txtComplement">Complemento:</label>
                                <input 
                                    type="text" 
                                    name="txtComplement" 
                                    id="txtComplement" 
                                    class="input"
                                    maxlength="80"
                                />
                            </div>
                            </div>
                            <div class="col">
                                <label for="txtDepartament">Departamento:</label>
                                <select 
                                    name="txtDepartament" 
                                    id="txtDepartament" 
                                    class="select"
                                    required
                                >
                                    <option selected disable id="departament-option"></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-button">
                        <button type="reset" class="button red-button">Limpar</button>
                        <button type="submit" class="green-button button">Alterar</button>
                    </div>
                </form>
            </article>
        </section>
    </dialog>
    <!-- END MODAL ALTERATION -->



    <!-- BEGIN MODAL LOGOUT -->
    <dialog class="modal-logout modal">
        <p class="modal-text">
            Tem certeza que deseja finalizar sua sessão?
        </p>
        <div class="modal-button">
                <button class="cancel-logout black-button button">Cancelar</button>
                <a href="../../controller/secretary/logout-secretary.php">
                    <button class="red-button button">Sair</button>
                </a>
            </form>
        </div>
    </dialog>
    <!-- END MODAL LOGOUT -->



    <!-- BEGIN MODAL DELETE -->
    <dialog class="modal-delete modal">
        <h1>Deletar Usuario</h1>
        <p class="modal-text">
            Ao confirmar, você deletará quaisquer informações sobre a Autoridade.
        </p>
        <div class="modal-button">
        <form id="deleteForm" method="post" action="../../controller/user/delete-user.php">
            <input type="hidden" id="idUser" name="idUser" value="">
            <button type="button" class="cancel-delete black-button button">Voltar</button>
            <button type="submit" class="red-button button">Deletar</button>
        </form>
        </div>
    </dialog>
    <!-- END MODAL DELETE -->

</body>
</html>
