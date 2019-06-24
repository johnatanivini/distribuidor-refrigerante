<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Quantidade extends Model
{
    public function produto(){
        return $this->hasOne('App\Produto');
    }
}
