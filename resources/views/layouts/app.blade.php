<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Laravel Post</title>
        <link rel="stylesheet" href="{{ mix('css/index.css') }}">
    </head>

    <body class="bg-gray-200 min-h-screen flex flex-col justify-between">
        @include('layouts._header')
        <main class="mt-20 sm:mt-32 lg:mt-20">
            <section class="container mx-auto">
                @yield('section')
            </section>
        </main>
        @include('layouts._footer')
        @yield('script')
    </body>

</html>