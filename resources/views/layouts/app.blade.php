<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" ></script>
    </head>
    <body class="font-sans antialiased">

        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @include("session-messages")
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script>
            Livewire.on('numberSelected', data => {
                swal({
                    title: "Number available!",
                    text: data.limit === 3 ? 'Thank you. You can select up to ' + data.limit + " more numbers" : "Please select another",
                    icon: "success",
                    timer: 1000,
                    buttons: false
                })
            });

            Livewire.on('numberFilled', () => {
                swal({
                    title: "Number Unavailable",
                    text: "Please select another",
                    icon: "warning",
                    timer: 1000,
                    buttons: false,
                    dangerMode: true,
                })

            });

            Livewire.on('limitReached', () => {
                swal({
                    title: "Limit Reached",
                    text: "Please go to Next Steps",
                    icon: "error",
                    timer: 1000,
                    buttons: false,
                    dangerMode: true,
                })
            });

            function copyText() {

                /* Get the text field */
                var copyText = document.getElementById("copy");

                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                document.execCommand("copy");

                swal("copied successfully")
            }


        </script>
    </body>
</html>
