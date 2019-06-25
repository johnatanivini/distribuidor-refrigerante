<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Litragem extends Model
{
    protected $table = 'litragens';

    public function produto(){
        return $this->hasOne('App\Produto');
    }

}
