<?php

namespace App\Models;

use App\Models\Scopes\MovieScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getDeletedAtColumn()
    {
        return 'delete_at';
    }

    // Am creat artist_movie, pentru a fi conform cu normele Laravel; daca as fi numit tabela 'movie_artist' ar fi trebuit sa setez asta pe modelele implicate: return $this->belongsToMany(Artist::class, 'movie_artist');
    public function artists()
    {
        return $this->belongsToMany(Artist::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new MovieScope());
    }
}
