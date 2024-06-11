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
            <form action="PHP/FindRegister_process_pet.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastro</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="index.php">Voltar</a></button>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-box">
                        <label for="namepet">Nome Do Pet</label>
                        <input id="namepet" type="text" name="namepet" placeholder="Nome do animal" required>
                    </div>
                    <div class="input-box">
                        <label for="raça">Raça</label>
                        <input id="raça" type="text" name="raça" placeholder="Raça" required>
                    </div>
                    <div class="input-box">
                        <label for="pelagem">Pelagem</label>
                        <input id="pelagem" type="text" name="pelagem" placeholder="Cor do pelo" required>
                    </div>
                    <div class="input-box">
                        <label for="caratecteristicas">Caracteristicas</label>
                        <input id="caracteristicas" type="text" name="caracteristicas" placeholder="Caracteristicas">
                    </div>
                    <div class="input-box">
                        <label for="loc">Localização</label>
                        <input id="loc" type="text" name="loc" placeholder="Último lugar visto" required>
                    </div>
                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Sexo</h6>
                    </div>
                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" id="female" name="gender" value="feminino">
                            <label for="female">Feminino</label>
                        </div>
                        <div class="gender-group">
                            <div class="gender-input">
                                <input type="radio" id="male" name="gender" value="masculino">
                                <label for="male">Masculino</label>
                            </div>
                        </div>
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