<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Artist
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Album[] $albumCollection
 * @property-read int|null $album_collection_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Artist whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Artist extends Model {

    public $timestamps = true;
    protected $fillable = ['name'];

    public function albums() {
        return $this->hasMany(Album::class);
    }




}




