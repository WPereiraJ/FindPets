<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recuperar os valores do formulário
  $nome = $_POST["usuario"];
  $senha = $_POST["senha"];
  $confirmarSenha = $_POST["confirmar"];
  $email = $_POST["email"];
  $cpf = $_POST["cpf"];

  // Verificar se as senhas correspondem
  if ($senha !== $confirmarSenha) {
    $erro = "As senhas não correspondem. Por favor, tente novamente.";
    header("Location: ../register.php?erro=" . urlencode($erro));
    exit();
  }

  // Configuração da conexão com o banco de dados
  include_once "db_config.php";

  // Criar a conexão com o banco de dados
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar a conexão
  if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
  }

  // Preparar a instrução SQL para evitar injeção de SQL
  $stmt = $conn->prepare("INSERT INTO tb_procurador (nome, senha, email, cpf) VALUES (?, ?, ?, ?)");

  if ($stmt === false) {
    die("Erro na preparação da consulta: " . $conn->error);
  }

  $stmt->bind_param("ssss", $nome, $senha, $email, $cpf);

  // Executar a instrução
  if ($stmt->execute()) {
    $sucesso = "Seu cadastro foi feito com sucesso.";
    header("Location: ../register.php?sucesso=" . urlencode($sucesso));
    sleep(2);
    header("Location: ../login.php");
  } else {
    $erro = "Erro ao cadastrar: " . $stmt->error;
    header("Location: ../register.php?erro=" . urlencode($erro));
  }

  // Fechar a instrução e a conexão
  $stmt->close();
  $conn->close();
}
