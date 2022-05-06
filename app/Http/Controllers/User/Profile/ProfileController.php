<?php

namespace App\Http\Controllers\User\Profile;

use App\Http\Controllers\Controller;
use App\Models\Pokemon\Pokemon;
use App\Models\Pokemon\PokemonUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    protected function getProfileDetails(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = auth()->user();


        return view('user.profile', ['user' => $user]);
    }

    protected function editProfileDetails($id)
    {
        $user = User::find($id);

        return view('user.edit', ['user' => $user]);

    }

    protected function updateNewProfileDetails(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('profile_picture')) {

            $input = $request->except('profile_picture');

            $request->validate([
                'profile_picture' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $request->file('profile_picture')->store('profile_pictures', 'public');

            $user->profile_picture = $request->file('profile_picture')->hashName();
            $this->deleteOldImage();
            $user->fill($input)->save();

        } else {
            $input = $request->all();

            $user->fill($input)->save();
        }


        Session::flash('success', 'You have successfully edited your profile');

        return redirect()->back();
    }

    protected function deleteOldImage(): void
    {
        if (auth()->user()->profile_picture) {
            Storage::delete('/public/profile_pictures/' . auth()->user()->profile_picture);
        }
    }


    protected function removeProfileDetails($id)
    {
        $user = User::find($id);
//        $user->characters()->detach($user->user_id);
        $user->delete();

        return redirect()->back();

    }

    protected function showPcBox(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $pokemons = Pokemon::with('users')->get();

        return view('user.pokemon.index', ['pokemons' => $pokemons]);
    }
//
    protected function createNewPokemonToBox(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $pokemons = Pokemon::with('users')->get();
        return view('user.pokemon.create', ['pokemons' => $pokemons]);
    }

    protected function storeNewPokemonToBox(Request $request): \Illuminate\Http\RedirectResponse
    {

        if ($request->user()->pokemons()->find($request->input('pokemon_id'))) {
            return redirect()->back()->withErrors(['errors' => 'You already own this pokemon!']);
        }

//        if (dd(CharacterUser::where('is_owned', true)->where('character_id', '=', $request->character_id)->toSql())) {
//            return redirect()->back()->withErrors(['errors' => 'You already own this character']);
//        }


        PokemonUser::create( //connect character to user that pressed on submit button
            [
                'is_owned' => 1,
                'level' => $request->level,
                'nickname' => $request->nickname,
                'is_shiny' => $request->is_shiny,
                'description' => $request->description,
                'pokemon_id' => $request->pokemon_id,
                'user_id' => auth()->user()->id,
            ]);


        return redirect()->route('p:pokemon_box')
            ->with('success', 'Pokemon added to your box.');

    }

    protected function editPcBox($id)
    {
        $pokemonUser = PokemonUser::find($id);

        return view('user.pokemons.edit', ['pokemonUser' => $pokemonUser]);

    }

    protected function updatePcbox(Request $request, $id)
    {


        $pokemonUser = PokemonUser::findOrFail($id);


        $input = $request->all();

        $pokemonUser->fill($input)->save();


        Session::flash('success', 'You have successfully edited your pokemon information');

        return redirect()->back();
    }

    protected function removePokemonFromBox($id)
    {

        $pokemonUser = PokemonUser::findOrFail($id);
        $pokemonUser->delete();

        return redirect()->route('p:pokemon_box')->with('success', 'Pokemon removed from box.');
    }
}
