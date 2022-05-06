<?php

namespace App\Models\Pokemon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PokemonUser extends Pivot
{
    use HasFactory;
}
