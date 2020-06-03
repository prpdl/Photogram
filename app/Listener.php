<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

 /**
 * App\Listener
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Album[] $albums
 * @property-read int|null $albums_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Listener newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Listener newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Listener query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Listener whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Listener whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Listener whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Listener whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Listener extends Model {

     public $timestamps = true;

     public function albums(){
         return $this->belongsToMany(Album::class);
     }

}
