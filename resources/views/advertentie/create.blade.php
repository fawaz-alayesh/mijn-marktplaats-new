@extends('layouts.app')

@section('content')

<div class="sm:max-w-lg w-full p-4 bg-white shadow rounded-xl z-10">

    <div class="text-center">
        <h2 class="mt-5 text-3xl font-bold text-gray-900">
            Advertentie Maken
        </h2>
        <p class="mt-2 text-sm text-gray-400">op Mijn-Marktplaats</p>
    </div>
    <form class="mt-8 space-y-3" action="{{route('advertentie.store')}}" method="POST" enctype="multipart/form-data" runat="server">
        <!-- cross site request forgery scurity -->
        @csrf
        <div class="grid grid-cols-1 space-y-2">
            <label class="text-sm font-bold text-gray-500 tracking-wide">Foto</label>
            <div class="flex items-center justify-center w-full">
                <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center transition duration-300 cursor-cell">
                    <div class="h-full w-full text-center flex flex-col items-center justify-center  ">
                        <div class="flex items-center justify-center  flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                            <img id="output" class="has-mask uploadAd h-36 object-center" src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg" alt="freepik image">
                        </div>
                        <p class="pointer-none text-gray-500 "><span class="text-sm"> <span id="" class="text-blue-600 hover:underline">Selecteer een bestand</span> van je computer</p>
                    </div>
                    <input type="file" name="filename" accept="image/*" id="fileInput" multiple class="hidden">
                </label>
            </div>
        </div>
        <p class="text-sm text-gray-300">
            <span>File type: jpg, png</span>
        </p>
        <div>
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Titel</label>
                <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" name="title" placeholder="product naam">
            </div>

            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Postcode</label>
                <div class="container h-80 w-full rounded-lg m-2" id="map"></div>
            </div>

            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Stad</label>
                <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" id="city" name="city" placeholder="product Stad">
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Province</label>
                <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" id="state" name="state" placeholder="product province">
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">beschrijving</label>
                <textarea class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" name="description" placeholder="beschrijving">
                            </textarea>
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Prijs</label>
                <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" id="currency" name="price" placeholder="€0">
            </div>

            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Categorie</label>
                <select class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="" name="category" placeholder="category">
                    @foreach($categories as $category)
                    <option name="category" value="{{ $category->id}}">{{ $category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 space-y-2 hidden">
                <label class="text-sm font-bold text-gray-500 tracking-wide">lat</label>
                <input id="lat" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" name="lat" placeholder="">
            </div>
            <div class="grid grid-cols-1 space-y-2 hidden">
                <label class="text-sm font-bold text-gray-500 tracking-wide">lat</label>
                <input id="lng" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" name="lng" placeholder="">
            </div>

            <input type="submit" name="submit" value='Plaatsen' class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide
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
        zoom: 6
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
        lat.value = c.result.center[1];
    });

    // Get the geocoder results container.
    const lng = document.getElementById('lng');

    // Add geocoder result to container.
    geocoder.on('result', (d) => {

        lng.value = d.result.center[0];
    });

    // Clear results container when search is cleared.
    geocoder.on('clear', () => {
        results.innerText = '';
    });
</script>


@endsection