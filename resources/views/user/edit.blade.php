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
                        <form action="{{route('p:update-profile', [$user->id])}}" method="POST"
                              enctype="multipart/form-data">

                            @csrf
                            <div class="grid gap-8 space-x-5 lg:grid-cols-2 p-12 px-10">


                                <div class="flex flex-col items-center pb-8">


                                    @if(isset($user->profile_picture))
                                        <img class="mb-3 w-24 h-24 rounded-full shadow-lg"
                                             src="{{asset("storage/profile_pictures/$user->profile_picture")}}"
                                             alt="Ico_img"/>
                                    @else
                                        <img class="mb-3 w-24 h-24 rounded-full shadow-lg"
                                             src="{{asset('img/mona.png')}}"
                                             alt="Ico_img"/>
                                    @endif
                                    {{--                                    {{dd(asset("storage/profile_pictures$user->profile_picture"))}}--}}
                                    @foreach($errors->all() as $error)
                                        <p class="text-2xl bg-red-500 rounded-full border-y-red-800 drop-shadow-lg p-2">{{$error}}</p>
                                    @endforeach
                                    @if(Session::has('success'))
                                        <p class="mt-5 text-2xl bg-emerald-500 rounded-full border-y-emerald-800 drop-shadow-lg p-2">
                                            {{ Session::get('success') }}
                                        </p>
                                    @endif

                                    <label class="mt-2 block text-gray-700 text-sm font-bold mb-2"
                                           for="profile_picture">
                                        Profile Picture
                                    </label>
                                    <input type="file" name="profile_picture" class="justify-start py-2 px-3">

                                    <label class="mt-2 block text-gray-700 text-sm font-bold mb-2" for="username">
                                        Username
                                    </label>
                                    <input
                                        class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 font-bold text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="username" name="username" value="{{$user->username}}">

                                    <label class="mt-1 block text-gray-700 text-sm font-bold mb-2" for="email">
                                        Email
                                    </label>
                                    <input
                                        class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 font-bold text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="email" name="email" value="{{$user->email}}">

                                    <label class="mt-1 block text-gray-700 text-sm font-bold mb-2"
                                           for="adventure_level">
                                        Adventure Rank
                                    </label>
                                    <input
                                        class="mb-1 shadow appearance-none border rounded w-full py-2 px-3 font-bold text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="adventure_level" name="adventure_level" type="number" min="0" max="60"
                                        value="{{$user->adventure_level}}">

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


