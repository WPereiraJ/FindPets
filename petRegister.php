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

include "PHP/db_config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["petId"])) {
    $petId = $_POST["petId"];

    // Preparar e executar a consulta para excluir o pet do banco de dados
    $sql = "DELETE FROM tb_pet WHERE id_pet = ? AND dono_id = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }
    $stmt->bind_param("ii", $petId, $idUsuario);
    if (!$stmt->execute()) {
        die("Erro ao excluir o pet: " . $stmt->error);
    }

    // Fechar a declaração e a conexão
    $stmt->close();
    $conn->close();

    // Redirecionar de volta para a página de pets após a exclusão
    header("Location: petRegister.php");
    exit;
}

$sql = "SELECT id_pet, nome, pelagem, raca, loc, descricao, genero FROM tb_pet WHERE dono_id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Erro na preparação da consulta: " . $conn->error);
}
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$result = $stmt->get_result();
$pets = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();
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
                <a href="#">Seus Animais Registrados</a>
                <a href="find.php">Ajude a Encontrar</a>
                <button class="logout-btn" onclick="logout()">Logout</button>
            </div>
        </nav>
    </header>

    <div class="pet-container">
        <?php if (!empty($pets)) : ?>
            <?php foreach ($pets as $pet) : ?>
                <div class="pet-card" data-pet-id="<?php echo $pet['id_pet']; ?>">
                    <img src="<?php echo isset($pet['imagem']) ? htmlspecialchars($pet['imagem']) : 'placeholder.jpg'; ?>" class="pet-img" alt="<?php echo htmlspecialchars($pet['nome']); ?>">
                    <div class="pet-info">
                        <h5 class="pet-name"><?php echo htmlspecialchars($pet['nome']); ?></h5>
                        <p class="pet-description">
                            <strong>Pelagem:</strong> <?php echo htmlspecialchars($pet['pelagem']); ?><br>
                            <strong>Raça:</strong> <?php echo htmlspecialchars($pet['raca']); ?><br>
                            <strong>Localização:</strong> <?php echo htmlspecialchars($pet['loc']); ?><br>
                            <strong>Características:</strong> <?php echo htmlspecialchars($pet['descricao']); ?>
                        </p>
                        <button type="button" class="btn btn-primary edit-pet-btn" data-bs-toggle="modal" data-bs-target="#editPetModal<?php echo $pet['id_pet']; ?>">Editar</button>
                        <button type="button" class="btn btn-danger" onclick="openDeleteModal(<?php echo $pet['id_pet']; ?>)">Excluir</button>
                    </div>
                </div>

                <!-- Modal de edição de informações do pet -->
                <div class="modal fade" id="editPetModal<?php echo $pet['id_pet']; ?>" tabindex="-1" aria-labelledby="editPetModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPetModalLabel">Editar Informações do Pet</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulário para editar as informações do pet -->
                                <form action="PHP/editPet_process.php" method="post">
                                    <input type="hidden" name="petId" value="<?php echo $pet['id_pet']; ?>">
                                    <div class="mb-3">
                                        <label for="editPetName" class="form-label">Nome do Pet</label>
                                        <input type="text" class="form-control" id="editPetName" name="editPetName" value="<?php echo htmlspecialchars($pet['nome']); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editPelagem" class="form-label">Pelagem</label>
                                        <input type="text" class="form-control" id="editPelagem" name="editPelagem" value="<?php echo htmlspecialchars($pet['pelagem']); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editRaca" class="form-label">Raça</label>
                                        <input type="text" class="form-control" id="editRaca" name="editRaca" value="<?php echo htmlspecialchars($pet['raca']); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editLocalizacao" class="form-label">Localização</label>
                                        <input type="text" class="form-control" id="editLocalizacao" name="editLocalizacao" value="<?php echo htmlspecialchars($pet['loc']); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editSexo" class="form-label">Sexo</label>
                                        <input type="text" class="form-control" id="editSexo" name="editSexo" value="<?php echo htmlspecialchars($pet['genero']); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="editCaracteristicas" class="form-label">Características</label>
                                        <input type="text" class="form-control" id="editCaracteristicas" name="editCaracteristicas" value="<?php echo htmlspecialchars($pet['descricao']); ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal de confirmação de exclusão -->
                <div class="modal fade" id="confirmDeleteModal<?php echo $pet['id_pet']; ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza de que deseja excluir o pet <?php echo htmlspecialchars($pet['nome']); ?>?
                            </div>
                            <div class="modal-footer">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <input type="hidden" name="petId" value="<?php echo $pet['id_pet']; ?>">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Confirmar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Nenhum pet registrado.</p>
        <?php endif; ?>
        <div class="add-pet-card">
            <button class="btn btn-primary" onclick="showAddPetForm()">+</button>
        </div>
    </div>

    <!-- Formulário para adicionar novo pet -->
    <div id="addPetForm" class="add-pet-form">
        <div class="add-pet-form-content">
            <span class="close" onclick="closeAddPetForm()">&times;</span>
            <form action="PHP/addPet_process.php" method="POST">
                <div class="form-group">
                    <label for="petName">Nome do Pet</label>
                    <input type="text" class="form-control" id="petName" name="petName" placeholder="Digite o nome do pet" required>
                </div>
                <div class="form-group">
                    <label for="pelagem">Pelagem</label>
                    <input type="text" class="form-control" id="pelagem" name="pelagem" placeholder="Cor do pelo" required>
                </div>
                <div class="form-group">
                    <label for="raca">Raça</label>
                    <input type="text" class="form-control" id="raca" name="raca" placeholder="Raça do animal" required>
                </div>
                <div class="form-group">
                    <label for="genero">Sexo</label>
                    <input type="text" class="form-control" id="genero" name="genero" placeholder="Sexo do animal" required>
                </div>
                <div class="form-group">
                    <label for="localizacao">Localização</label>
                    <input type="text" class="form-control" id="localizacao" name="localizacao" placeholder="Último local visto" required>
                </div>
                <div class="form-group">
                    <label for="caracteristicas">Características</label>
                    <input type="text" class="form-control" id="caracteristicas" name="caracteristicas" placeholder="Ex: Manchas no pelo, Cor diferente nas patas, etc." required>
                </div>
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRGO3q4/2b8sbzOG4d5N5f5anG+mt9i5MZoTQ3Sk5" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>