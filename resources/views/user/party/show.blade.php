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
                    <a href="{{route('p:party')}}">
                        <button
                            class="rounded-full bg-sky-600 hover:bg-sky-700 font-bold py-2 px-4 text-white p-6 justify-end">
                            Return to party list
                        </button>
                    </a>
                    <h1>Your party's</h1>


                    <div class="grid gap-8 space-x-5 lg:grid-cols-2 p-12 px-10">
                        <div class="flex flex-col items-center pb-8">
                            {{---todo temp img now need to implement profile picture ofc.--}}

                            @foreach ($partys as $party)
                                @foreach($party->users as $user)
                                    @if($user->pivot->user_id === auth()->user()->id)
ers                                    <h3 class="mb-1 text-xl font-medium text-gray-900 ">Name: {{$party->name}}</h3>
                                    <p class="mb-1 text-md font-medium text-gray-900 ">
                                        Nickname: {{$user->pivot->getOriginal('nickname')}} </p>
                                    <p class="mb-1 text-md font-medium text-gray-900 ">
                                        Level: {{$user->pivot->getOriginal('level')}}</p>
                                    <p class="mb-1 text-md font-medium text-gray-900 ">
                                        YOUR description about your pokemon: {{$user->pivot->getOriginal('description')}}</p>
                                    @endif
                                @endforeach
                            @endforeach

                        </div>
                        <div class="flex flex-col mt-5 pb-8">
                            <h1>pokemond images display here?</h1>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


