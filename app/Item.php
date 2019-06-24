<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $table = 'itens';

    public function produto(){
        return $this->hasOne('App\Produto');
    }
}
