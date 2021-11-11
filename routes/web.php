<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\http\Controllers\CoffeeShopController;

//Rota da pagina inicial
Route::get('/', [CoffeeShopController::class, 'index']);

//Rota da página de produtos
Route::get('/produtos', [CoffeeShopController::class, 'produtos']);

//Rota da pagina de produtos, conectada com a função de Search
Route::get('/produtos', [CoffeeShopController::class, 'search']);

//Rota da página de produtos, conectada com a função da lista de desejos
Route::post('produtos/wish/{id}',[CoffeeShopController::class, 'wish'])->middleware('auth');

//Rota da página produtos, que tem a função de excluir os produtos da dashboard do usuário
Route::delete('produtos/leave/{id}', [CoffeeShopController::class, 'leaveWish'])->middleware('auth');

//Rota da página do carrinho, onde traz os produtos que o usuário marcou para adicionar ao carrinho
Route::get('/carrinho', [CoffeeShopController::class, 'dashboard_carrinho'])->middleware('auth');

//Rota da pagina de produto que conecta com a do carrinho, basicamente tem a mesma função que o WISH
Route::post('carrinho/wish_carrinho/{id}', [CoffeeShopController::class, 'wish_carrinho'])->middleware('auth');

//Rota da pagina do carrinho, mesma função da LeaveWish, excluir o produto do carrinho
Route::delete('carrinho/leaveCart/{id}', [CoffeeShopController::class, 'leaveCart'])->middleware('auth');

//Rota da dashboard do usuário, onde tem a função de apresentar os produtos adicionados a ela
Route::get('/dashboard', [CoffeeShopController::class, 'dashboard'])->middleware('auth');
