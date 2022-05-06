<?php

namespace App\Http\Controllers\Pokemon;

use App\Http\Controllers\Controller;
use App\Models\Pokemon\Pokemon;
use Illuminate\Support\Facades\Http;


class Collect extends Controller
{




    public function fetchMons(): string
    {

        for ($id = 1; $id < 387; $id++) {
            $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$id}");
            $pokemon = json_decode($response->body());

                $pokemons = new Pokemon;
                $pokemons->name = $pokemon->name;
                $pokemons->abilities = $pokemon->abilities;
                $pokemons->image = $pokemon->sprites->other->home->front_default;
                $pokemons->icon = $pokemon->sprites->front_default;

                $pokemons->save();

        }

        return "Finished";
    }
}
