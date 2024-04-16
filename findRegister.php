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
            <form action="#">
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
                        <label for="dogname">Nome Do Pet</label>
                        <input id="dogname" type="text" name="dogname" placeholder="Nome atendido pelo cachorro" required>
                    </div>
                    <div class="input-box">
                        <label for="ownername">Nome Do Dono</label>
                        <input id="ownername" type="text" name="ownername" placeholder="Nome do dono" required>
                 </div>
                    <div class="input-box">
                        <label for="telefone">Telefone</label>
                        <input id="telefone" type="tel" name="telefone" placeholder="(xx) xxxx-xxxx" required>
                    </div>
                    <div class="input-box">
                        <label for="telefone">Telefone (Opcional)</label>
                        <input id="telefone" type="tel" name="telefone" placeholder="(xx) xxxx-xxxx">
                    </div>
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input id="Email" type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-box">
                    <label for="loc">Localização</label>
                    <input id="loc" type="text" name="loc" placeholder="Onde foi visto pela última vez" required>
                    </div>
                </div>

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                    </div>
                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" id="female" name="gender">
                            <label for="female">Feminino</label>
                        </div>
                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" id="male" name="gender">
                            <label for="male">Masculino</label>
                        </div>
                    </div>
                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" id="unknown" name="gender">
                            <label for="unknown">Não sei</label>
                        </div>
                    </div>    
                    <div class="gender-group">
                        <div class="gender-input">
                            <input type="radio" id="unknown" name="gender">
                            <label for="unknown">Não sei</label>
                        </div>
                    </div>    
                    </div>
                </div>

                <div class="continue-button">
                    <button><a href="#">Continuar</a></button>
                </div>

            </form>
        </div>
    </div>
</body>
</html>