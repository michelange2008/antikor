@extends('layouts.guest')

@section('content')

<div class="flex flex-col  bg-neutral-500  min-h-screen">
  
  <div class="relative bg-center bg-neutral-400  dark:bg-gray-900">


    @if (Route::has('login'))
    <div class="flex justify-between items-center top-0  py-3 px-6 text-right">
      <img class="w-32  " src="{{ url('storage/img/logo.svg')}}" alt="Logo Antikor">
      @auth
        <a href="{{ url('/dashboard') }}"
        class="font-semibold text-gray-600 hover:text-black
          dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2
          focus:rounded-sm focus:outline-red-500">Dashboard</a>
      @else
        <a href="{{ route('login') }}"
        class="font-semibold text-gray-600 hover:text-black
          dark:text-gray-400 dark:hover:text-white focus:outline
          focus:outline-2 focus:rounded-sm focus:outline-red-500">Connexion</a>
      
          {{-- @if (Route::has('register'))
          <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
          @endif --}}
      @endauth
    </div>
    @endif
  </div>

  <div class=" flex flex-row justify-center content-center flex-wrap p-1 ">
    @foreach ($datas as $data)
      <div class="m-5 basis-1/4 text-gray-100 hover:text-black">
        <a class="flex flex-col items-center " href="{{ route($data->url) }}">
          <img class="w-64 min-w-xs max-w-sm m-1 hover:shadow-xl" src="{{url('storage/img/'.$data->img)}}" alt="{{ $data->texte}}">
          <p class="">{{ $data->texte}} </p>
        </a>
      </div>
    @endforeach
  </div>

  <footer class="flex flex-row justify-between fixed bottom-0 py-3 px-4 bg-black w-screen ">
    <p>ANTIKOR: Société coopérative de vétérinaires à capital variable</p>
    <p>605 Grande Rue - 26300 Barbières</p>
    <p>
      <a href="mailto:antikor@orange.fr">
        antikor@orange.fr
      </a>
    </p>
  </footer>
    
</div>
      
      @endsection
