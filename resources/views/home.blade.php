@extends('layouts.app')
@section('title' , 'Dashboard - ')
@section('content')

<!-- advertenties -->
<main class="py-2 px-1 w-full xl:w-3/4 md:w-2/3 sm:p-6 md:py-2 md:px-2 ">
<p class="font-bold text-2xl">Mijn Advertenties</p>
  @if(session()->has('message'))
  <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
    </svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
      {{ session()->get('message')}}
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-3" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
      </svg>
    </button>
  </div>
  @endif

  <div class="bg-transparent">
    <div class="mx-auto max-w-2xl py-4 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
      <!-- <h2 class="text-sm font-medium pb-4 text-gray-900">({{count($ads)}})Advertenties gevonden</h2> -->
      @if (count($ads) > 0)
      <div class="grid grid-cols-2 gap-y-4 gap-x-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 xl:gap-x-6">
        @foreach($ads as $ad)
        <div class="container ring-2 ring-gray-300 p-0 z-10 overflow-hidden rounded-lg bg-white">
          <div class="delete z-20 absolute ">
            <div class="edit">
              <a href="/advertentie/{{ $ad->slug }}/edit" class="bg-blue-100 text-gray-400 hover:text-blue-500 text-sm p-1.5 ml-auto inline-flex items-center dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M2.25,12.9378906 L2.25,15.75 L5.06210943,15.75 L13.3559575,7.45615192 L10.5438481,4.64404249 L2.25,12.9378906 L2.25,12.9378906 L2.25,12.9378906 Z M15.5306555,5.28145396 C15.8231148,4.98899458 15.8231148,4.5165602 15.5306555,4.22410082 L13.7758992,2.46934454 C13.4834398,2.17688515 13.0110054,2.17688515 12.718546,2.46934454 L11.3462366,3.84165394 L14.1583461,6.65376337 L15.5306555,5.28145396 L15.5306555,5.28145396 L15.5306555,5.28145396 Z" />
                </svg>
              </a>
            </div>
            <div class="delete">
              <form action="/advertentie/{{ $ad->slug }}" method="post" class="inline-block ">
                @csrf
                @method('delete')
                <button type="submit" class="text-gray-400 bg-red-100 hover:text-red-500 text-sm p-1.5 ml-auto inline-flex items-center dark:hover:text-white">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                  </svg>
                </button>
              </form>
            </div>
          </div>
          <a href="{{ route('advertentie.show', ['advertentie' => $ad['slug']]) }}" id="results" class="group aspect-w-1 aspect-h-1 w-full has-mask lg:h-75 shadow overflow-hidden rounded-lg bg-white">
            <div class="aspect-w-1 aspect-h-1 w-full has-mask md:h-72  h-48 object-center overflow-hidden bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
              <!-- php artisan storage:link is to Create a symbolic link with the help of artisan command as shown below -->
              <img src="{{ asset('uploads/'.$ad->filename)}}" alt="" class="h-full w-full object-cover groupad object-center transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
            </div>
            <h3 class="mt-4 m-2 text-sm text-gray-700">{{ $ad->title }}</h3>
            <p class="mt-1 m-2 text-lg font-medium text-gray-900"> {{"€".number_format($ad->price, 0, '.', ',')}}</p>

          </a>
        </div>
        @endforeach
      </div>
      <div class="container number mx-auto mt-10">
        <!-- page numbers -->
        {{ $ads->links('vendor.pagination.tailwind', ['class' => 'my-custom-pagination']) }}
      </div>
      @else
      <div class="container font-lg text-xl">
        <p class="">Je hebt nog geen Advertentie's </p>
        <a class="text-blue-400" href="/advertentie/create"> Maak een advertentie </a>
      </div>
      @endif
    </div>
  </div>
</main>

@endsection