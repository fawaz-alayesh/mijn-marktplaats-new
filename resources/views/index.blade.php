@extends('layouts.app')

@section('content')

<!-- images collection -->
<div class="relative px-2 lg:px-2">
  @if(session()->has('message'))
  <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
    <span class="font-medium"> {{ session()->get('message') }}.
  </div>
  @endif
  <div class="mx-auto max-w-3xl pt-5 pb-2 sm:pt-48 sm:pb-2">
    <div>
      <div class="grid grid-flow-col grid-rows-2 grid-cols-3 gap-8">
        <div class="transform scale-110 -rotate-6  ">
          <img class="overflow-hidden rounded-lg shadow-lg" src="./src/devon-janse-van-rensburg-cQHx11ku1Dk-unsplash.jpg" alt="" loading="lazy">
        </div>
        <div class="col-start-3 transform  scale-75 rotate-6 translate-x-2 translate-y-15">
          <img class="overflow-hidden rounded-lg shadow-lg" src="./src/sahil-patel-EvGvmsRsS1M-unsplash.jpg" alt="" loading="lazy">
        </div>
        <div class="transform scale-150 translate-y-11">
          <img class="overflow-hidden rounded-lg shadow-lg" src="./src/grahame-jenkins-p7tai9P7H-s-unsplash.jpg" alt="" loading="lazy">
        </div>
        <div class="transform translate-y-24">
          <img class="overflow-hidden rounded-lg shadow-lg" src="./src/florian-dormann-N4SGUrLEHxU-unsplash.jpg" alt="" loading="lazy">
        </div>
        <div class="row-start-1 col-start-2 col-span-2 transform  translate-y-4">
          <img class="overflow-hidden rounded-lg shadow-lg" src="./src/philipp-katzenberger-Y8-H19uSx-Y-unsplash.jpg" alt="" loading="lazy">
        </div>
      </div>
    </div>

    <div class="mx-auto max-w-3xl pt-20 pb-20 sm:pt-4 sm:pb-40">
      <div>
        <div class="hidden sm:mb-8 sm:flex sm:justify-center">
          <div class="relative overflow-hidden rounded-full py-1.5 px-4 text-sm leading-6 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
            <span class="text-gray-600">
              Als u meer wilt weten over ons bedrijf, klik dan op de <a href="{{ route('about') }}" class="font-semibold text-indigo-600"><span class="absolute inset-0" aria-hidden="true"></span>Lees meer <span aria-hidden="true">&rarr;</span></a>
            </span>
          </div>
        </div>
        <div>
          <h1 class="text-4xl font-bold tracking-tight sm:text-center sm:text-6xl">Mijn-Marktplaats.nl</h1>
          <p class="mt-6 text-lg leading-8 text-gray-600 sm:text-center">De plek om nieuwe en gebruikte spullen te verkopen of juist wel te kopen.</p>
          <div class="mt-8 flex gap-x-4 sm:justify-center">
            @guest
            @if (Route::has('login'))
            <a href="{{ route('login') }}" class="inline-block rounded-lg bg-indigo-600 md:px-4 px-2 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-indigo-600 hover:bg-indigo-700 hover:ring-indigo-700">
              Advertentie Maken
              <span class="text-indigo-200" aria-hidden="true"> +</span>
            </a>
            @endif
            @else
            <a href="{{ route('advertentie.create') }}" class="inline-block rounded-lg bg-indigo-600 md:px-4 px-2 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-indigo-600 hover:bg-indigo-700 hover:ring-indigo-700">
              Plaats advertentie
              <span class="text-indigo-200  hidden sm:inline" aria-hidden="true"> +</span>
            </a>
            @endguest
            <a href="{{ route('advertentie.index') }}" class="inline-block px-2 rounded-lg md:px-4 py-1.5 text-base font-semibold leading-7 text-gray-900 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
              Advertentie bekijken
              <span class="text-gray-400 hidden sm:inline" aria-hidden="true">&rarr;</span>
            </a>
          </div>
        </div>
      </div>

 @endsection