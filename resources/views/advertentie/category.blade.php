@extends('layouts.app')
@section('title', $category->name . ' - ')
@section('content')

<!-- advertenties -->
<main class="py-2 px-1 w-full xl:w-3/4 md:w-2/3 sm:p-6 md:py-2 md:px-2 ">
  <div id="map" class="w-full z-10  rounded-lg shadow ">
    <div data-tooltip-target="tooltip-bottom" data-tooltip-placement="bottom" id='remove-directions' class="bg-neutral-50 hover:bg-gray-200 absolute right-0 bottom-4 w-8 h-8 cursor-pointer z-10 flex items-center justify-center rounded-lg m-2 border-solid border-2 "> <img src="../src/direction(1).png" alt=""></div>
    <div id="tooltip-bottom" role="tooltip" class="inline-block z-10 py-2 px-3 text-sm font-medium text-white bg-zinc-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
      <ul>
        <li>1.Activeer direction: Klik eerst <br>
          <div class="flex flex-row">
            <div>op het button </div>
            <div class="bg-white w-6 h-6 ml-2 cursor-pointer  z-10 flex items-center justify-center shadow rounded-lg  border-solid border-2 border-indigo-60"> <img src="../src/direction(1).png" alt=""></div>
          </div>
        </li>
        <li>2.klik op twee verschillende plaatsen</li>
        <li>3.Kijk direction tips, Tijd en afstand</li>
        <li>* Om de Navigatie uit te schakelen Klik weer <br>
          <div class="flex flex-row">
            <div>op het button </div>
            <div class="bg-white w-6 h-6 ml-2 cursor-pointer  z-10 flex items-center justify-center shadow rounded-lg  border-solid border-2 border-indigo-60"> <img src="../src/direction(1).png" alt=""></div>
          </div>
        </li>
      </ul>
      <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
  </div>
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
    <div class="w-full flex justify-between pt-5">
      <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="{{ route('advertentie.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-purple-600 dark:text-gray-400 dark:hover:text-white">
              <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
              </svg>
              Advertenties
            </a>
          </li>
          <li>
            <div class="flex items-center">
              <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
              </svg>
              <p class="ml-1 text-sm font-semibold text-purple-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{ $category->name }}</p>
            </div>
          </li>
        </ol>
      </nav>
      <!-- Sorteren form -->
      <form action="{{ url()->current() }}" method="GET">
        <div class="flex items-center space-x-2">
          <label for="sort-select" class="text-gray-600 dark:text-gray-400">
            Sorteren op:
          </label>
          <div class="relative">
            <select name="sort" id="sort-select" onchange="this.form.submit()" class="block appearance-none w-full bg-white border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-300 px-4 py-2 pr-8 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-xs sm:text-sm">
              <option value="price_asc" class="text-xs sm:text-sm" Request::get('sort')==='price_asc' ? 'selected' : '' }}>
                Prijs (laag naar hoog)
              </option>
              <option value="price_desc" class="text-xs sm:text-sm" {{ Request::get('sort') === 'price_desc' ? 'selected' : '' }}>
                Prijs (hoog naar laag)
              </option>
              <option value="date_asc" class="text-xs sm:text-sm" {{ Request::get('sort') === 'date_asc' ? 'selected' : '' }}>
                Datum (oudste eerst)
              </option>
              <option value="date_desc" class="text-xs sm:text-sm" {{ Request::get('sort') === 'date_desc' ? 'selected' : '' }}>
                Datum (nieuwste eerst)
              </option>
            </select>
          </div>
        </div>
      </form>
    </div>
    <div class="mx-auto max-w-2xl py-4 px-4 sm:py-12 sm:px-6 lg:max-w-7xl lg:px-8">
      @if (count($ads) > 0)

      <div class="grid grid-cols-2 gap-y-4 gap-x-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 xl:gap-x-4">
        @foreach($ads as $ad)

        <a href="{{ route('advertentie.show', ['advertentie' => $ad['slug']]) }}" id="results" class="group aspect-w-1 aspect-h-1 w-full has-mask lg:h-75 shadow overflow-hidden rounded-lg bg-white">
          <div class="aspect-w-1 aspect-h-1 w-full has-mask md:h-72  h-48 object-center overflow-hidden bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
            <!-- php artisan storage:link is to Create a symbolic link with the help of artisan command as shown below -->
            <img src="{{ asset('uploads/'.$ad->filename)}}" alt="" class="h-full w-full object-cover groupad object-center transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
          </div>
          <h3 class="mt-4 m-2 text-sm text-gray-700">{{ $ad->title }}</h3>
          <p class="mt-1 m-2 text-lg font-medium text-gray-900">{{"€".number_format($ad->price, 0, '.', ',')}}</p>
        </a>

        @endforeach
      </div>

      <div class="container number mx-auto mt-10">
        <!-- page numbers -->
        {{ $ads->links('vendor.pagination.tailwind', ['class' => 'my-custom-pagination']) }}
      </div>
      @else
      <p>Geen Advertenties gevonden</p>
      @endif
    </div>
  </div>

