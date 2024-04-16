<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo1.png" type="image/png">
    <link rel="stylesheet" href="css/register.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Faça Cadastro<br>E Ajude a Comunidade </h1>
            <img src="img/animals-floating-with-balloons-animate.svg" class="left-login-image">
        </div>
        <form action="">
            <div class="right-login">
                <div class="card-login">
                    <h1>Cadastro</h1>
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
                        <input type="password" name="confirmarsenha" placeholder="Confirmar Senha" required>
                    </div>
                    <div class="textfield">
                        <label for="Email">Email</label>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                 <div class="textfield">
                        <label for="cpf">CPF</label>
                        <input type="text" name="CPF" placeholder="CPF" required>
                    </div>
                    <button class="btn-login"><a href="home.php">Cadastrar</a></button>
                    <a href="login.php"> Já é cadastrado?</a>
             </div>
            </div>
        </form>
        </div>
</body>
</html>