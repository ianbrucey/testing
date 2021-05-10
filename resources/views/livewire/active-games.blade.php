<div>
    {{-- Stop trying to control. --}}
    <div class="container my-12 mx-auto px-4 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @forelse($games as $game)
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                    <!-- Article -->
                    <article class="overflow-hidden rounded-lg shadow-lg">

                        <header class="flex items-center justify-center leading-tight p-2 md:p-4 bg-green-600">
                            <h4 class="items-center text-center">
                                <p class="text-white p-2">
                                    Vendor: <b>{{ $game->user->name }}</b>
                                </p>

                                <p class="text-white ">
                                    Product Name: <b>{{ $game->product_name }}</b>
                                </p>
                            </h4>

                        </header>

                        <footer class="flex items-center justify-between leading-tight p-2 md:p-4">
                            <a class="flex no-underline hover:underline text-black" href="#">
                                <p class="ml-2 text-sm">
                                    Game rules: <b><span class="text-yellow-700">{{ $game->buy_in }}</span>/<span class="text-green-700">{{ $game->prize }}</span></b>
                                </p>
                            </a>
                            <a class="flex no-underline hover:underline text-black" href="#">
                                <button class="btn ml-2 text-sm">
                                    Status: <span class=" font-extrabold {{$game->status == 0 ? "text-green-500" : "text-red-500"}}">{{ $game->status == 0 ? "Open" : "Closed" }}</span>
                                </button>
                            </a>
                        </footer>
                        <footer class="flex items-center justify-between leading-tight p-2 md:p-4">
                            <a class="flex no-underline hover:underline text-black" href="#">
                                <p class="ml-2 text-sm">
                                    Winner: <b>{{ $game->winner ?: "tbd" }}</b>
                                </p>
                            </a>

                            @if($game->status == 0)
                                <a class="bg-green-500 hover:bg-green-900 text-white font-bold py-2 px-4 rounded" href="/slot/{{$game->id}}">
                                    Enter Game
                                </a>
                            @endif
                        </footer>

                    </article>
                    <!-- END Article -->

                </div>
            @empty
                <div class="text-center">
                    No active games yet. Contact your vendor for more details
                </div>
        @endforelse
        <!-- Column -->

            <!-- END Column -->
            <!-- END Column -->

        </div>
    </div>
</div>
