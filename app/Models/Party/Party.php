<?php

namespace App\Models\Party;

use App\Models\Pokemon\Pokemon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'is_playing',
        'game',
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);

    }

    public function pokemonusers()
    {
        return $this->belongsToMany(User::class)
            ->withTimestamps()
            ->withPivot(['id'])
            ->withPivot(['is_owned'])
            ->withPivot(['is_shiny'])
            ->withPivot(['nickname'])
            ->withPivot(['description'])
            ->withPivot(['level']);

    }

    public function pokemons()
    {
        return $this->belongsToMany(Pokemon::class)
            ->withTimestamps()
            ->withPivot(['id'])
            ->withPivot(['party_id'])
            ->withPivot(['pokemon_id']);

    }

}
