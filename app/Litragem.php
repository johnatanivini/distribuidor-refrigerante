<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Litragem
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Produto $produto
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litragem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litragem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litragem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litragem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litragem whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litragem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Litragem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Litragem extends Model
{
    protected $table = 'litragens';

    public function produto(){
        return $this->hasOne('App\Produto');
    }

}
