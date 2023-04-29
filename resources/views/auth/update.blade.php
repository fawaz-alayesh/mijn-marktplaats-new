@extends('layouts.app')

@section('content')
<main class="py-3 px-4 sm:p-6 md:py-10 md:px-8 bg-blur-xl bg-white rounded-lg shadow">
@if(session()->has('message'))
  <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
    </svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
      {{ session()->get('message') }}.
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-dismiss-target="#alert-1" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
      </svg>
    </button>
  </div>
  @endif
<div class="relative w-full h-full max-w-md md:h-auto flex flex-col justify-center">
    <div class="mx-auto px-16 ">
        <h2 class="text-center font-bold text-lg mb-6">{{ __('Profiel bijwerken') }}</h2>

        <form method="POST" action="{{ route('updateprofile.update') }}" class="mb-4">
            @csrf

            <div class="mb-4">
                <label for="firstname" class="block text-gray-700 font-bold mb-2">{{ __('Voornaam') }}</label>
                <input id="firstname" type="text" class="form-input @error('firstname') border-red-500 @enderror" name="firstname" value="{{ old('firstname', Auth::user()->firstname) }}" required autocomplete="firstname" autofocus>

                @error('firstname')
                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="lastname" class="block text-gray-700 font-bold mb-2">{{ __('Achternaam') }}</label>
                <input id="lastname" type="text" class="form-input @error('lastname') border-red-500 @enderror" name="lastname" value="{{ old('lastname', Auth::user()->lastname) }}" required autocomplete="lastname">

                @error('lastname')
                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tel" class="block text-gray-700 font-bold mb-2">{{ __('Telefoon') }}</label>
                <input id="tel" type="text" class="form-input @error('tel') border-red-500 @enderror" name="tel" value="{{ old('tel', Auth::user()->tel) }}" required autocomplete="tel">

                @error('tel')
                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">{{ __('E-mailadres') }}</label>
                <input id="email" type="email" class="form-input @error('email') border-red-500 @enderror" name="email" value="{{ old('email', Auth::user()->email) }}" required autocomplete="email">

                @error('email')
                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">{{ __('Wachtwoord') }}</label>
                <input id="password" type="password" class="form-input @error('password') border-red-500 @enderror" name="password" autocomplete="new-password">

                @error('password')
                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="block text-gray-700 font-bold mb-2">{{ __('Bevestig wachtwoord') }}</label>
                <input id="password-confirm" type="password" class="form-input" name="password_confirmation" class="form-input @error('password') border-red-500 @enderror">
                @error('password')
                <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-0">
                <div class="md:col-span-2 flex justify-center mt-6">
                    <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        {{ __('Opslaan') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</main>
@endsection