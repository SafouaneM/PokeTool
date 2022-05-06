<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-violet-300 border-b border-violet-200 ">
                    <a href="{{route('p:create-party')}}">
                        <button
                            class="rounded-full bg-sky-600 hover:bg-sky-700 font-bold py-2 px-4 text-white p-6 justify-end">
                            Create your party
                        </button>
                    </a>


                    <div class="grid gap-8 space-x-5 lg:grid-cols-2 p-12 px-10">
                        <div class="flex flex-col items-center pb-8">

                            <form method="POST" action="{{route('p:party')}}" enctype="multipart/form-data">
                                @csrf
                                <h1 class="text-2xl bg-fuchsia-700 rounded-full border-violet-500 drop-shadow-lg p-2">
                                    Add a new pokemon to your party</h1>

                                @foreach($errors->all() as $error)
                                    <p class="text-2xl bg-red-500 rounded-full border-y-red-800 drop-shadow-lg p-2">{{$error}}</p>
                                @endforeach
                                <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="Multiselect">
                                    Select your pokemon from your box
                                </label>

                                <select name="pokemons[]"
                                        id="select-role"
                                        multiple
                                        placeholder="Select your desired pokemon from your pc box..."
                                        autocomplete="off"
                                        class="mt-5 mb-1 w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline ">
                                    @foreach($pokemons as $pokemon)
                                        @foreach($pokemon->users as $user)
                                            @if($user->pivot->is_owned && $user->pivot->user_id === auth()->user()->id)
                                                <option value="{{$pokemon->id}}" class="">{{$pokemon->name}}</option>

                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>
                                <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="name">
                                    Name
                                </label>
                                <input
                                    class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="name" name="name" placeholder="Name">


                                <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="is_playing">
                                    Are you going to play immediately after making this party?
                                </label>
                                <select class="form-control" name="is_playing" id="active">
                                    <option value="1" @if (old('active') == 1) selected @endif>Yes</option>
                                    <option value="0" @if (old('active') == 0) selected @endif>No</option>
                                </select>

                                <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="game">
                                    What game is this party for?
                                </label>
                                <input
                                    class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="game" name="game" placeholder="Pokemon Emerald">

                                <a href=""
                                   class="rounded-full bg-sky-600 hover:bg-sky-700 font-bold py-2 px-4 text-white p-6 justify-end">
                                    <button type="submit">Add new party</button>
                                </a>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        new TomSelect('#select-role', {
            maxItems: 6,
        });
    </script>
</x-app-layout>


