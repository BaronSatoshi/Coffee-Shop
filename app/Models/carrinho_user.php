<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;

class carrinho_user extends Model
{
    use HasFactory;
    /*
    Ao fazer esse protected table eu faço com que esse model olhe somente para esse tabela e quando o usuário for adicionar o produto ao carrinho,
    ele só adicione ao carrinho e não a lista de desejos, fazendo assim que não haja nenhum tipo de problema ou interferência entre as tabela e as dashboards.
    */

    
    protected $table = 'carrinho_user';

    public function user(){
        return $this->hasMany('App\Models\User');
    }

    //Mostra quantos participantes há no evento
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    //Função que confere se o produto ja foi adicionado ao carrinho, se ja foi adicionado não deixa adicionar novamente, caso contrario deixa adicionar
    public function getExists($user_id, $carrinho_id){
        try{
            $retorno = DB::table('carrinho_user')
                ->where('carrinho_id', '=', $carrinho_id)
                ->where('user_id', '=', $user_id)
                ->first('*');

            if ($retorno){
                return 'True';
            }
                return 'False';

        }catch(Exception $e){
            print_r('Aqui');
            return 'False';
        }
        
    }

    


}
