<?php 
    include '../../controller/secretary/verify-login-secretary.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secretaria Pública | Firelook </title>
    <link rel="stylesheet" href="../.../../assets/css/secretary/dashboard.style.css">
    <link rel="stylesheet" href="../../assets/css/secretary/global.style.css">
    <link rel="shortcut icon" href="../../assets/img/secretary/logo-firelook.png" type="image/x-png">
    <script src="https://kit.fontawesome.com/b62fa57115.js" crossorigin="anonymous" defer></script>
    <script src="../../assets/js/secretary/dashboard.script.js" defer></script>
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
            <a href="../../controller/secretary/logout-secretary.php" class="link-icon">
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
                    <a href="#">Dashboard</a>
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
                        <a href="./register-missed.php" class="option-links row" id="missing-link">
                            Desaparecido
                        </a>
                    </li>
                </div>
            </ul>

        </nav>
    </aside>
</body>
</html>