</main>

<script>
// Set Mapbox access token
mapboxgl.accessToken = 'pk.eyJ1IjoibWJvdWxkbyIsImEiOiJjanc3NWc4cWQxaWlwNDlubms3cTRkZDAwIn0.hRPJTjbBufd9HVTTpXW4zg';

// Create new Mapbox map
const map = new mapboxgl.Map({
  container: 'map', // container element ID
  style: 'mapbox://styles/mapbox/light-v11', // map style
  center: [5.623763947732192, 52.17114847745034], // initial center of map
  zoom: 5.6, // initial zoom level of map
  pitch: 5, // initial pitch of map
  bearing: 35 // initial bearing of map
});

// Create locations object
const locations = {
  'type': 'FeatureCollection',
  'features': [
    @foreach($ads as $item)
    {
      'index': '{{$item->title}} <br> <div>{{"€".number_format($item->price, 0, '.', ',')}} </div> <br> <a href="{{ route('advertentie.show', ['advertentie' => $item['slug']]) }}" class="ring-2 m-2 ring-purple-500 ring-offset-2 p-1 items-center rounded-lg text-white transition-colors duration-150 bg-indigo-700">Advertentie bekijken</a>',
      'img': '{{asset('uploads/'.$item->filename)}}',
      'lngLat': [{{$item->lng}}, {{$item->lat}}]
    },
    @endforeach
  ]
};

// Loop through locations and add markers to map
locations.features.forEach(({index, img, lngLat}) => {
  // Create popup for each marker
  const popup = new mapboxgl.Popup({offset: 35}).setHTML(index);

  // Create marker for each location
  const el = document.createElement('div');
  el.id = 'marker';
  el.style.background = "#fffbeb url('"+img+"') fixed center";
  el.style.backgroundRepeat = "no-repeat";
  el.style.border = '1px solid #4338ca';
  el.style.width = '55px';
  el.style.height = '55px';
  el.style.borderRadius = '50%';
  el.style.backgroundSize = "cover";

  // Add marker to map
  new mapboxgl.Marker(el)
    .setLngLat(lngLat)
    .setPopup(popup)
    .addTo(map);
});

// Add geolocation control to the map
map.addControl(
  new mapboxgl.GeolocateControl({
    positionOptions: {
      enableHighAccuracy: true
    },
    trackUserLocation: true,
    showUserHeading: true
  })
);

// Add zoom and rotation controls to the map
map.addControl(new mapboxgl.NavigationControl());

// Add Mapbox Directions control to the map and handle toggling
const directions = new MapboxDirections({accessToken: mapboxgl.accessToken});
const directionsElement = document.getElementById("remove-directions");

directionsElement.addEventListener('click', function(){
  if (document.getElementsByClassName('mapboxgl-ctrl-directions').length == 0) {
    map.addControl(directions,'top-left');
  } else {
    map.removeControl(directions);
  }
});
</script>

@endsection