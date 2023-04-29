@extends('layouts.app')

@section('title', 'Contact - ')

@section('content')
<div class="max-w-5xl mx-5 ">
    <h1 class="text-3xl font-bold mt-8">Neem contact met ons op</h1>
    <div class="flex flex-col md:flex-wrap md:flex-row justify-between gap-6 py-8 md:py-8">
        <div class="bg-white p-4 px-8 rounded-md shadow flex-1">
            <h2 class="text-xl font-bold mb-2">Openingstijden</h2>
            <ul class="list-disc pl-4">
                <li>Maandag - Vrijdag: 9:00 - 18:00</li>
                <li>Zaterdag: 10:00 - 16:00</li>
                <li>Zondag: Gesloten</li>
            </ul>
        </div>
        <div class="bg-white p-4 px-8 rounded-md shadow flex-1">
            <h2 class="text-xl font-bold mb-2">Telefoon</h2>
            <a href="tel:+31640664065" class="text-lg">+31640664065</a>
        </div>
        <div class="bg-white p-4 px-8 rounded-md shadow flex-1">
            <h2 class="text-xl font-bold mb-2">E-mail</h2>
            <a href="mailto:fa.alayesh@gmail.com" class="text-lg">fa.alayesh@gmail.com</a>
        </div>
    </div>
    <p class="md:text-lg my-8">Wilt u meer informatie over onze producten of heeft u vragen over uw bestelling? Neem dan gerust contact met ons op via telefoon of e-mail. Onze klantenservice staat voor u klaar tijdens de openingstijden die hierboven vermeld staan.</p>
</div>
@endsection