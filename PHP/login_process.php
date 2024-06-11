<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["usuario"];
    $senha = $_POST["senha"];

    // Configuração da conexão com o banco de dados
    include_once "db_config.php";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Consulta na primeira tabela (tb_procurador)
    $sql_procurador = "SELECT id_procurador AS id FROM tb_procurador WHERE nome = ? AND senha = ?";
    $stmt_procurador = $conn->prepare($sql_procurador);
    if (!$stmt_procurador) {
        die("Erro na preparação da consulta: " . $conn->error);
    }
    $stmt_procurador->bind_param("ss", $nome, $senha);
    $stmt_procurador->execute();
    $result_procurador = $stmt_procurador->get_result();

    // Consulta na segunda tabela (dono_pet)
    $sql_cliente = "SELECT id_dono AS id FROM dono_pet WHERE nome = ? AND senha = ?";
    $stmt_cliente = $conn->prepare($sql_cliente);
    if (!$stmt_cliente) {
        die("Erro na preparação da consulta: " . $conn->error);
    }
    $stmt_cliente->bind_param("ss", $nome, $senha);
    $stmt_cliente->execute();
    $result_cliente = $stmt_cliente->get_result();

    // Verificar se alguma das consultas retornou um resultado
    if ($result_procurador->num_rows > 0) {
        $row = $result_procurador->fetch_assoc();
        $idUsuario = $row["id"];
        $tipoUsuario = "procurador"; // Adiciona o tipo de usuário
    } elseif ($result_cliente->num_rows > 0) {
        $row = $result_cliente->fetch_assoc();
        $idUsuario = $row["id"];
        $tipoUsuario = "dono"; // Adiciona o tipo de usuário
    } else {
        $erro = "Nome de usuário ou senha incorretos";
        header("Location: ../login.php?erro=" . urlencode($erro));
        exit;
    }

    // Iniciar a sessão e armazenar informações do usuário
    session_start();
    $_SESSION["id_usuario"] = $idUsuario;
    $_SESSION["nome"] = $nome;
    $_SESSION["tipo_usuario"] = $tipoUsuario; // Armazena o tipo de usuário na sessão

    header("Location: ../home.php");
    exit;

    $conn->close();
}
?>
