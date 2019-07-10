<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Tipo
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Produto $produto
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tipo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tipo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tipo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tipo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tipo whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tipo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tipo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tipo extends Model
{

    public function produto(){
        return $this->hasOne('App\Produto');
    }
}
