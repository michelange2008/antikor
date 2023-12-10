<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased">

      @show

      <div class="p-2 mb-2 bg-neutral-400">
        <img class="w-32" src="{{ url('storage/img/logo.svg')}}" alt="">
      </div>

      <div class="flex flex-col md:flex-row">

          <div class="fixed top-16 m-2 w-0 md:w-24 lg:w-32">
    
              <x-menu-guest></x-menu-guest>
    
          </div>
            
          <main class="justify-end px-8 grow md:ml-32 lg:ml-36">
    
              {{ $slot }}
    
          </main>

      </div>
      

    </body>

</html>
