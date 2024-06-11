<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dogregi.css">
    <title>Cadastro de Pet</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="img/animals-floating-with-balloons-animate3.svg">
        </div>
        <div class="form">
            <form action="PHP/FindRegister_process_owner.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastro</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="findRegister.php">Voltar</a></button>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="name">Nome Completo</label>
                        <input id="name" type="text" name="name" placeholder="Nome" required>
                    </div>
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input id="email" type="text" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-box">
                        <label for="telefone">Telefone</label>
                        <input id="telefone" type="tel" name="telefone" placeholder="(xx)xxxx-xxxx" required>
                    </div>
                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha">
                    </div>
                    <div class="input-box">
                        <label for="confirmarsenha">Confirmar Senha</label>
                        <input id="confirmarsenha" type="password" name="confirmarsenha" placeholder="Confirme sua senha">
                    </div>
                    <div class="input-box">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" name="cpf" placeholder="CPF" required>
                    </div>
                </div>
                <div class="continue-button">
                    <button type="submit">Continuar</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>