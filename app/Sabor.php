<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Sabor
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Produto $produto
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sabor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sabor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sabor query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sabor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sabor whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sabor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Sabor whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sabor extends Model
{
    protected $table = 'sabores';

    public function produto(){
        return $this->hasOne('App\Produto');
    }
}
