<?php

namespace App\Http\Controllers\User\Party;

use App\Http\Controllers\Controller;
use App\Models\Party\Party;
use App\Models\Party\PartyPokemon;
use App\Models\Pokemon\Pokemon;
use Illuminate\Http\Request;

class PartyController extends Controller
{

    protected function showParty(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $partys = Party::with('users')->where('user_id' ,'=', auth()->user()->id)->get();

        return view('user.party.index', ['partys' => $partys]);
    }

    protected function showIndividualParty($id)
    {

        $partys = Party::find($id)->pokemons()->get();

        return view('user.party.show', ['partys' => $partys]);


    }

    protected function createNewParty(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $pokemons = Pokemon::with('users')->get();
        return view('user.party.create', ['pokemons' => $pokemons]);
    }


    protected function storeParty(Request $request): \Illuminate\Http\RedirectResponse
    {

        $party = Party::create(
            [
                'name' => $request->name,
                'is_playing' => $request->is_playing,
                'game' => $request->game,
                'user_id' => auth()->user()->id,
            ]);

        if ($request->post('pokemons')) {
            foreach ($request->post('pokemons') as $pokemonId) {

                PartyPokemon::create(
                    [
                        'pokemon_id' => $pokemonId,
                        'party_id' => $party->id,
                    ]

                );
            }
        }


        return redirect()->route('p:party');

    }
//
//    public function storeParty(Request $request) : \Illuminate\Http\RedirectResponse {
//        dd($request->all());
//    }


}
