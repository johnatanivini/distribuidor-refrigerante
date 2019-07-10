<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Marca
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Produto $produto
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Marca newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Marca newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Marca query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Marca whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Marca whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Marca whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Marca whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Marca extends Model
{
    //
    public function produto(){
        return $this->hasOne('App\Produto');
    }
}
