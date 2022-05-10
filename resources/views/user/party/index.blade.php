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
                            Create a new party
                        </button>
                    </a>
                    <h1>Your party's</h1>
                    @foreach($partys as $party)

                        <div class="grid gap-8 space-x-5 lg:grid-cols-2 p-12 px-10">
                            <div class="flex flex-col items-center pb-8">
                                {{---todo temp img now need to implement profile picture ofc.--}}


                                <h3 class="mb-1 text-xl font-medium text-gray-900 ">Name: {{$party->name}}</h3>
                                <p class="mb-1 text-md font-medium text-gray-900 ">More details about <a
                                        href="party/{{$party->id}}"
                                        class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        {{$party->name}}
                                    </a></p>
                                <p class="mb-1 text-md font-medium text-gray-900 ">Is currently
                                    playing?: {{$party->is_playing}} </p>

                                <p class="mb-1 text-md font-medium text-gray-900 ">
                                    Game: {{$party->game}}</p>

                            </div>
                            <div class="flex flex-col mt-5 pb-8">
                                                                        <a href="{{route('p:edit-party', $party->id)}}" class="text-center rounded-full bg-emerald-600 hover:bg-emerald-700 font-bold py-2 px-4">
                                                                            Edit
                                                                        </a>

                                                                        <form action="{{route('p:remove-party', $party->id)}}" class="rounded-full font-bold  bg-rose-500 hover:bg-rose-700 font-bold py-2 px-4 mt-5 text-center" method="POST">
                                                                            @csrf
                                                                            <a href="" class="rounded-full font-bold  bg-rose-500 hover:bg-rose-700 font-bold py-2 px-4 mt-5 text-center">
                                                                                <button
                                                                                    type="submit"
                                                                                    class="">
                                                                                    Remove
                                                                                </button>
                                                                            </a>
                                                                        </form>

                            </div>
                        </div>

                    @endforeach


                </div>
            </div>
        </div>
    </div>
</x-app-layout>


