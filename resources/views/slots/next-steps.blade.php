<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Next Steps') }}
        </h2>
    </x-slot>

    <div class="py-4">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mt-10 text-center">
                <h4>Thank you for supporting our fund-raising efforts for affordable housing and job placement</h4>
                <p>Here are your numbers <br> {{$numbers}}</p>
                <p>Please be sure to take care of them all</p>
            </div>

            <div class="mt-10 text-center">
                <div><a class="bg-green-500 rounded text-white p-3" href={{$link}}>Purchase your product here</a></div>
            </div>


        </div>
    </div>
</x-app-layout>
