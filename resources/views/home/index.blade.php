@extends('home.layout.default', ['title => Home'])


@section('content')

    <div
        class="bg-main-bg bg-gradient-to-r from-cyan-500 to-blue-500 bg-fixed object-fill">
        <div class="grid grid-cols-2 p-12 mt-6 rounded-lg">


            <div
                class="mt-8 bg-violet-500 opacity-80 rounded overflow-hidden shadow-lg text-lg font-bold p-12 rounded-lg row-span-1">
                <h1 class="text-4xl text-amber-400 ">Status of players... </h1>
                <p class="text-white p-1">Currently nobody is playing! and if somebody was playing this is how it would look like
                </p>
            </div>
        </div>
    </div>

    <div
        class="bg-main-bg bg-gradient-to-r from-cyan-500 to-blue-500 bg-fixed object-fill">
        <div class="grid justify-items-center grid-cols-2 p-6 rounded-lg ">

            <div
                class="mt-8 bg-violet-500 opacity-80 rounded overflow-hidden shadow-lg text-lg font-bold p-12 rounded-lg ">
                <h1 class="text-4xl text-amber-400 ">Now playing! </h1>
                <ul class="list-roman text-white p-6">
                    Safouane (is playing pokemon emerald)
                    <li>Chikorita</li>
                    <li>MudderKip</li>
                    <li>Pikachu</li>
                    <li>Rofl</li>
                    <li>xD</li>
                    <li>Rayquaza</li>
                </ul>
            </div>
            <div
                class="mt-8 bg-violet-500 opacity-80 gap-5 rounded overflow-hidden shadow-lg text-lg font-bold p-12 rounded-lg row-span-1">
                <h1 class="text-4xl text-amber-400 ">Now playing! </h1>
                <ul class="list-roman text-white p-6">
                    Random-Dude (is playing pokemon ruby)
                    <li>Chikorita</li>
                    <li>MudderKip</li>
                    <li>Pikachu</li>
                    <li>Rofl</li>
                    <li>xD</li>
                    <li>Rayquaza</li>
                </ul>
            </div>
            <div
                class="mt-8 bg-violet-500 opacity-80 gap-5 rounded overflow-hidden shadow-lg text-lg font-bold p-12 rounded-lg row-span-1">
                <h1 class="text-4xl text-amber-400 ">Now playing! </h1>
                <ul class="list-roman text-white p-6">
                    Random-Dude (is playing pokemon ruby)
                    <li>Chikorita</li>
                    <li>MudderKip</li>
                    <li>Pikachu</li>
                    <li>Rofl</li>
                    <li>xD</li>
                    <li>Rayquaza</li>
                </ul>
            </div>
            <div
                class="mt-8 bg-violet-500 opacity-80 gap-5 rounded overflow-hidden shadow-lg text-lg font-bold p-12 rounded-lg row-span-1">
                <h1 class="text-4xl text-amber-400 ">Now playing! </h1>
                <ul class="list-roman text-white p-6">
                    Random-Dude (is playing pokemon ruby)
                    <li>Chikorita</li>
                    <li>MudderKip</li>
                    <li>Pikachu</li>
                    <li>Rofl</li>
                    <li>xD</li>
                    <li>Rayquaza</li>
                </ul>
            </div>
        </div>
        <p>Paginate button [0][1][2]</p>
    </div>

{{--Trainer block and some infromation start--}}
    <div style="background-image: url({{asset('storage/image/oras.jpeg')}})"
         class="bg-main-bg bg-gradient-to-r from-cyan-500 to-blue-500 bg-fixed object-fill">
        <div class="grid grid-cols-2 p-5 mt-3 rounded-lg">
            <div class="mt-12 text-lg font-bold text-center p-12 rounded-lg row-span-4">
{{--                <img src="{{asset('storage/image/cheeky.webp')}}" class="scale-125 pt-10" alt="">--}}
            </div>

            <div
                class="bg-violet-500 opacity-80 rounded overflow-hidden shadow-lg text-lg font-bold p-12 rounded-lg row-span-1">
                <h1 class="text-4xl text-amber-400 ">Hi Trainer, </h1>
                <p class="text-white p-2">Welcome to a Pokemon Tool application full of information about your favorite pokemons,
                    but also a place where you can connect to other people and see what they are upto (props playing pokemon ;) )
                </p>
                <p class="text-white p-2">If you create an account you can make use of the online task list and you're able to
                    create your party that you're using now in game. So that you can share that party + the game that
                    you're playing with other people that use this web-app :).
                    <br>
                    <br>
                    Eventually I'd like to make an integration with the actual games, so you can see your pokemon party stats in real time!
                </p>
            </div>

            <div
                class="mt-5 bg-violet-500 opacity-80 rounded overflow-hidden shadow-lg text-lg font-bold p-12 rounded-lg row-span-1">
                <h1 class="text-4xl text-amber-400 ">Features; </h1>
                <p class="text-white p-1">Here's a list of feature's you'll unlock on my Poketool web-app, after creating an account.
                </p>
                <ul class="list-roman text-white p-6">
                    <li>Party creator so others can see your party in real time(and yourself ofcourse).</li>
                    <li>Your own pokedex based on the game that you're playing, here you can also write your own entries.</li>
                    <li>Being able to connect with other people via clicking on their profile and starting a chat via the chat system (wip)</li>
                </ul>
            </div>
        </div>
    </div>

    {{--Trainer block and some infromation end--}}

    <div class="grid grid-cols-1 p-5">
        <div class="bg-violet-400 text-lg font-bold text-center p-12 rounded-lg row-span-2">
            <h1 class="text-amber-300">So what are you waiting for? Let's explore :)</h1>
            <a href="#">
                <button class="rounded-full bg-amber-400 hover:bg-amber-600 text-white font-bold py-2 px-4">Characters
                </button>
            </a>
            <a href="#">
                <button class="rounded-full bg-amber-400 hover:bg-amber-600 text-white font-bold py-2 px-4">Enemies
                </button>
            </a>
        </div>
    </div>

{{--copyright for mister nintendo   start --}}
    <p>genshin.app isn’t endorsed by <a href="https://www.mihoyo.com">miHoYo</a> and doesn’t reflect the views or opinions of miHoYo or anyone officially involved in producing or managing
        <a href="https://genshin.mihoyo.com/en/">Genshin Impact.</a>
        Genshin Impact and miHoYo are trademarks or registered trademarks of miHoYo. <br>
        Genshin Impact © miHoYo.</p>
    {{--copyright for mister nintendo    end --}}




@endsection
