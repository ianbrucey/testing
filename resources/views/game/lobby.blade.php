<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game Lobby: ') }} <br>{{ $game->product_name }}
        </h2>
    </x-slot>

    <div class="py-4">
        <p class="text-center text-sm w-2/3 ml-auto mr-auto">Please remain on the page while you wait for player to check-in. Once everyone confirms their check in, you will receive a prompt to start the game</p>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{--TABLE --}}

                    <livewire:lobby-slots :game="$game" />


            {{--END TABLE --}}

        </div>
    </div>
    <script>
        Echo.private(`update-slot.{{$game->id}}`)
            .listen('UpdateSlot', (e) => {
                console.table(e.game);
            });
    </script>
</x-app-layout>
