<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sabor extends Model
{
    protected $table = 'sabores';

    public function produto(){
        return $this->hasOne('App\Produto');
    }
}
