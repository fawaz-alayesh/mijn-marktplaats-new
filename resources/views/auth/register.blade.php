@extends('layouts.app')

@section('content')

          <div class="relative w-full h-full max-w-md md:h-auto">
                
                      <div class="bg-white  mt-8 mx-auto px-16 py-8 rounded-lg shadow-2xl">
      
                          <h2 class="text-center text-2xl font-bold tracking-wide text-gray-800">{{ __('Account aanmaken') }}</h2>
      
                          <form class="my-8 text-sm" method="POST" action="{{ route('register') }}">
                            @csrf
                              <div class="flex flex-col my-4">
                                  <label for="firstname" class="text-gray-700">{{ __('Firstname') }}</label>
                                  <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus >
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>

                              <div class="flex flex-col my-4">
                                  <label for="lastname" class="text-gray-700">{{ __('lastname') }}</label>
                                  <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus >
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
      
                              <div class="flex flex-col my-4">
                                  <label for="email" class="text-gray-700">{{ __('E-mailadres') }}</label>
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div>

                              <div class="flex flex-col my-4">
                                  <label for="tel" class="text-gray-700">{{ __('Telefoon') }}</label>
                                  <div class="flex">
                                  <select id="country" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-500 bg-gray-50 border border-gray-300 rounded-l-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" >
                                    <option value="#" class="hidden">Land</option>
                                    <option value="31" class="inline-flex w-full px-4 py-2 bg-gray-50 hover:bg-gray-100"><div class="w-4 h-8">🇳🇱 </div>(+31)</option>
                                    <option value="32" class="inline-flex w-full px-4 py-2 bg-gray-50 hover:bg-gray-100"><div class="w-4 h-8">🇧🇪 </div>(+32)</option>
                                  </select>
                                  <input id="tel" type="tel" class="form-control" name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus >
                                  </div>
                                  @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div>

                              
                              <div class="flex flex-col my-4">
                                  <label for="password" class="text-gray-700"> {{ __('Wachtwoord') }}</label>
                                  <div x-data="{ show: false }" class="relative flex items-center mt-2">
                                      <input :type=" show ? 'text': 'password' " name="password" id="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                      <button @click="show = !show" type="button" class="absolute right-2 bg-transparent flex items-center justify-center text-gray-700">
                                          <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
      
                                          <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                      </button>
                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                  </div>
                              </div>
      
                              <div class="flex flex-col my-4">
                                  <label for="password-confirm" class="text-gray-700">{{ __('Herhaal wachtwoord') }}</label>
                                  <div x-data="{ show: false }" class="relative flex items-center mt-2">
                                      <input :type=" show ? 'text': 'password' " id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                      <button @click="show = !show" type="button" class="absolute right-2 bg-transparent flex items-center justify-center text-gray-700">
                                          <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
      
                                          <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                      </button>
                                  </div>
                              </div>
      
                              <div class="flex items-center">
                                  <input type="checkbox" name="remember_me" id="remember_me" class="mr-2 focus:ring-0 rounded">
                                  <label for="remember_me" class="text-gray-700">Ik accepteer de <a href="#" class="text-blue-600 hover:text-blue-700 hover:underline"> voorwaarden</a> en <a href="#" class="text-blue-600 hover:text-blue-700 hover:underline">het privacybeleid</a></label>
                              </div>
                          
                              <div class="my-4 flex items-center justify-end space-x-4">
                                  <button type="submit" class="bg-blue-600 hover:bg-blue-700 rounded-lg px-8 py-2 text-gray-100 hover:shadow-xl transition duration-150 uppercase"> {{ __('Maak account aan') }}</button>
                              </div>
                          </form>
                          
                          
                      </div>
                  </div>
           </div>
     </div>
</div>
<script>
    var phoneInput = document.getElementById("tel");
    var countrySelect = document.getElementById("country");
    
    countrySelect.addEventListener("change", function() {
      var countryCode = this.value;
      phoneInput.value = "+" + countryCode;
    });
</script>
@endsection
