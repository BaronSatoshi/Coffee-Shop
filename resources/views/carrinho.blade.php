<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/3dfd196d26.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <title>Carrinho de Compras</title>
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
        @if(count($carrinhoAsParticipant) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço Produto</th>
                    <th>Preço Total</th>
                    <th>Ação</th>
                </tr>
            </thead>
            @foreach($carrinhoAsParticipant as $carrinho)
            <tr style="color: white;">
                <td><span>{{$carrinho->id}}</span></td>
                <td><img src="/img/imgprodutos/{{$carrinho->image}}" style="width: 150px"></td>
                <td><span>{{$carrinho->nome}}</span></td>
                <td><span>R${{$carrinho->preco}}</span></td>
                <td><span>R${{number_format($carrinho->preco * 1 , 2)}}</span></td>
                <td>
                    <form action="/carrinho/leaveCart/{{$carrinho->id}}" method="post">
                        @csrf
                        @method('DELETE') 
                       <span><button class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button></span> 
                    </form>                    
                </td>
            </tr>
            @endforeach
            <tr style="color: white;">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>R${{number_format($soma, 2)}}</td>
                <td>Preço Total<br><br><button type="button" data-toggle="modal" data-target="#modalExemplo{{$carrinho->id}}" class="btn btn-success">Comprar</button></td>
            </tr>
            
            {{-- Modal bootstrap --}}
        <div class="modal fade" id="modalExemplo{{$carrinho->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body">
            <img src="/img/compraRealizada.gif" style="width: 50%; display: block; margin-left: auto; margin-right: auto;" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
        </div>

        </table>
        @else
        <p style="display: flex; text-align: center; justify-content: center; font-size:38px; color:white;">O seu carrinho está vazio</p>
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