
<div class="flex flex-wrap bg-gray-200">

    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    @foreach($slots as $slot)
        @if(!$slot->user_email)
            @php($closed = false)
        @endif

        <div class="w-1/3 p-2">
            <div  class="text-xs text-center rounded {{ $slot->getSlotStatusClass() }} p-2" style="font-size: 0.5rem;">{{ $slot->getSlotStatusMsg() }} </div>
        </div>
    @endforeach
    @include("modals.start-game")
</div>
