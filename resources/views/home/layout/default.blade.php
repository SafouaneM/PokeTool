<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('storage/image/favicon.ico')}}">
    <link rel="stylesheet" href="https://pagecdn.io/lib/font-awesome/5.10.0-11/css/all.min.css" integrity="sha256-p9TTWD+813MlLaxMXMbTA7wN/ArzGyW/L7c5+KkjOkM=" crossorigin="anonymous">
    <title>Home</title>


</head>
<body class="bg-[#313765] bg-no-repeat bg-contain py-10">


<nav class="flex flex-row md:w-12/12 justify-between bg-[#4c5493] text-white p-7 top-0 fixed inset-x-0 z-50 ">

    <div class="px-10"> <a href="/"> <span class="roboto text-2xl">Poketool</span> </a>
    </div>

    <div class="flex flex-row">
        <a href="#"><button class="mx-2 bg-amber-400 hover:bg-amber-600 rounded-lg px-5 ">something idk yet</button></a>
        {{--        <span class="mx-2">Enemies(wip)</span>--}}
        @if (Route::has('login'))
            @auth
                <a href="{{url('/profile')}}"><button class="mx-2 bg-emerald-400 hover:bg-amber-600 rounded-lg px-5">Profile</button></a>
            @else
                <span class="mx-2"><a href="{{ route('login') }}" class="underline">Log in</a></span>

                @if (Route::has('register'))
                    <span class="mx-2"><a href="{{ route('register') }}" class="underline">Register</a></span>
                @endif
            @endauth
        @endif

    </div>
</nav>
<main class="app h-screen w-full md:w-11/12 m-auto">

    @yield('content')


</main>


</body>
</html>

