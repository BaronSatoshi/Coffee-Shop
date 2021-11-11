<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\produtos;
use App\Models\produtos_user;
use App\Models\carrinho;
use App\Models\carrinho_user;

class CoffeeShopController extends Controller
{

    /* parte da pagina welcome */
    public function index(){

        return view('welcome');
    }

    /* Tela de Produtos */ 
    //Função para mostrar todos os produtos do banco de dados, juntamento com um loop Foreach na view Produtos
    public function produtos(){
        $user = auth()->user();

        $produtos = produtos::all(); 
        
        return view('produtos', ['produtos' => $produtos]);
    }


    /* Tela do dashboard do usuario */
    //Função para mostrar a dashboard do usuário logado e cadastrado
    public function dashboard(){
        $user = auth()->user();

        //mostra os produtos que o usuário adicionou a lista de desejos
        $produtosAsPartipant = $user->produtosAsParticipant;

        return view('dashboard', ['produtosAsParticipant' => $produtosAsPartipant]);
    }
    
    //Função para adicionar o produto a lista de desejos usando o ID do produto e pegando o parâmetro pela URL
    public function wish($id){
        $user = auth()->user();

        $produto = produtos::findOrFail($id);

        //traz a função do model para o controller
        $aux = produtos_user::getExists($user->id, $id);

        //realiza uma condição onde se $aux for iguala 'False' deixe adicionar a lista de desejos, caso contrario não
        if ($aux == 'False'){
            $user->produtosAsParticipant()->attach($id);
            return redirect('/produtos')->with('msg', $produto->nome . ' Adicionado com sucesso a sua lista de desejos!!');
        } else{
            return redirect('/produtos')->with('msg2', 'Produto já existe na sua lista de desejo!!');
        }

    }

    //Função para excluir o produto da lista de desejos, pelo ID do produto
    public function leaveWish($id){

        $user = auth()->user();

        $user->produtosAsParticipant()->detach($id);

        $produtos = produtos::findOrFail($id);  

        return redirect('/dashboard')->with('msg', $produtos->nome . ' excluído com sucesso!!');
    }

    /* Tela do carrinho de compras */
    public function dashboard_carrinho(){
        $user = auth()->user();

        $carrinhoAsPartipant = $user->carrinhoAsParticipant;

        //Função para somar todos os valores de acordo com os produtos existentes no carrinho do usuário
        $soma = collect($carrinhoAsPartipant)->sum('preco');

        return view('carrinho', ['carrinhoAsParticipant' => $carrinhoAsPartipant, 'soma' => $soma]);
    }

    //Função para adicionar ao carrinho de compras
    public function wish_carrinho($id){
        $user = auth()->user();

        $produto = produtos::findOrFail($id);

        $aux = carrinho_user::getExists($user->id, $id);

        if ($aux == 'False'){
            $user->carrinhoAsParticipant()->attach($id);
            return redirect('/produtos')->with('msg', $produto->nome . '  Adicionado com sucesso ao carrinho!!');
        } else{
            return redirect('/produtos')->with('msg2', 'Produto já existe no seu carrinho!!');
        }

    }

    //Função para excluir do carrinho de compras
    public function leaveCart($id){
        $user = auth()->user();

        $user->carrinhoAsParticipant()->detach($id);

        $produtos = produtos::findOrFail($id);

        return redirect('/carrinho')->with('msg', ' excluído com sucesso!!');
    }

    //Função de pesquisa da tela de produtos
    public function search(){

        $search = request('search');
        //Função de pesquisa
        if($search){

            $produtos = produtos::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();

        }else{
            $produtos = produtos::all();
        }
        
        return view('produtos', [
            'produtos' => $produtos,
            'search' => $search
        ]);
    }


}
