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
    <title>Produtos</title>
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
                    <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item">
                      <a href="/dashboard" class="nav-link">Meus Favoritos</a>  
                    </li>
                    <li class="nav-item">
                      <a href="/carrinho" class="nav-link"><i  class="fa fa-shopping-cart" aria-hidden="true" ></i></a>  
                    </li>
                    <li class="nav-item">
                    <form action="/logout" method="POST">
                      <?php echo csrf_field(); ?>
                      <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                    </form>  
                    </li>
                    <?php endif; ?>
                    <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
    <main>
    
    <div class="container-fluid">
          <div class="row">
            <?php if(session('msg')): ?>
                <p class="msg"><?php echo e(session('msg')); ?></p>
            <?php endif; ?>
            <?php if(session('msg2')): ?>
                <p class="msg2"><?php echo e(session('msg2')); ?></p>
            <?php endif; ?>
          </div>

    </div>
    <div id="search-container" class="col-md-9" style="display: block; margin-left: 190px; "> 
    <h1 style="display: block; margin-left: 400px; color:white; ">Busque o Produto</h1>
    <form action="/produtos" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
    </div>
    
    <div class="container">
        <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card">
            <div class="imgBx">
                <img src="/img/imgprodutos/<?php echo e($produto->image); ?>" alt="">
                <ul class="action">
                    <li>
                        <form action="/produtos/wish/<?php echo e($produto->id); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <i class="fa fa-heart" aria-hidden="true" onclick="event.preventDefault(); this.closest('form').submit();"></i>
                        <a id="link" href="/produtos/wish/<?php echo e($produto->id); ?>"><button>Adicionar a lista de desejos</button></a>
                        </form>
                    </li>
                    <li>
                        <form action="/carrinho/wish_carrinho/<?php echo e($produto->id); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <i class="fa fa-cart-plus" aria-hidden="true" onclick="event.preventDefault(); this.closest('form').submit();"></i>
                        <a href="/carrinho/wish_carrinho/<?php echo e($produto->id); ?>"><button>Adicionar ao carrinho</button></a> 
                        </form>
                    </li>
                    <li>
                        <i type="button" data-toggle="modal" data-target="#modalExemplo<?php echo e($produto->id); ?>" class="fa fa-eye" aria-hidden="true" ></i>
                        <button type="button" data-toggle="modal" data-target="#modalExemplo<?php echo e($produto->id); ?>" class="fa fa-eye" aria-hidden="true">Ver mais detalhes</button>                    
                    </li>                    
                </ul>
            </div>
            <div class="content">
                <div class="productName">
                    <h3><?php echo e($produto->nome); ?></h3>
                </div>
                <div class="price_rating">
                    <h2>R$<?php echo e($produto->preco); ?></h2>
                </div>
            </div>
        </div>
        
        
        <div class="modal fade" id="modalExemplo<?php echo e($produto->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e($produto->nome); ?></h5>
            </div>
            <div class="modal-body">
            <img src="/img/imgprodutos/<?php echo e($produto->image); ?>" style="height: 350px; width: 300px; align-items: center; justify-content: center;"><br>
                <?php echo e($produto->detalhes); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </main>
    <footer>
        <p>Baron Satoshi &copy; 2021</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html><?php /**PATH C:\Laravel\loja\coffeeShop\resources\views/produtos.blade.php ENDPATH**/ ?>