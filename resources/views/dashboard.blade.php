<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between item-center">
           <span> {{ __('Classrooms') }}</span>

            <a href="/room/create" class="text-white p-1 border rounded bg-gray-900 text-sm font-bold">Create room</a>
        </h2>
    </x-slot>
    {{-- wrapper --}}
    <div class="flex w-full gap-3 p-3 h-full">

        {{-- filter --}}
        <div class=" h-screen p-2 flex-col space-y-3 flex-1 md:flex hidden  ">
            <h2 class=" text-2xl  text-white font-semibold mb-3">Recent Topic</h2>

            <div class="flex flex-col space-y-3 p-2 w-full bg-gray-800">

                <a href="#" class="text-white text-base font-semibold py-2">
                    <span>Javascript</span>
                </a>

                <a href="#" class="text-white text-base font-semibold py-2">
                    <span>PHP</span>
                </a>

                <a href="#" class="text-white text-base font-semibold py-2">
                    <span>PYTHON</span>
                </a>

                <a href="#" class="text-white text-base font-semibold py-2">
                    <span>NODE JS</span>
                </a>

            </div>
        </div>

        {{-- main  --}}

        <div class="flex h-screen  overflow-hidden flex-1 p-2 space-y-3 overflow-y-auto md:flex-[3] flex-col  w-full"
         style="scrollbar-width: none ">

            <h2 class="md:text-2xl text-lg text-white font-semibold mb-3">Active Room</h2>

            @foreach ($rooms as $room)
                {{-- class --}}
                <div
                    class="flex rounded-md  bg-gray-800 mb-24 flex-col p-2  gap-3 w-full border">

                  

                    {{-- creator --}}
                    <div class="flex items-center gap-3 ">
                        <span
                            class="w-8 h-8 rounded-full text-white bg-slate-400 text-center items-center justify-center font-bold">
                            {{ substr($room->user->email, 0, 2) }}
                        </span>

                        <div class="flex flex-col">
                            <span class="rounded-full text-white text-base font-semibold ">
                                {{ $room->user->name }}
                            </span>
                            <span class="rounded-full text-white text-sm font-bold">
                                {{ $room->user->email }}
                            </span>
                        </div>

                        <span class="text-sm font-semibold self-start ml-24 text-gray-400">
                            {{ $room->created_at }}

        
                        </span>


                    </div>

                    {{-- desc --}}

                    <a href="/room/{{ $room->id }}" class="flex flex-col gap-3 pl-3">

                     

                        <p class="text-base font-semibold text-white">{{ $room->description }}</p>

                    </a>

                    <hr>
                    {{-- created & join --}}

                    <div class="flex items-center justify-between px-3">


                        <span class="text-xs font-semibold text-gray-400"> 
                            {{ count($room->users) }} Joined

                        </span>
    
                        {{--  --}}

                        <h1 class="p-2 text-gray-300 bg-gray-700 text-sm font-semibold rounded-lg">
                            {{ $room->topic }}
                        </h1>

                        
                  
                    </div>


                </div>
            @endforeach




        </div>

        {{-- recent --}}

        <div class="hidden flex-1 md:flex"></div>


    </div>
</x-app-layout>
