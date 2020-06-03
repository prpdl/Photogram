<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Album
 *
 * @property int $id
 * @property string $title
 * @property string $gerne
 * @property string $year
 * @property string|null $top100
 * @property int|null $artist_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Artist $artistObject
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Listener[] $listeners
 * @property-read int|null $listeners_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Album newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Album newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Album query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Album whereArtistId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Album whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Album whereGerne($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Album whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Album whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Album whereTop100($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Album whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Album whereYear($value)
 * @mixin \Eloquent
 */
class Album extends Model
{

    public $timestamps = true;

    protected $fillable = ['artist_id'];

    public function artist(){
        return $this->belongsTo(Artist::class, 'artist_id');
    }

    public function listeners(){
        return $this->belongsToMany(Listener::class);
    }

}
