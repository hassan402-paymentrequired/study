<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold flex justify-between text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex items-center gap-3">
                <span
                    class="w-8 h-8 rounded-full text-white bg-slate-400 text-center items-center justify-center font-bold">
                    {{ substr($room->user->email, 0, 2) }}

                </span>

                {{ __($room->topic) }}

            </div>
            <span class="md:hidden">
                <i class='bx bx-dots-horizontal-rounded'></i>
            </span>
        </h2>
    </x-slot>


    {{-- mobile query --}}
    <div class="flex md:hidden">

        {{-- friends message --}}
        <div class="flex">

        </div>

        {{-- mine --}}
        <div class="flex">

        </div>

    </div>

    {{-- large devies --}}


    <!-- component -->
    <div class="md:flex hidden h-screen overflow-hidden ">

        <div class="flex-1">


        </div>


        <!-- Main Chat Area -->
        <div class="flex-[3]">

            <!-- Chat Messages -->
            <div class="h-screen overflow-y-auto p-4 pb-36">

                @foreach ($room->message as $message)
                    


                @if ($message['user_id'] === Auth::user()->id)
                      <!-- Outgoing Message -->
                <div class="flex justify-end mb-4 cursor-pointer">
                    <div class="flex max-w-96 bg-indigo-500 text-white rounded-lg p-3 gap-3">
                        <p>{{ $message['content'] }}</p>
                    </div>
                    <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                        <img src="https://placehold.co/200x/b7a8ff/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="My Avatar"
                            class="w-8 h-8 rounded-full">
                    </div>
                </div>
                @else
                    
                <!-- Incoming Message -->
                <div class="flex mb-4 cursor-pointer">
                    <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                        <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar"
                            class="w-8 h-8 rounded-full">
                    </div>
                    <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
                        <p class="text-gray-700">{{ $message['content'] }}</p>
                    </div>
                </div>
                @endif

              

            @endforeach


            </div>

              
            <footer class="bg-white border-t border-gray-300 p-4 absolute bottom-0 w-3/4">
                <form method="POST" action="/message/create" class="flex items-center">
                    @csrf
                    <input type="hidden" name="room_id" value={{ $message['room_id'] }}>
                    <input type="text" name="message" placeholder="Type a message..."
                        class="w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500">
                    <button class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
                </form>
            </footer>
        </div>


    </div>
    <script>
        // JavaScript for showing/hiding the menu
        const menuButton = document.getElementById('menuButton');
        const menuDropdown = document.getElementById('menuDropdown');

        menuButton.addEventListener('click', () => {
            if (menuDropdown.classList.contains('hidden')) {
                menuDropdown.classList.remove('hidden');
            } else {
                menuDropdown.classList.add('hidden');
            }
        });

        // Close the menu if you click outside of it
        document.addEventListener('click', (e) => {
            if (!menuDropdown.contains(e.target) && !menuButton.contains(e.target)) {
                menuDropdown.classList.add('hidden');
            }
        });
    </script>


</x-app-layout>
