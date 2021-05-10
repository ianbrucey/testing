<div>
    {{-- Stop trying to control. --}}
    <div class="text-center pt-3">
        <h1 class="font-medium text-2xl">Product: {{$game->product_name}}  </h1>
        <p><i><b>{{$game->buy_in}}/{{$game->prize}}</b></i></p>
        <p class="m-1">Select your numbers now. Once you're done, we'll let you know next steps. </br>You're responsible for every number you choose.</p>
        <a class="{{$nextSteps == "#" ? "bg-blue-400" : "bg-blue-900 hover:bg-blue-500"}} rounded text-white p-1 " href={{$nextSteps}}>Click here when done</a>
    </div>

    <div class="container my-12 mx-auto px-4 md:px-12">
        <div class="flex flex-wrap bg-gray-200">
            @forelse($slots as $slot)
                @if(!$slot->user_email)
                    @php($closed = false)
                @endif

            <div class="w-1/3 p-2" wire:click="reserveSlot({{$slot->id}})">
                <div  class="text-xs choose-number text-center rounded {{$slot->user_email ? "bg-gray-400 text-black" : "bg-green-600 text-white"}} p-2">{{ $slot->user_email ? "X" :  $slot->board_number}}</div>
            </div>
                @empty
                <div class="text-center">
                    No slots available
                </div>
            @endforelse
                @if($closed)
                    <div class="p-2" style="width: 100%">
                        <div data-slot="" class="rounded text-center p-2 bg-red-800 text-white">CLOSED</div>
                    </div>
                @endif
        </div>
    </div>
</div>



