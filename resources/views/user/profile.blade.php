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
                                <h3 class="mb-1 text-xl font-medium text-gray-900 ">Username: {{$user->username}}</h3>
                                <p class="mb-1 text-md font-medium text-gray-900 ">First Name: {{$user->first_name}}</p>
                                <p class="mb-1 text-md font-medium text-gray-900 ">Email: {{$user->email}}</p>
                                <p class="mb-1 text-md font-medium text-gray-900 ">Adventure
                                    Rank: {{$user->adventure_level}}</p>


                            </div>

                            <div class="flex flex-col mt-5 pb-8" x-cloak x-data="{ open: false }">

                                <a href="{{route('p:edit-profile', [$user->id])}}"
                                   class="text-center rounded-full bg-emerald-600 hover:bg-emerald-700 font-bold py-2 px-4">
                                    Edit</a>


                                <button @click="open = true"
                                        class="rounded-full font-bold  bg-rose-500 hover:bg-rose-700 font-bold py-2 px-4 mt-5 text-center">
                                    Remove
                                </button>

                                <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full"
                                     style="background-color: rgba(0,0,0,.5);" x-show="open">
                                    <div
                                        class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0"
                                        @click.away="open = false">
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h1 class="text-2xl font-medium leading-6 text-gray-900">
                                                Are you sure that you want to remove your account {{$user->full_name}}?
                                            </h1>
                                            <div class="mt-2">
                                                <p class="text-sm leading-5 text-gray-500">
                                                    There is no way back after removing your account!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-5 sm:mt-6 flex w-1/2 justify-end rounded-md ">
                                            <form action="{{route('p:remove-profile', $user->id)}}" class=""
                                                  method="POST">
                                                @csrf
                                                <button @click="open = false"
                                                        class="inline-flex justify-center w-auto px-4 py-2 text-white bg-rose-500 rounded hover:bg-rose-700">
                                                    Remove
                                                </button>
                                            </form>
                                            <button @click="open = false"
                                                    class="inline-flex justify-center w-auto ml-6  px-4  py-2 text-white bg-emerald-500 rounded hover:bg-emerald-700">
                                                Take me back!
                                            </button>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


