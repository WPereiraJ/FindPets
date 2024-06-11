<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit;
}

$idUsuario = $_SESSION["id_usuario"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include "db_config.php";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $petName = $_POST["petName"];
    $pelagem = $_POST["pelagem"];
    $raca = $_POST["raca"];
    $genero = $_POST["genero"];
    $localizacao = $_POST["localizacao"];
    $caracteristicas = $_POST["caracteristicas"];


    $sql = "INSERT INTO tb_pet (dono_id, nome, pelagem, raca, genero, loc, descricao) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssss", $idUsuario, $petName, $pelagem, $raca, $genero, $localizacao, $caracteristicas);

    if ($stmt->execute() === TRUE) {
        header("Location: ../petRegister.php?success=true");
        exit;
    } else {
        echo "Erro ao registrar o pet: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
