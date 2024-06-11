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
    <link rel="stylesheet" href="CSS/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="img/logo1.png" type="image/png">
    <title>Encontre</title>
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
                <a href="find.php">Ajude a Encontrar</a>
                <button class="logout-btn" onclick="logout()">Logout</button>
            </div>
        </nav>
    </header>

    <!--Seach-Box-->
    <div class="search-box">
        <input type="text" class="search-txt" placeholder="Pesquisar" onkeyup="searchPets()">
        <a href="#">
            <img src="img/loupe-svgrepo-com.svg" name="keyword" class="search-btn" alt="Lupa" height="20" width="20">
        </a>
    </div>

    <!--Card Container-->
    <div class="row" id="petCardContainer">
        <?php
        include "PHP/db_config.php";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Buscar informações de todos os pets
        $sql = "SELECT nome, pelagem, raca, loc, descricao, genero FROM tb_pet";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-sm-4'>";
                echo "<div class='card' style='width: 18rem;' id='card'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . htmlspecialchars($row["nome"]) . "</h5>";
                echo "<p class='card-text'>Pelagem: " . htmlspecialchars($row["pelagem"]) . "<br>Raça: " . htmlspecialchars($row["raca"]) . "<br>Localização: " . htmlspecialchars($row["loc"]) . "<br>Características: " . htmlspecialchars($row["descricao"]) . "</p>";
                echo "<a href='#' class='btn btn-primary'>Ver detalhes</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>Nenhum pet registrado.</p>";
        }

        $conn->close();
        ?>
    </div>
    
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>