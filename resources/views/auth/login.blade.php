@extends('layouts.app')

@section('content')

<div class="relative w-full h-full max-w-md md:h-auto">

    <div class="bg-white  mt-8 mx-auto px-16 py-8 rounded-lg shadow-2xl">

        <h2 class="text-center text-2xl font-bold tracking-wide text-gray-800">{{ __('Login') }}</h2>

        <form class="my-8 text-sm" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex flex-col my-4">
                <label for="email" class="text-gray-700">{{ __('E-mailadres') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="text-red-400" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="flex flex-col my-4">
                <label for="password" class="text-gray-700">{{ __('Wachtwoord') }}</label>
                <div x-data="{ show: false }" class="relative flex items-center mt-2">
                    <input :type=" show ? 'text': 'password' " id="password" type="password" name="password" required autocomplete="current-password" class="form-control @error('password') is-invalid @enderror flex-1 p-2 pr-10 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900">
                    <button @click="show = !show" type="button" class="absolute right-2 bg-transparent flex items-center justify-center text-gray-700">
                        <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                        </svg>

                        <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </button>
                    @error('password')
                    <span class="text-red-400" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center">
                <input class="mr-2 focus:ring-0 rounded" type="checkbox" name="remember" id="remember" value="{{ old('remember') ? 'checked' : '' }}">
                <label class="form-check-label" for="remember"> {{ __('Ingelogd blijven') }}</label>
            </div>

            <div class="my-4 flex items-center justify-end space-x-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 rounded-lg px-8 py-2 text-gray-100 hover:shadow-xl transition duration-150 uppercase">{{ __('Login') }}</button>
            </div>
        </form>

        <div class="flex items-center justify-between">
            <div class="w-full h-[1px] bg-gray-300"></div>
            <span class="text-sm uppercase mx-6 text-gray-400">Of</span>
            <div class="w-full h-[1px] bg-gray-300"></div>
        </div>

        <div class="text-sm">
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Je wachtwoord vergeten?') }}
            </a>
            @endif
        </div>
    </div>
</div>
</div>
</div>
</div>

@endsection