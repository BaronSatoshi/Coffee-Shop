<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtos extends Model
{
    use HasFactory;

    
    //Mostra quantos eventos o usuário tem
    public function user(){
        return $this->hasMany('App\Models\User');
    }

    //Mostra quantos participantes há no evento
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
