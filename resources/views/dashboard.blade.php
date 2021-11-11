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
    <title>Dashboard</title>
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
          @if(session('msg'))
              <p class="msg">{{session('msg')}}</p>
            @endif
            @if(count($produtosAsParticipant) > 0)
          <div class="col-md-10 offset-md-1 dashboard-title-container">
            <h1 style="color: white;">Meus Favoritos</h1>
            <div class="container">
            @foreach($produtosAsParticipant as $produto)
            <div class="card">
            <div class="imgBx">
                <img src="/img/imgprodutos/{{$produto->image}}" alt="">
                <ul class="action">
                    <li>
                        
                        <form action="/produtos/leave/{{$produto->id}}" method="post">
                        @csrf
                        @method('DELETE')
                            <i class="fa fa-trash" aria-hidden="true" onclick="event.preventDefault(); this.closest('form').submit();"></i>
                            <button type="submit">Excluir da lista de desejos</button>
                        </form>
                    </li>
                    <li>
                        <form action="/carrinho/wish_carrinho/{{$produto->id}}" method="post">
                        @csrf
                        <i class="fa fa-cart-plus" aria-hidden="true" onclick="event.preventDefault(); this.closest('form').submit();"></i>
                        <a href="/carrinho/wish_carrinho/{{$produto->id}}"><button>Adicionar ao carrinho</button></a> 
                        </form>
                    </li>
                    <li>
                        <i type="button" data-toggle="modal" data-target="#modalExemplo{{$produto->id}}" class="fa fa-eye" aria-hidden="true" ></i>
                        <button type="button" data-toggle="modal" data-target="#modalExemplo{{$produto->id}}" class="fa fa-eye" aria-hidden="true">Ver mais detalhes</button>                    
                    </li>
                    
                </ul>
            </div>
            <div class="content">
                <div class="productName">
                    <h3>{{ $produto->nome }}</h3>
                </div>
                <div class="price_rating">
                    <h2>R${{$produto->preco}}</h2>
                </div>
            </div>
        </div>

        {{-- Modal bootstrap --}}
        <div class="modal fade" id="modalExemplo{{$produto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$produto->nome}}</h5>
            </div>
            <div class="modal-body">
            <img src="/img/imgprodutos/{{$produto->image}}" style="height: 350px; width: 300px; align-items: center; justify-content: center;"><br>
                {{$produto->detalhes}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
        </div>
        @endforeach
        </div>
        @else
        <p style="display: flex; text-align: center; justify-content: center; font-size:38px; color:white;">Você não adicionou nenhum item ao seus favoritos</p>
        <a href="/produtos" style="display: flex; text-align: center; justify-content: center; text-decoration:none; font-size:24px">Conferir todos os produtos</a>
        <img src="/img/amumu.png" style="width: 30%; display: block; margin-left: auto; margin-right:auto;" >
        @endif
    </main>
    <footer>
        <p>Baron Satoshi &copy; 2021</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>