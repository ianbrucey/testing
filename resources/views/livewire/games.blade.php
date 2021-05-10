<div>
    {{-- Stop trying to control. --}}
    <div class="container my-12 mx-auto px-4 md:px-12">
        <div class="flex flex-wrap -mx-1 lg:-mx-4">
            @forelse($games as $game)
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                    <!-- Article -->
                    <article class="overflow-hidden rounded-lg shadow-lg">


                        <header class="flex items-center justify-center leading-tight p-2 md:p-4 bg-indigo-500 ">
                            <h4 class="items-center text-center">
                                <p class="no-underline text-white" >
                                    Product Name: {{ $game->product_name }}
                                </p>
                            </h4>

                        </header>

                        <footer class="flex items-center justify-between leading-tight p-2 md:p-4">
                            <a class="flex no-underline  text-black" >
                                <p class="ml-2 text-sm">
                                    Win Ratio: {{ $game->buy_in }}/{{ $game->prize }}
                                </p>
                            </a>
                            <a class="flex no-underline  text-black" >
                                <p class="ml-2 text-sm">
                                    Status: <span class="{{ \App\Models\Game::STATUS_DISPLAY_COLOR[$game->status] }}">{{ \App\Models\Game::STATUS_DISPLAY_MSG[$game->status] }}</span>
                                </p>
                            </a>
                        </footer>
                        <footer class="flex items-center justify-between leading-tight p-2 md:p-4">
                            <a class="flex no-underline  text-black" >
                                <p class="ml-2 text-sm">
                                    Check-ins: {{ $game->check_ins }}
                                </p>
                            </a>
                            <a class="flex no-underline  text-black" >
                                <p class="ml-2 text-sm">
                                    Winner: <b>{{ $game->winner ?: "TDB" }}</b>
                                </p>
                            </a>

                        </footer>
                        @if($game->status != \App\Models\Game::STATUS_COMPLETED)
                            <footer class="text-center justify-center leading-tight p-2 md:p-4 border">
                                <h2>Provide the link below to your players.</h2>
                                <p><input readonly class="border-none font-bold" style="background: transparent; font-size: 16px;" type="text" id="copy" value="{{sprintf("%s/slot/%s", env("APP_URL"), $game->id)}}" ></p>
                                <button class="btn rounded bg-green-400 p-2 text-white m-2" onclick="copyText()">Copy The Link</button>

                            </footer>
                            <footer class="flex items-center justify-center leading-tight p-2 md:p-4 border">
                                <a class="btn rounded p-2 bg-blue-500 text-white" href="/game/lobby/{{$game->id}}">Go to Game Lobby</a>
                            </footer>
                        @endif


                    </article>
                    <!-- END Article -->

                </div>
            @empty
                <div class="text-center">
                    No active games yet. Create one above
                </div>
            @endforelse
            <!-- Column -->

            <!-- END Column -->
            <!-- END Column -->

        </div>
    </div>
</div>
