@extends('layouts.app')

@section('content')


           <main class="py-3 px-4 sm:p-6 md:py-10 md:px-8 bg-blur-xl bg-light rounded-lg shadow">
           @if(session()->has('message'))
          <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
             <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
             <span class="sr-only">Info</span>
             <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
             {{ session()->get('message') }}.
             </div>
               <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-dismiss-target="#alert-1" aria-label="Close">
                 <span class="sr-only">Close</span>
                 <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
             </button>
           </div>
            @endif
            <!-- check if the user is the one who logged-in -->
          <div class="flex justify-between items-center w-full">
          @if(Auth::user() && Auth::user()->id == $ad->user_id)
           <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center p-1 mb-1 ml-0 md:ml-4 text-sm font-medium text-center text-gray-900 rounded-full hover:bg-gray-400/50 hover:bg-gray-00 focus:ring-2 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
             <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
           </button>

           <!-- Dropdown menu -->
           <div id="dropdownDotsHorizontal" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
               <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
                 <li>
                   <a href="/advertentie/{{ $ad->slug }}/edit" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bewerken</a>
                 </li>
                 <li>
                   <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                 </li>

               </ul>
               <div class="py-1">
                <form action="/advertentie/{{ $ad->slug }}" method="post" class="inline-block">
                  @csrf
                  @method('delete')

                 <button type="submit"class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Verwijderen</buttontype=class=>
                 </form>
               </div>
           </div>
           @endif
           <a href="{{ url()->previous() }}"  class="inline-flex items-center p-1 mb-1 ml-0 md:ml-4  rounded-full hover:bg-gray-400/50 focus:ring-2 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" >
           <img class="h-6 w-6 " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAY0lEQVRIie2UMQqAMBAEJ2Lhs3yR+hTt/I4f89JEBBHiQa4QdiCkCMzkigSEeCGVFSbfgD0icskNOIExUj5J3kzeVc7tEWxOAlbuKWZFahH3Q+sdAQOWsg/A4bzgZ0I/O/FDMq2DH/ZtWe3XAAAAAElFTkSuQmCC">
           </a>
          </div>
             <div class="max-w-4xl mx-auto grid grid-cols-1 lg:max-w-5xl lg:gap-x-20  lg:grid-cols-2">
               <div class="relative p-3 col-start-1 row-start-1 flex flex-col-reverse rounded-lg  bg-gradient-to-t from-black/75 via-black/0 sm:bg-none sm:row-start-2 sm:p-0 lg:row-start-1">
                 <h1 class="mt-2 text-sm  font-bold  text-gray-300 md:text-slate-900 md:text-2xl dark:sm:text-white">{{$ad->title}}</h1>
                 <p class="text-lg leading-4 font-bold text-gray-300 md:text-slate-500 dark:sm:text-slate-400">{{"€".number_format($ad->price, 0, '.', ',')}}</p>
               </div>
               <div class="grid gap-4 col-start-1 col-end-3 row-start-1 ad sm:mb-6 sm:grid-cols-4 lg:gap-6 lg:col-start-2 lg:row-end-6 lg:row-span-6 lg:mb-0">
                 <img src="{{asset('uploads/'.$ad->filename)}}" alt="" class="w-full single object-cover object-center align-items-center rounded-lg sm:h-52 sm:col-span-2 lg:col-span-full" loading="lazy">
                 <img src="" alt="" class="hidden w-full h-52 object-cover rounded-lg sm:block sm:col-span-2 md:col-span-1 lg:row-start-2 lg:col-span-2 lg:h-32" loading="lazy">
                 <img src="#" alt="" class="hidden w-full h-52 object-cover rounded-lg md:block lg:row-start-2 lg:col-span-2 lg:h-32" loading="lazy">
               </div>
               <dl class="mt-4 text-xs font-medium flex justify-between items-center row-start-2 sm:mt-1 sm:row-start-3 md:mt-2.5 lg:row-start-2">
                 <dt class="sr-only">Reviews</dt>
                 <dd class="text-indigo-600 flex items-center pl-2 dark:text-indigo-400">
                   <svg width="24" height="24" fill="none" aria-hidden="true" class="mr-1 stroke-current dark:stroke-indigo-500">
                     <path d="m12 5 2 5h5l-4 4 2.103 5L12 16l-5.103 3L9 14l-4-4h5l2-5Z"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                   </svg>
                   <span>4.89 <span class="text-slate-400 font-normal">(128)</span></span>
                 </dd>
                 <dt class="sr-only">views</dt>
                 <dd class="text-gary-600 flex items-center  dark:text-gray-300">
                 <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  	 width="20px" height="20px" viewBox="0 0 92 92" enable-background="new 0 0 92 92" xml:space="preserve">
                  <path id="XMLID_1239_" d="M91.3,43.8C90.6,42.8,74.4,19,46,19C17.6,19,1.4,42.8,0.7,43.8c-0.9,1.3-0.9,3.1,0,4.5
                  	C1.4,49.2,17.6,73,46,73c28.4,0,44.6-23.8,45.3-24.8C92.2,46.9,92.2,45.1,91.3,43.8z M46,65C26.7,65,13.5,51.4,9,46
                  	c4.5-5.5,17.6-19,37-19c19.3,0,32.5,13.6,37,19C78.4,51.5,65.3,65,46,65z M48.3,29.6c-4.4-0.6-8.7,0.5-12.3,3.2c0,0,0,0,0,0
                  	c-7.3,5.5-8.8,15.9-3.3,23.2c2.7,3.6,6.5,5.8,10.9,6.5c0.8,0.1,1.6,0.2,2.3,0.2c3.6,0,7-1.2,9.9-3.3c7.3-5.5,8.8-15.9,3.3-23.2
                  	C56.6,32.5,52.7,30.2,48.3,29.6z M52.3,54.5c-2.2,1.7-5,2.4-7.8,2c-2.8-0.4-5.3-1.9-7-4.1C34.1,47.7,35,41,39.7,37.5
                  	c2.2-1.7,5-2.4,7.8-2c2.8,0.4,5.3,1.9,7,4.1C57.9,44.3,57,51,52.3,54.5z M51.9,40c0.8,0.7,1.2,1.8,1.2,2.8c0,1-0.4,2.1-1.2,2.8
                  	c-0.7,0.7-1.8,1.2-2.8,1.2c-1.1,0-2.1-0.4-2.8-1.2c-0.8-0.8-1.2-1.8-1.2-2.8c0-1.1,0.4-2.1,1.2-2.8c0.7-0.8,1.8-1.2,2.8-1.2
                  	C50.2,38.9,51.2,39.3,51.9,40z"/>
                  </svg>
                   <span>{{$ad->views}}</span>
                 </dd>
                 <dt class="sr-only">time</dt>
                 <dd class="text-gary-600 flex items-center  dark:text-gray-300">
                   <img src="{{ URL::to('/') }}/imgs/time.svg" class="time mr-2" alt="" srcset="">
                   <span>{{$ad->created_at->diffForHumans()}}</span>
                 </dd>
                 <dt class="sr-only">Location</dt>
                 <dd class="text-gary-600 flex items-center dark:text-gray-300">
                   <svg width="2" height="2" aria-hidden="true" fill="currentColor" class="mx-3 text-slate-300">
                     <circle cx="1" cy="1" r="1" />
                   </svg>
                   <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 text-slate-400 dark:text-slate-500" aria-hidden="true">
                     <path d="M18 11.034C18 14.897 12 19 12 19s-6-4.103-6-7.966C6 7.655 8.819 5 12 5s6 2.655 6 6.034Z" />
                     <path d="M14 11a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                   </svg>
                   <span>{{$ad->city}}, {{$ad->state}}</span>
                 </dd>
                 @if($ad->images)
                    {{$ad->images->image}}
                  @endif
               </dl>
               <div class="mt-4 col-start-1 row-start-3 self-center sm:mt-0 sm:col-start-2 sm:row-start-2 sm:row-span-2 lg:mt-6 lg:col-start-1 lg:row-start-3 lg:row-end-4">
               <div class="flex flex-row items-center pb-4">
              <div class="inline-flex  relative justify-center items-center w-14 h-14 bg-indigo-500 rounded-full dark:bg-gray-600">
                  <span class="text-xl font-medium text-white dark:text-gray-300">{{ $firstStringCharacterfirstname = substr($ad->user->firstname, 0, 1) . $firstStringCharacterlastname = substr($ad->user->lastname, 0, 1)}}</span>
                  <span id="status" class="top-0 right-0 0 absolute  w-3.5 h-3.5  rounded-full"></span>
              </div>
              <div class="flex flex-column">
              <div class="font-medium text-gray-500 dark:text-gray-300 pl-2">
              {{$ad->user->firstname}} {{$ad->user->lastname}}
              </div>
              <div class="text-xs font-thin  text-gray-400 dark:text-gray-300 pl-2">
               Een lid sinds : "{{$ad->user->created_at}}"
              </div>
              </div>
              </div>
                 <a href="tel:{{$ad->user->tel}}" class="bg-indigo-600 text-white text-sm leading-6 font-medium py-2 px-3 rounded-lg">Neem Contact op</a>
                 <a  class="bg-indigo-600 text-white text-sm leading-6 font-medium py-2 px-3 rounded-lg">Bod Plaatsen</a>
               </div>
               <p class="mt-4 text-sm leading-6 col-start-1 sm:col-span-2 lg:mt-6 lg:row-start-4 lg:col-span-1 dark:text-slate-400">
               {{$ad->description}}</p>
             </div>

             <div class="w-auto">
                <div class="container h-60 w-full rounded-lg m-2" id="map"></div>
              </div>

           </main>
           <style>
            #marker {
            background-image: url('{{asset('uploads/'.$ad->filename)}}') ;
            background-color: #fffbeb;
            background-size: cover;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            cursor: pointer;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            border: 3px solid #fff;
            }
            </style>
           <script>
       	// TO MAKE THE MAP APPEAR YOU MUST
	     // ADD YOUR ACCESS TOKEN FROM
	     // https://account.mapbox.com
	     mapboxgl.accessToken = 'pk.eyJ1IjoibWJvdWxkbyIsImEiOiJjanc3NWc4cWQxaWlwNDlubms3cTRkZDAwIn0.hRPJTjbBufd9HVTTpXW4zg';
       const map = new mapboxgl.Map({
        container: 'map',
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: 'mapbox://styles/mapbox/satellite-streets-v12',
        center: [{{$ad->lng}}, {{$ad->lat}}],
        zoomOffset: -1,
        zoom: 16
      });

    // create DOM element for the marker
    const el = document.createElement('div');
    el.id = 'marker';


    new mapboxgl.Marker(el)
        .setLngLat([ {{$ad->lng}},   {{$ad->lat}}])
        .addTo(map);

        // Add geolocate control to the map.
       map.addControl(
       new mapboxgl.GeolocateControl({
       positionOptions: {
       enableHighAccuracy: true
       },
       // When active the map will receive updates to the device's location as it changes.
       trackUserLocation: true,
       // Draw an arrow next to the location dot to indicate which direction the device is heading.
       showUserHeading: true
       })
       );

       // const newYork = new mapboxgl.LngLat(-74.0060, 40.7128);
       // const losAngeles = new mapboxgl.LngLat(-118.2437, 34.0522);
       // console.log(newYork.distanceTo(losAngeles));
       

           marker.on('dragend', onDragEnd);

           
           </script>

@endsection
