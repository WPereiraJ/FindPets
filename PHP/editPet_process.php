<?php
session_start();

if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit;
}

include "db_config.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["petId"])) {
    $petId = $_POST["petId"];
    $petName = $_POST["petName"];
    $pelagem = $_POST["pelagem"];
    $raca = $_POST["raca"];
    $genero = $_POST["genero"];
    $localizacao = $_POST["localizacao"];
    $caracteristicas = $_POST["caracteristicas"];

    $sql = "UPDATE tb_pet SET nome = ?, pelagem = ?, raca = ?, genero = ?, loc = ?, descricao = ? WHERE id_pet = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }
    $stmt->bind_param("ssssssi", $petName, $pelagem, $raca, $genero, $localizacao, $caracteristicas, $petId);

    if (!$stmt->execute()) {
        die("Erro ao atualizar o pet: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

    header("Location: ../petRegister.php");
    exit;
}
?>
