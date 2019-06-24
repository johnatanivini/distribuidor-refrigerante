<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function marca()
    {
        return $this->hasOne('App\Marca');
    }

    public function sabor()
    {
        return $this->hasOne('App\Sabor');
    }

    public function tipo()
    {
        return $this->hasOne('App\Tipo');
    }

    public function litragem(){
        return $this->hasOne('App\Litragem');
    }

    public function item(){
        return $this->belongsTo('App\Item','produto_id');
    }

    public function quantidade(){
        return $this->belongsTo('App\Quantidade','produto_id');
    }
}
