@extends('layouts.app')

@section('content')



	<div class="sm:max-w-lg w-full p-10 bg-white shadow rounded-xl z-10">
     <a href="{{ url()->previous() }}"  class="inline-flex items-center p-1 mb-1 ml-0 md:ml-4  rounded-full hover:bg-gray-400/50 focus:ring-2 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" > 
        <img class="h-6 w-6 " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAAAY0lEQVRIie2UMQqAMBAEJ2Lhs3yR+hTt/I4f89JEBBHiQa4QdiCkCMzkigSEeCGVFSbfgD0icskNOIExUj5J3kzeVc7tEWxOAlbuKWZFahH3Q+sdAQOWsg/A4bzgZ0I/O/FDMq2DH/ZtWe3XAAAAAElFTkSuQmCC">
         </a>
		<div class="text-center">
			<h2 class="mt-5 text-3xl font-bold text-gray-900">
				Advertentie Bewerken
			</h2>
			<p class="mt-2 text-sm text-gray-400">op Mijn-Marktplaats</p>
		</div>
        <form class="mt-8 space-y-3" action="/advertentie/{{ $ad->slug }}" method="POST" enctype="multipart/form-data" runat="server">
        @csrf  
        @method('PUT')
             <!-- cross site request forgery scurity -->
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">Foto</label>
                        <div  class="flex items-center justify-center w-full">
                            <label  class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center transition duration-300 cursor-cell">
                                <div class="h-full w-full text-center flex flex-col items-center justify-center  ">
                                    <div class="flex items-center justify-center  flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                    <img  id="output" class="has-mask uploadAd h-36 object-center" src="{{ asset('uploads/'.$ad->filename)}}" alt="freepik image">
                                    </div>
                                    <p class="pointer-none text-gray-500 "><span class="text-sm"> <span  id="" class="text-blue-600 hover:underline">Selecteer een bestand</span> van je computer</p>
                                </div>
                                <input type="file" name="filename" accept="image/*"  onchange="loadFile(event)" multiple class="hidden">
                            </label>
                        </div>
                    </div>
                            <p class="text-sm text-gray-300">
                                <span>File type: doc,pdf,types of images</span>
                            </p>
                    <div>
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">Titel</label>
                            <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" name="title" placeholder="product naam" value="{{ $ad->title}}">
                    </div>

                    <div class="grid grid-cols-1 space-y-2">
                    <label class="text-sm font-bold text-gray-500 tracking-wide">Postcode</label>
                    <div class="container h-60 w-full rounded-lg m-2" id="map"></div>
                    </div>

                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">Stad</label>
                            <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" id="city" name="city" placeholder="product Stad" value="{{ $ad->city}}">
                    </div>
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">Province</label>
                            <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" id="state" name="state" placeholder="product province" value="{{ $ad->state}}">
                    </div>
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">beschrijving</label>
                            <textarea class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" name="description" placeholder="beschrijving">
                            {{ $ad->description}}
                            </textarea>
                    </div>
                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">Prijs</label>
                            <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" name="price" id="currency" placeholder="200" value="{{ $ad->price}}">
                    </div>

                    <div class="grid grid-cols-1 space-y-2">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">Categorie</label>
                            <select class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" name="category" placeholder="category" value="{{ $ad->category}}">
                                <option name="category" value="{{ $ad->category}}">{{ $ad->category}}</option>
                                <option name="category"value="Fietsen">Fietsen en brommers</option>
                                <option name="category" value="Auto's">Auto's</option>
                                <option name="category"value="Auto's Onderdelen">Auto's Onderdelen</option>
                                <option name="category"value="Kleren">Huis en Inrichting</option>
                                <option name="category"value="Kleren">Kleren</option>
                                <option name="category"value="Boeken">Boeken</option>
                                <option name="category"value="Boeken">Dieren</option>
                                <option name="category"value="Boeken">Computers</option>
                            </select>
                    </div>
                    <div class="grid grid-cols-1 space-y-2 hidden">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">lat</label>
                            <input id="lat" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"  name="lat" placeholder="" value="{{ $ad->lat}}">
                    </div>
                    <div class="grid grid-cols-1 space-y-2 hidden">
                        <label class="text-sm font-bold text-gray-500 tracking-wide">lat</label>
                            <input id="lng" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"  name="lng" placeholder="" value="{{ $ad->lng}}">
                    </div>

                        <input type="submit" name="submit" value="Update" class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide
                                    font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                        </input>
                </div>
        </form>
	</div>
</div>


<script>
 	mapboxgl.accessToken = 'pk.eyJ1IjoibWJvdWxkbyIsImEiOiJjanc3NWc4cWQxaWlwNDlubms3cTRkZDAwIn0.hRPJTjbBufd9HVTTpXW4zg';
    const map = new mapboxgl.Map({
        container: 'map',
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: 'mapbox://styles/mapbox/streets-v12',
        center: [5.60678361779417, 52.19090467167218],
        zoom: 5
    });

    const geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        marker: {
            color: 'blue'
        },
        types: 'postcode',
        mapboxgl: mapboxgl,
        placeholder: 'Voer je postcode in'
    });

    map.addControl(geocoder);

//    // Get the geocoder results container.
//    const result = document.getElementById('result');
    
//     // Add geocoder result to container.
//     geocoder.on('result', (e) => {
//         result.innerText = JSON.stringify(e.result, null, 2);
//     });

     // Get the geocoder results container.
     const city = document.getElementById('city');
    
    // Add geocoder result to container.
    geocoder.on('result', (a) => {
        city.value = a.result.context[0].text;
    });

    // Get the geocoder results container.
    const state = document.getElementById('state');
    
    // Add geocoder result to container.
    geocoder.on('result', (b) => {
        state.value = b.result.context[1].text;
    });

    // Get the geocoder results container.
    const lat = document.getElementById('lat');

    // Add geocoder result to container.
    geocoder.on('result', (c) => {
        lat.value = c.result.center[1]-0.001;
    });

    // Get the geocoder results container.
    const lng = document.getElementById('lng');

    // Add geocoder result to container.
    geocoder.on('result', (d) => {
        lng.value = d.result.center[0]-0.001;
    });


    
    // Clear results container when search is cleared.
    geocoder.on('clear', () => {
        results.innerText = '';
    });
    </script>




@endsection