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
                    @if(auth()->user())

                        <form action="{{route('p:update-party', [$partys->id])}}" method="POST">

                            @csrf
                            <div class="grid gap-8 space-x-5 lg:grid-cols-2 p-12 px-10">


                                <div class="flex flex-col items-center pb-8">

                                    @if(Session::has('success'))
                                        <p class="mt-5 text-2xl bg-emerald-500 rounded-full border-y-emerald-800 drop-shadow-lg p-3">
                                            {{ Session::get('success') }}
                                        </p>
                                    @endif
                                    @foreach($errors->all() as $error)
                                        <p class="text-2xl bg-red-500 rounded-full border-y-red-800 drop-shadow-lg p-3">{{$error}}</p>
                                    @endforeach
                                    <label class="mt-2 block text-gray-700 text-sm font-bold mb-2" for="constelation">
                                        Name
                                    </label>
                                        <input
                                            class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="name" name="name" placeholder="Name" value="{{$partys->name}}">

                                        <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="email">
                                            Are you playing the game right now?
                                        </label>
                                        <select class="form-control" name="is_playing" id="active">
                                            <option value="1" @if (old($partys->is_playing) == 1) selected @endif>Yes</option>
                                            <option value="0" @if (old($partys->is_playing) == 0) selected @endif>No</option>
                                        </select>

                                        <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="game">
                                            What game is this party for?
                                        </label>
                                        <input
                                            class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="game" name="game" value="{{$partys->game}}" placeholder="Pokemon Emerald">
                                    <a href=""
                                       class="mt-3 rounded-full bg-sky-600 hover:bg-sky-700 font-bold py-2 px-4 text-white justify-start ">
                                        <button type="submit">Submit changes</button>
                                    </a>
                                </div>

                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
