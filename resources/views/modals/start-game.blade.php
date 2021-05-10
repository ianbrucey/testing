<!-- This example requires Tailwind CSS v2.0+ -->
<div class="{{$game->status == 2 ? "" : "hidden"}} fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Heroicon name: outline/exclamation -->
                        <i class="fa fa-play text-green-700"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                            Everyone's checked in! Please paste in the link to your live game and click start.
                        </h3>
                        <div class="mt-2">

                            <form onsubmit="wait(e)" id="start-game-form" action="/game/start/{{$game->id}}" method="POST">
                                @csrf
                                <input id="game-link" name="game_link" type="text" placeholder="ex: https://facebook.com/12345/live/67890" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button onclick="startGame()" type="button" id="start-game" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Start Game
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    let form = document.getElementById("start-game-form");

    function startGame() {
        let gameLink = document.getElementById("game-link");
        try {
            const url = new URL(gameLink.value);
        } catch (e) {
            swal("please submit a valid URL");
            return;
        }
        form.submit();
    }

    $(document).ready(function() {
        $(window).keydown(function(e){
            if(e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
        });
    });

</script>
