<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="icon" href="img/logo1.png" type="image/png">
    <title>Home</title>
</head>

<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <img src="img/logo2.png" alt="Find Pets" href="home.php">
            </div>
            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="#" class="nav-linkk">Home</a></li>
                    <li class="nav-item"><a href="find.php" class="nav-linkk">Encontre-o</a></li>
                    <li class="nav-item"><a href="#" class="nav-linkk"> Sobre</a></li>
                </ul>
            </div>
            <div class="login-button">
                <button><a href="index.php">Pagina Inicial</a></button>
            </div>

            <div class="mobile-menu-icon">
                <button onclick="menuShow()"><img class="icon" src="img/menu_white_36dp.svg" alt=""></button>
            </div>
        </nav>
        <div class="mobile-menu">
            <ul>
                <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="find.php" class="nav-link">Encontre-o</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Sobre</a></li>
            </ul>

            <div class="login-button">
                <button><a href="#">Entrar</a></button>
            </div>
        </div>
    </header>
    
    <div class="slider">
        <div class="slides">
            <!--Slide Images-->
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="10000">
                    <img src="img/slide1.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="img/slide2.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/slide3.png" class="d-block w-100" alt="...">
                  </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/slide4.png" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            <!---->
        </div>
    </div>
    <div class="presentation-text">
        <h2>Bem-vindo ao Find Pets!</h2>
        <p>Você já sentiu o desespero de perder seu amado animal de estimação? Sabemos como é angustiante essa situação. É por isso que criamos o Find Pets, o seu companheiro confiável na busca por animais perdidos.</p>
        <p>Encontrar seu querido amigo peludo nunca foi tão fácil e sem complicações. Com a nossa plataforma intuitiva e eficiente, conectamos donos preocupados a seus animais de estimação perdidos de forma rápida e eficaz.</p>
        <p>No Find Pets, valorizamos a importância dos laços entre humanos e animais. Nosso objetivo é reunir famílias e seus bichinhos de estimação o mais rápido possível, para que todos possam voltar a desfrutar da companhia um do outro.</p>
        <p>Nossa plataforma oferece recursos robustos, incluindo um sistema de busca inteligente, alertas em tempo real e uma comunidade solidária pronta para ajudar. Com o Find Pets, você pode ter a tranquilidade de que faremos tudo ao nosso alcance para trazer seu amado pet de volta para casa.</p>
        <p>Junte-se a nós no Find Pets e torne a busca pelo seu animal de estimação perdido uma experiência mais fácil e reconfortante. Porque quando se trata do bem-estar dos nossos amigos de quatro patas, cada segundo conta.</p>
        <p>Encontre. Reúna. Ame. Find Pets está aqui para ajudar você e seu animal de estimação a se reencontrarem.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="JS/script.js"></script>
</body>

</html>