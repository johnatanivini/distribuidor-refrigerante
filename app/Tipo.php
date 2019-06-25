<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{

    public function produto(){
        return $this->hasOne('App\Produto');
    }
}
