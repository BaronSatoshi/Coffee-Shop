<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrinho extends Model
{
    use HasFactory;

    /*
    No carrinho usar um protected table para a tabela produtos, 
    para quando as informações voltarem para o usuário, ele posso percorrer a tabela 'produtos',
    e trazer as informações de acordo com o id do usuario e o id do produto que ele adicionou a tabela 'carrinho_user'.
    */

    protected $table = 'produtos';

    public function user(){
        return $this->hasMany('App\Models\User');
    }

    //Mostra quantos participantes há no evento
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
