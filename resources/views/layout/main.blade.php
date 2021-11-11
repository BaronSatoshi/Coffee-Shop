<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/3dfd196d26.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/coffeeshoplogopng.png" style="width: 100px; margin-left: 15px;">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/produtos" class="nav-link">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a href="#sobre-container" class="nav-link">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contato" class="nav-link">Contato</a>
                    </li>
                    @auth
                    <li class="nav-item">
                      <a href="/dashboard" class="nav-link">Meus Favoritos</a>  
                    </li>
                    <li class="nav-item">
                      <a href="/carrinho" class="nav-link"><i  class="fa fa-shopping-cart" aria-hidden="true" ></i></a>  
                    </li>
                    <li class="nav-item">
                    <form action="/logout" method="POST">
                      @csrf
                      <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                    </form>  
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
          <div class="row">
            @yield('content')
          </div>
        </div>
    </main>
    <footer>
        <p>Baron Satoshi &copy; 2021</p>
    </footer>
    <script src="/js/vanilla-tilt.min.js"></script>
    <script>
        VanillaTilt.init(document.querySelectorAll(".sci li a"), {
            max: 30,
            speed: 400,
            glare:true,
            "max-glare": 1,
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>