<?php 
    include '../../controller/secretary/verify-login-secretary.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secretaria Pública | Desaparecido </title>
    <link rel="stylesheet" href="../../assets/css/secretary/register-missed.style.css">
    <link rel="stylesheet" href="../../assets/css/secretary/global.style.css">
    <link rel="shortcut icon" href="../../assets/img/secretary/logo-firelook.png" type="image/x-png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="../../assets/js/secretary/formMask.script.js" defer></script>
    <script src="https://kit.fontawesome.com/b62fa57115.js" crossorigin="anonymous" defer></script>
    <script src="../../assets/js/secretary/register-missed.script.js" defer></script>
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
        <section class="main-wrapper">
            <article>
                <h1 class="title-page">
                    Cadastro Desaparecido
                </h1>
            </article>
            <article class="form-wrapper">
                <form class="register" id="register-authority" action="#" method="post">
                    <div class="input-wrapper col">
                        <div class="photo-row row">
                            <div class="col">
                                <div class="image-wrapper col">
                                    <div class="photo-preview"></div>
                                    <input 
                                        type="file" 
                                        name="input-photo" 
                                        id="input-photo"
                                        class="photo"
                                        title="Escolha uma Imagem"
                                        onchange="changePhoto()"
                                        accept="image/*"
                                    />
                                    <label for="input-photo" class="label-photo">Escolha uma imagem:</label>
                                </div>
                            </div>
                            <div class="tip-wrapper col">

                                <div class="feature-wrapper col">
                                    <div class="input-row row">
                                        <div class="col">
                                            <span class="title-row">Característica físicas</span>
                                        </div>
                                    </div>
                                    <div class="input-row col" id="inputs-feature">
                                        <!-- <div class="row">
                                            <div class="col">
                                                <label for="txt-typeFeature">Tipo de Característica:</label>
                                                <input 
                                                    type="text" 
                                                    name="txt-typeFeature" 
                                                    id="txt-typeFeature" 
                                                    class="input"
                                                    maxlength="40"
                                                    required
                                                />
                                            </div>
                                            <div class="col">
                                                <label for="txt-feature">Característica:</label>
                                                <input 
                                                    type="text" 
                                                    name="txt-feature" 
                                                    id="txt-feature" 
                                                    class="input"
                                                    maxlength="80"
                                                    required
                                                />
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="button-containerFeature button-container row">
                                        <button type="button" class="button black-button" id="removeFeature">Remover</button>
                                        <button type="button" class="button red-button" id="addFeature">Adicionar</button>
                                    </div>
                                </div>

                                <div class="clothe-wrapper col">
                                    <div class="input-row row ">
                                        <div class="col">
                                            <span class="title-row">Vestimenta</span>
                                        </div>
                                    </div>
                                    <div class="input-row col" id="inputs-clothe">
                                        <!-- <div class="row">
                                            <div class="col">
                                                <label for="txt-typeClothe">Tipo de Vestimenta:</label>
                                                <input 
                                                    type="text" 
                                                    name="txt-typeClothe" 
                                                    id="txt-typeClothe" 
                                                    class="input"
                                                    maxlength="40"
                                                    required
                                                />
                                            </div>
                                            <div class="col">
                                                <label for="txt-clothe">Característica:</label>
                                                <input 
                                                    type="text" 
                                                    name="txt-clothe" 
                                                    id="txt-clothe" 
                                                    class="input"
                                                    maxlength="80"
                                                    required
                                                />
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="button-containerClothe button-container row">
                                        <button type="button" class="button black-button" id="removeClothe">Remover</button>
                                        <button type="button" class="button red-button" id="addClothe">Adicionar</button>
                                    </div>
                                </div>

                                <div class="reason-wrapper col">
                                    <div class="input-row row" >
                                        <div class="col">
                                            <span class="title-row">Motivos do desaparecimento (possíveis)</span>
                                        </div>
                                    </div>
                                    <div class="input-row col" id="inputs-reason">
                                        <!-- <div class="row">
                                            <div class="col">
                                                <label for="txt-typeReason">Assunto:</label>
                                                <input 
                                                    type="text" 
                                                    name="txt-typeReason" 
                                                    id="txt-typeReason" 
                                                    class="input"
                                                    maxlength="40"
                                                    required
                                                />
                                            </div>
                                            <div class="col">
                                                <label for="txt-reason">Descrição:</label>
                                                <input 
                                                    type="text" 
                                                    name="txt-reason" 
                                                    id="txt-reason" 
                                                    class="input"
                                                    maxlength="80"
                                                    required
                                                />
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="button-containerReason button-container row">
                                        <button type="button" class="button black-button" id="removeReason">Remover</button>
                                        <button type="button" class="button red-button" id="addReason">Adicionar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="input-row row">
                            <div class="col">
                                <label for="txt-name">Nome Complemento:</label>
                                <input 
                                    type="text" 
                                    name="txt-name" 
                                    id="txt-name" 
                                    class="input"
                                    maxlength="100"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txt-cpf">CPF:</label>
                                <input 
                                    type="text" 
                                    name="txt-cpf" 
                                    id="txt-cpf" 
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
                                    name="txt-dateBirth" 
                                    id="txt-dateBirth" 
                                    class="input"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txt-family">Acompanhante:</label>
                                <select
                                    class="select"
                                    name="txt-family"
                                    id="txt-family" 
                                    required
                                >
                                    <option selected disabled id="family-option"></option>
                                </select>
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col">
                                <span class="title-row">última localização</span>
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col">
                                <label for="txt-cep">CEP:</label>
                                <input 
                                    type="text" 
                                    name="txt-cep" 
                                    id="txt-cep" 
                                    class="input"
                                    maxlength="9"
                                    required
                                />  
                            </div>
                            <div class="col">
                                <label for="txt-reference">Referência:</label>
                                <input 
                                    type="text" 
                                    name="txt-reference" 
                                    id="txt-reference" 
                                    class="input"
                                    maxlength="80"
                                />
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col">
                                <label for="txt-street">Logradouro:</label>
                                <input 
                                    type="text" 
                                    name="txt-street" 
                                    id="txt-street" 
                                    class="input"
                                    maxlength="150"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txt-numberSt">Nº Logradouro:</label>
                                <input 
                                    type="number" 
                                    name="txt-numberSt" 
                                    id="txt-numberSt" 
                                    class="input"
                                    maxlength="5"
                                    required
                                />
                            </div>
                        </div>
                        <div class="input-row row">
                            <div class="col">
                                <label for="txt-neighborhood">Bairro:</label>
                                <input 
                                    type="text" 
                                    name="txt-neighborhood" 
                                    id="txt-neighborhood" 
                                    class="input"
                                    maxlength="150"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txt-city">Cidade:</label>
                                <input 
                                    type="text" 
                                    name="txt-city" 
                                    id="txt-city" 
                                    class="input"
                                    maxlength="80"
                                    required
                                />
                            </div>
                            <div class="col">
                                <label for="txt-state">Estado:</label>
                                <select
                                    class="select"
                                    name="txt-state"
                                    id="txt-state" 
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

</body>
</html>
</body>
</html>