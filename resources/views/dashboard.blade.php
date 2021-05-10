<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Active Games') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
{{--                <x-jet-welcome />--}}
                <div class="bg-gray-50 border">
                    <div class="flex items-center justify-center leading-tight p-1">

                        <div class="flex items-center justify-center leading-tight p-1">
                            <a href="/game/create" class="inline-flex items-center justify-center px-5 py-1 border border-transparent text-base font-small rounded-md text-white bg-indigo-500 hover:bg-indigo-700">
                                Create New Game
                            </a>
                        </div>

                    </div>
                </div>

            </div>

            <livewire:games :games="$games" />

        </div>
    </div>
</x-app-layout>
