<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit;
}

$timeout = 60;

if (isset($_SESSION['ultimo_acesso']) && (time() - $_SESSION['ultimo_acesso'] > $timeout)) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

$_SESSION['ultimo_acesso'] = time();
$idUsuario = $_SESSION["id_usuario"];
$nomeUsuario = $_SESSION["nome"];
$tipoUsuario = $_SESSION["tipo_usuario"];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="icon" href="img/logo1.png" type="image/png">
    <title>Home</title>
</head>

<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <img src="img/logo2.png" alt="Find Pets" href="home.php">
            </div>

            <!-- Sidebar -->
            <div id="main">
                <button id="openbtn" class="openbtn" onclick="openNav()">☰ Menu</button>
            </div>
            <div id="mySidebar" class="sidebar">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <div class="welcome-text">Bem-vindo, <?php echo $nomeUsuario; ?></div>
                <a href="home.php">Home</a>
                <a href="profile.php">Perfil</a>
                <?php if ($tipoUsuario !== 'procurador') : ?>
                    <a href="petRegister.php">Seus Animais Registrados</a>
                <?php endif; ?>
                <a href="find.php">Ajuda a Encontrar</a>
                <button class="logout-btn" onclick="logout()">Logout</button>
            </div>
        </nav>
    </header>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>