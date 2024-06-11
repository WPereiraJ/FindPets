<?php
session_start();
include 'db_config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os dados do pet estão na sessão
    if (!isset($_SESSION["pet"])) {
        echo "<script>alert('Erro: dados do pet não encontrados.'); window.location.href = '../FindRegister.php';</script>";
        exit();
    }

    // Recupera os dados do dono do formulário
    $name = $_POST["name"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmarSenha = $_POST["confirmarsenha"];
    $telefone = $_POST["telefone"];
    $cpf = $_POST["cpf"];

    if ($senha !== $confirmarSenha) {
        echo "<script>alert('As senhas não correspondem. Por favor, tente novamente.'); window.location.href = '../FindOwner.php';</script>";
        exit();
    }

    // Recupera os dados do pet da sessão
    $petData = $_SESSION["pet"];
    $namepet = $petData["namepet"];
    $raca = $petData["raca"];
    $pelagem = $petData["pelagem"];
    $caracteristicas = $petData["caracteristicas"];
    $loc = $petData["loc"];
    $gender = $petData["gender"];

    // Conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Inicia uma transação
    $conn->begin_transaction();

    // Inicializa as variáveis stmt1 e stmt2 como null
    $stmt1 = null;
    $stmt2 = null;

    try {
        // Insere os dados do dono no banco de dados
        $stmt1 = $conn->prepare("INSERT INTO dono_pet (nome, email, senha, telefone, cpf) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt1) {
            throw new Exception("Falha na preparação da declaração SQL para o dono: " . $conn->error);
        }
        $stmt1->bind_param("sssss", $name, $email, $senha, $telefone, $cpf);
        $stmt1->execute();

        // Recupera o ID do dono inserido
        $dono_id = $stmt1->insert_id;

        // Insere os dados do pet no banco de dados, associando ao ID do dono
        $stmt2 = $conn->prepare("INSERT INTO tb_pet (nome, raca, pelagem, descricao, loc, genero, dono_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt2) {
            throw new Exception("Falha na preparação da declaração SQL para o pet: " . $conn->error);
        }
        $stmt2->bind_param("ssssssi", $namepet, $raca, $pelagem, $caracteristicas, $loc, $gender, $dono_id);
        $stmt2->execute();

        // Confirma a transação
        $conn->commit();

        // Limpa os dados da sessão após a conclusão do cadastro
        unset($_SESSION["pet"]);

        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = '../login.php';</script>";
        exit();
    } catch (Exception $e) {
        // Em caso de erro, reverte a transação
        $conn->rollback();
        echo "<script>alert('Erro ao realizar o cadastro: {$e->getMessage()}'); window.location.href = '../FindOwner.php';</script>";
        exit();
    }

    // Fecha a conexão com o banco de dados
    if ($stmt1) $stmt1->close();
    if ($stmt2) $stmt2->close();
    $conn->close();
} else {
    echo "<script>alert('Método de solicitação inválido.'); window.location.href = '../FindOwner.php';</script>";
    exit();
}
?>
