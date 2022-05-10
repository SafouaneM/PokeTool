<?php

use App\Http\Controllers\Character\CharacterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'App\Http\Controllers\Home@displayContent')->middleware(['auth'])->name('home');


//Start Profile
Route::prefix('profile')->group(function () {
    //Profile
    Route::get('/', 'App\Http\Controllers\User\Profile\ProfileController@getProfileDetails')->middleware(['auth'])->name('profile');
    Route::get('/edit/{id}', 'App\Http\Controllers\User\Profile\ProfileController@editProfileDetails')->middleware(['auth'])->name('p:edit-profile');
    Route::post('/edit/{id}', 'App\Http\Controllers\User\Profile\ProfileController@updateNewProfileDetails')->middleware(['auth'])->name('p:update-profile');
    Route::post('/remove/{id}', 'App\Http\Controllers\User\Profile\ProfileController@removeProfileDetails')->middleware(['auth'])->name('p:remove-profile');

    //Pokemon Pcbox
    Route::get('/pokemonbox', 'App\Http\Controllers\User\Profile\ProfileController@showPcBox')->middleware(['auth'])->name('p:pokemon_box');
    Route::get('/pokemonbox/create', 'App\Http\Controllers\User\Profile\ProfileController@createNewPokemonToBox')->middleware(['auth'])->name('p:create-pokemon_box');
    Route::post('/pokemonbox', 'App\Http\Controllers\User\Profile\ProfileController@storeNewPokemonToBox')->middleware(['auth'])->name('p:store-pokemon_box');
    Route::get('/pokemonbox/edit/{id}', 'App\Http\Controllers\User\Profile\ProfileController@editPcBox')->middleware(['auth'])->name('p:edit-pokemon_box');
    Route::post('/pokemonbox/edit/{id}', 'App\Http\Controllers\User\Profile\ProfileController@updatePcbox')->middleware(['auth'])->name('p:update-pokemon_box');
    Route::post('/pokemonbox/{id}', 'App\Http\Controllers\User\Profile\ProfileController@removePokemonFromBox')->middleware(['auth'])->name('p:remove-pokemon_box');

    //Party
    Route::get('/party', 'App\Http\Controllers\User\Party\PartyController@showParty')->middleware(['auth'])->name('p:party');
    Route::get('/party/create', 'App\Http\Controllers\User\Party\PartyController@createNewParty')->middleware(['auth'])->name('p:create-party');
    Route::post('/party', 'App\Http\Controllers\User\Party\PartyController@storeParty')->middleware(['auth'])->name('p:store-party');
    Route::get('/party/{id}', 'App\Http\Controllers\User\Party\PartyController@showIndividualParty')->middleware(['auth'])->name('p:show-party');
    Route::get('/party/edit/{id}', 'App\Http\Controllers\User\Party\PartyController@editParty')->middleware(['auth'])->name('p:edit-party');
    Route::post('/party/edit/{id}', 'App\Http\Controllers\User\Party\PartyController@updateParty')->middleware(['auth'])->name('p:update-party');
    Route::post('/party/{id}', 'App\Http\Controllers\User\Party\PartyController@removeParty')->middleware(['auth'])->name('p:remove-party');

});
//End profile

//Route::get('/characters', 'App\Http\Controllers\Character\CharacterController@index')->name('characters');
//Route::get('/characters/{id}', 'App\Http\Controllers\Character\CharacterController@showInvidualCharacter');


Route::get('/fetch', 'App\Http\Controllers\Pokemon\Collect@fetchMons')->middleware(['auth']);


require __DIR__ . '/auth.php';
