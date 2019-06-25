<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }

    public function sabor()
    {
        return $this->belongsTo('App\Sabor');
    }

    public function tipo()
    {
        return $this->belongsTo('App\Tipo');
    }

    public function litragem(){
        return $this->belongsTo('App\Litragem');
    }

}
