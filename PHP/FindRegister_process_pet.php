<?php
session_start();
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do formulário do pet
    $namepet = $_POST["namepet"];
    $raca = $_POST["raça"];
    $pelagem = $_POST["pelagem"];
    $caracteristicas = $_POST["caracteristicas"];
    $loc = $_POST["loc"];
    $gender = $_POST["gender"];

    // Armazena os dados do pet na sessão
    $_SESSION["pet"] = [
        "namepet" => $namepet,
        "raca" => $raca,
        "pelagem" => $pelagem,
        "caracteristicas" => $caracteristicas,
        "loc" => $loc,
        "gender" => $gender
    ];

    // Redireciona para a segunda etapa do cadastro (cadastro do dono)
    header("Location: ../FindOwner.php");
    exit();
} else {
    echo "<script>alert('Método de solicitação inválido.'); window.location.href = '../FindRegister.php';</script>";
}
?>
