<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo1.png" type="image/png">
    <link rel="stylesheet" href="CSS/register.css">
    <title>Cadastro</title>
</head>

<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Faça Cadastro<br>E Ajude a Comunidade</h1>
            <img src="img/animals-floating-with-balloons-animate.svg" class="left-login-image">
        </div>
        <form action="PHP/register_process.php" method="POST">
            <div class="right-login">
                <div class="card-login">
                    <h1>Cadastro</h1>

                    <?php
                    if (isset($_GET["erro"])) {
                        $erro = $_GET["erro"];
                        echo "<p class='error-message'>$erro</p>";
                    }
                    if (isset($_GET["sucesso"])) {
                        $sucesso = $_GET["sucesso"];
                        echo "<p class='success-message'>$sucesso</p>";
                    }
                    ?>

                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Usuário" required>
                    </div>
                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" required>
                    </div>
                    <div class="textfield">
                        <label for="confirmarsenha">Confirmar Senha</label>
                        <input type="password" name="confirmar" placeholder="Confirmar Senha" required>
                    </div>
                    <div class="textfield">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="textfield">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" placeholder="CPF" required>
                    </div>
                    <button type="submit" class="btn-login">Cadastrar</button>
                    <a href="login.php">Já é cadastrado?</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>