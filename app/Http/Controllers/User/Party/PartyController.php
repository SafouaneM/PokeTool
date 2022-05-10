<?php

namespace App\Http\Controllers\User\Party;

use App\Http\Controllers\Controller;
use App\Models\Party\Party;
use App\Models\Party\PartyPokemon;
use App\Models\Pokemon\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



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

    protected function editParty($id)
    {
        $partys = Party::find($id);

        return view('user.party.edit', ['partys' => $partys]);

    }

    protected function updateParty(Request $request, $id)
    {

//        if ($request->level > 100) {
//            return redirect()->back()->withErrors(['errors' => 'Check your inputs that kind of value is not allowed']);
//        }

        $partys = Party::findOrFail($id);


        $input = $request->all();

        $partys->fill($input)->save();


        Session::flash('success', 'You have successfully edited your party information');

        return redirect()->back();
    }

    protected function removeParty($id)
    {

        $partys = Party::find($id);
        $partys->delete();

        return redirect()->route('p:party')->with('success', 'Party removed from list.');
    }


}
