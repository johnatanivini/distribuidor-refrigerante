<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Produto
 *
 * @property int $id
 * @property int $sabor_id
 * @property int $tipo_id
 * @property int $marca_id
 * @property int $litragem_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float $valor
 * @property int $quantidade
 * @property-read \App\Litragem $litragem
 * @property-read \App\Marca $marca
 * @property-read \App\Sabor $sabor
 * @property-read \App\Tipo $tipo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Produto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Produto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Produto query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Produto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Produto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Produto whereLitragemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Produto whereMarcaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Produto whereQuantidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Produto whereSaborId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Produto whereTipoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Produto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Produto whereValor($value)
 * @mixin \Eloquent
 */
class Produto extends Model
{

    protected $fillable = [
        'marca_id',
        'tipo_id',
        'valor',
        'quantidade',
        'litragem_id',
        'sabor_id',
        'id'
    ];

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
