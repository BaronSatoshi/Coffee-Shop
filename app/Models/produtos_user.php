<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Exception;

class produtos_user extends Model
{
    //Forçar a utilizar a tabela "produtos_user"
    protected $table = 'produtos_user';


    //função para verificar se o ID do produto e o ID do usuario já existe na lista de desejo
    public function getExists($user_id, $produtos_id){
        try{
            $retorno = DB::table('produtos_user')
                ->where('produtos_id', '=', $produtos_id)
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
