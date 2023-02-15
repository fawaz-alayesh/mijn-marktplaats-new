<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mijn-Marktplaats') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;900&display=swap" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- daisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.46.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <link rel="stylesheet" href="{{ url('style.css') }}">
    <!-- Scripts -->
    <script> $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } }) </script>
   
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-amber-50">

    <!--  navmenu -->
    <nav class="sm:bg-transparent bg-transparent border-gray-200 px-2 md:px-4 py-1 dark:bg-gray-900">
     <div class="container flex flex-wrap justify-between items-center px-4 mx-auto max-w-screen-xxl">
      <a href="{{ url('/') }}" class="flex items-center">
      <svg class="logo"  viewBox="0 0 273 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path id="location" d="M9.91321 84.6944L35.8889 63.7013L50.9028 67.3402L50.5729 93.7083L9.91321 84.6944Z" fill="#9D501D"/>
        <path id="location" d="M90.4271 84.6944L64.4514 63.7013L50.2014 67.1562L50.5729 93.7083L90.4271 84.6944Z" fill="#101E35"/>
        <path id="location" d="M34.8924 90.2326L33.6632 89.9618L41.9722 76.9722L50.2049 79.0104L62.2431 76.3021L56.0625 67.809L66.7431 65.5555L67.882 66.441L57.9584 68.5347L64.125 77.0035L50.1945 80.1389L42.4861 78.2361L34.8924 90.2326Z" fill="white"/>
        <path id="locate"  d="M65.3056 54.309C67.1944 51.4618 68.2986 48.0555 68.2986 44.3889C68.2986 34.441 60.1944 26.3819 50.2014 26.3819C40.2049 26.3819 32.1042 34.441 32.1042 44.3889C32.1042 48.0555 33.2049 51.4618 35.0972 54.309H35.0938L35.1563 54.3993C35.1806 54.4306 35.2014 54.4653 35.2222 54.5L50.2014 79.5729L65.1771 54.5C65.2014 54.4653 65.2222 54.4306 65.2431 54.3993L65.3056 54.309Z" fill="#FF1616"/>
        <path id="locate"  d="M59.8994 44.7222C59.8994 50.0521 55.5591 54.375 50.2015 54.375C44.8438 54.375 40.5001 50.0521 40.5001 44.7222C40.5001 39.3924 44.8438 35.0695 50.2015 35.0695C55.5591 35.0695 59.8994 39.3924 59.8994 44.7222Z" fill="white"/>
        <path d="M96.4828 16.6493V34.7084C96.4828 38.7674 93.1946 42.0695 89.1529 42.0695C85.1078 42.0695 81.8196 38.7674 81.8196 34.7084V16.6493H96.4828Z" fill="#101E35"/>
        <path d="M95.75 15.625H4.06946L19.7118 6.18054H81.7812L93.8576 14.2569L93.8715 14.2674L95.75 15.625Z" fill="#9D501D"/>
        <path d="M80.7847 16.6493V34.7084C80.7847 38.7674 77.4965 42.0695 73.4548 42.0695C69.4097 42.0695 66.1215 38.7674 66.1215 34.7084V16.6493H80.7847Z" fill="#9D501D"/>
        <path d="M65.0869 16.6493V34.7084C65.0869 38.7674 61.7987 42.0695 57.757 42.0695C53.7118 42.0695 50.4236 38.7674 50.4236 34.7084V16.6493H65.0869Z" fill="#101E35"/>
        <path d="M49.3924 16.6493V34.7084C49.3924 38.7674 46.1007 42.0695 42.059 42.0695C38.0174 42.0695 34.7257 38.7674 34.7257 34.7084V16.6493H49.3924Z" fill="#9D501D"/>
        <path d="M33.6945 16.6493V34.7084C33.6945 38.7674 30.4063 42.0695 26.3611 42.0695C22.3194 42.0695 19.0312 38.7674 19.0312 34.7084V16.6493H33.6945Z" fill="#101E35"/>
        <path d="M17.9965 16.6493V34.7084C17.9965 38.7674 14.7083 42.0695 10.6632 42.0695C6.62151 42.0695 3.33331 38.7674 3.33331 34.7084V16.6493H17.9965Z" fill="#9D501D"/>
        <path d="M127.26 25.644V41H124.18V31.012L120.066 41H117.734L113.598 31.012V41H110.518V25.644H114.016L118.9 37.062L123.784 25.644H127.26ZM131.867 27.36C131.324 27.36 130.87 27.1913 130.503 26.854C130.151 26.502 129.975 26.0693 129.975 25.556C129.975 25.0427 130.151 24.6173 130.503 24.28C130.87 23.928 131.324 23.752 131.867 23.752C132.41 23.752 132.857 23.928 133.209 24.28C133.576 24.6173 133.759 25.0427 133.759 25.556C133.759 26.0693 133.576 26.502 133.209 26.854C132.857 27.1913 132.41 27.36 131.867 27.36ZM133.385 28.812V41H130.305V28.812H133.385ZM137.99 27.36C137.433 27.36 136.971 27.1913 136.604 26.854C136.252 26.502 136.076 26.0693 136.076 25.556C136.076 25.0427 136.252 24.6173 136.604 24.28C136.971 23.928 137.433 23.752 137.99 23.752C138.533 23.752 138.98 23.928 139.332 24.28C139.684 24.6173 139.86 25.0427 139.86 25.556C139.86 26.0693 139.684 26.502 139.332 26.854C138.98 27.1913 138.533 27.36 137.99 27.36ZM139.508 43.002C139.508 44.3513 139.171 45.3193 138.496 45.906C137.836 46.5073 136.883 46.808 135.636 46.808H134.272V44.19H135.152C135.621 44.19 135.951 44.0947 136.142 43.904C136.333 43.728 136.428 43.4347 136.428 43.024V28.812H139.508V43.002ZM149.305 28.636C150.757 28.636 151.931 29.098 152.825 30.022C153.72 30.9313 154.167 32.2073 154.167 33.85V41H151.087V34.268C151.087 33.3 150.845 32.5593 150.361 32.046C149.877 31.518 149.217 31.254 148.381 31.254C147.531 31.254 146.856 31.518 146.357 32.046C145.873 32.5593 145.631 33.3 145.631 34.268V41H142.551V28.812H145.631V30.33C146.042 29.802 146.563 29.3913 147.193 29.098C147.839 28.79 148.543 28.636 149.305 28.636ZM127.26 58.644V74H124.18V64.012L120.066 74H117.734L113.598 64.012V74H110.518V58.644H114.016L118.9 70.062L123.784 58.644H127.26ZM129.513 67.862C129.513 66.63 129.755 65.5373 130.239 64.584C130.738 63.6307 131.405 62.8973 132.241 62.384C133.092 61.8707 134.038 61.614 135.079 61.614C135.988 61.614 136.78 61.7973 137.455 62.164C138.144 62.5307 138.694 62.9927 139.105 63.55V61.812H142.207V74H139.105V72.218C138.709 72.79 138.159 73.2667 137.455 73.648C136.766 74.0147 135.966 74.198 135.057 74.198C134.03 74.198 133.092 73.934 132.241 73.406C131.405 72.878 130.738 72.1373 130.239 71.184C129.755 70.216 129.513 69.1087 129.513 67.862ZM139.105 67.906C139.105 67.158 138.958 66.52 138.665 65.992C138.372 65.4493 137.976 65.0387 137.477 64.76C136.978 64.4667 136.443 64.32 135.871 64.32C135.299 64.32 134.771 64.4593 134.287 64.738C133.803 65.0167 133.407 65.4273 133.099 65.97C132.806 66.498 132.659 67.1287 132.659 67.862C132.659 68.5953 132.806 69.2407 133.099 69.798C133.407 70.3407 133.803 70.7587 134.287 71.052C134.786 71.3453 135.314 71.492 135.871 71.492C136.443 71.492 136.978 71.3527 137.477 71.074C137.976 70.7807 138.372 70.37 138.665 69.842C138.958 69.2993 139.105 68.654 139.105 67.906ZM148.295 63.704C148.691 63.0587 149.205 62.5527 149.835 62.186C150.481 61.8193 151.214 61.636 152.035 61.636V64.87H151.221C150.253 64.87 149.52 65.0973 149.021 65.552C148.537 66.0067 148.295 66.7987 148.295 67.928V74H145.215V61.812H148.295V63.704ZM161.326 74L157.19 68.808V74H154.11V57.72H157.19V66.982L161.282 61.812H165.286L159.918 67.928L165.33 74H161.326ZM170.543 64.342V70.238C170.543 70.6487 170.639 70.9493 170.829 71.14C171.035 71.316 171.372 71.404 171.841 71.404H173.271V74H171.335C168.739 74 167.441 72.7387 167.441 70.216V64.342H165.989V61.812H167.441V58.798H170.543V61.812H173.271V64.342H170.543ZM178.567 63.572C178.963 63.0147 179.505 62.5527 180.195 62.186C180.899 61.8047 181.698 61.614 182.593 61.614C183.634 61.614 184.573 61.8707 185.409 62.384C186.259 62.8973 186.927 63.6307 187.411 64.584C187.909 65.5227 188.159 66.6153 188.159 67.862C188.159 69.1087 187.909 70.216 187.411 71.184C186.927 72.1373 186.259 72.878 185.409 73.406C184.573 73.934 183.634 74.198 182.593 74.198C181.698 74.198 180.906 74.0147 180.217 73.648C179.542 73.2813 178.992 72.8193 178.567 72.262V79.808H175.487V61.812H178.567V63.572ZM185.013 67.862C185.013 67.1287 184.859 66.498 184.551 65.97C184.257 65.4273 183.861 65.0167 183.363 64.738C182.879 64.4593 182.351 64.32 181.779 64.32C181.221 64.32 180.693 64.4667 180.195 64.76C179.711 65.0387 179.315 65.4493 179.007 65.992C178.713 66.5347 178.567 67.1727 178.567 67.906C178.567 68.6393 178.713 69.2773 179.007 69.82C179.315 70.3627 179.711 70.7807 180.195 71.074C180.693 71.3527 181.221 71.492 181.779 71.492C182.351 71.492 182.879 71.3453 183.363 71.052C183.861 70.7587 184.257 70.3407 184.551 69.798C184.859 69.2553 185.013 68.61 185.013 67.862ZM193.477 57.72V74H190.397V57.72H193.477ZM195.728 67.862C195.728 66.63 195.97 65.5373 196.454 64.584C196.953 63.6307 197.62 62.8973 198.456 62.384C199.307 61.8707 200.253 61.614 201.294 61.614C202.203 61.614 202.995 61.7973 203.67 62.164C204.359 62.5307 204.909 62.9927 205.32 63.55V61.812H208.422V74H205.32V72.218C204.924 72.79 204.374 73.2667 203.67 73.648C202.981 74.0147 202.181 74.198 201.272 74.198C200.245 74.198 199.307 73.934 198.456 73.406C197.62 72.878 196.953 72.1373 196.454 71.184C195.97 70.216 195.728 69.1087 195.728 67.862ZM205.32 67.906C205.32 67.158 205.173 66.52 204.88 65.992C204.587 65.4493 204.191 65.0387 203.692 64.76C203.193 64.4667 202.658 64.32 202.086 64.32C201.514 64.32 200.986 64.4593 200.502 64.738C200.018 65.0167 199.622 65.4273 199.314 65.97C199.021 66.498 198.874 67.1287 198.874 67.862C198.874 68.5953 199.021 69.2407 199.314 69.798C199.622 70.3407 200.018 70.7587 200.502 71.052C201.001 71.3453 201.529 71.492 202.086 71.492C202.658 71.492 203.193 71.3527 203.692 71.074C204.191 70.7807 204.587 70.37 204.88 69.842C205.173 69.2993 205.32 68.654 205.32 67.906ZM210.638 67.862C210.638 66.63 210.88 65.5373 211.364 64.584C211.863 63.6307 212.53 62.8973 213.366 62.384C214.217 61.8707 215.163 61.614 216.204 61.614C217.113 61.614 217.905 61.7973 218.58 62.164C219.269 62.5307 219.819 62.9927 220.23 63.55V61.812H223.332V74H220.23V72.218C219.834 72.79 219.284 73.2667 218.58 73.648C217.891 74.0147 217.091 74.198 216.182 74.198C215.155 74.198 214.217 73.934 213.366 73.406C212.53 72.878 211.863 72.1373 211.364 71.184C210.88 70.216 210.638 69.1087 210.638 67.862ZM220.23 67.906C220.23 67.158 220.083 66.52 219.79 65.992C219.497 65.4493 219.101 65.0387 218.602 64.76C218.103 64.4667 217.568 64.32 216.996 64.32C216.424 64.32 215.896 64.4593 215.412 64.738C214.928 65.0167 214.532 65.4273 214.224 65.97C213.931 66.498 213.784 67.1287 213.784 67.862C213.784 68.5953 213.931 69.2407 214.224 69.798C214.532 70.3407 214.928 70.7587 215.412 71.052C215.911 71.3453 216.439 71.492 216.996 71.492C217.568 71.492 218.103 71.3527 218.602 71.074C219.101 70.7807 219.497 70.37 219.79 69.842C220.083 69.2993 220.23 68.654 220.23 67.906ZM229.926 64.342V70.238C229.926 70.6487 230.022 70.9493 230.212 71.14C230.418 71.316 230.755 71.404 231.224 71.404H232.654V74H230.718C228.122 74 226.824 72.7387 226.824 70.216V64.342H225.372V61.812H226.824V58.798H229.926V61.812H232.654V64.342H229.926ZM239.534 74.198C238.536 74.198 237.642 74.022 236.85 73.67C236.058 73.3033 235.427 72.812 234.958 72.196C234.503 71.58 234.254 70.898 234.21 70.15H237.312C237.37 70.6193 237.598 71.008 237.994 71.316C238.404 71.624 238.91 71.778 239.512 71.778C240.098 71.778 240.553 71.6607 240.876 71.426C241.213 71.1913 241.382 70.8907 241.382 70.524C241.382 70.128 241.176 69.8347 240.766 69.644C240.37 69.4387 239.732 69.2187 238.852 68.984C237.942 68.764 237.194 68.5367 236.608 68.302C236.036 68.0673 235.537 67.708 235.112 67.224C234.701 66.74 234.496 66.0873 234.496 65.266C234.496 64.5913 234.686 63.9753 235.068 63.418C235.464 62.8607 236.021 62.4207 236.74 62.098C237.473 61.7753 238.331 61.614 239.314 61.614C240.766 61.614 241.924 61.9807 242.79 62.714C243.655 63.4327 244.132 64.408 244.22 65.64H241.272C241.228 65.156 241.022 64.7747 240.656 64.496C240.304 64.2027 239.827 64.056 239.226 64.056C238.668 64.056 238.236 64.1587 237.928 64.364C237.634 64.5693 237.488 64.8553 237.488 65.222C237.488 65.6327 237.693 65.948 238.104 66.168C238.514 66.3733 239.152 66.586 240.018 66.806C240.898 67.026 241.624 67.2533 242.196 67.488C242.768 67.7227 243.259 68.0893 243.67 68.588C244.095 69.072 244.315 69.7173 244.33 70.524C244.33 71.228 244.132 71.8587 243.736 72.416C243.354 72.9733 242.797 73.4133 242.064 73.736C241.345 74.044 240.502 74.198 239.534 74.198Z" fill="#9D501D"/>
      </svg>
      </a>

         <div class="flex items-center pl-2 pr-2">
          @guest
                @if (Route::has('login'))
                  <a href="{{ route('login') }}" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800" data-modal-toggle="signin-modal">{{ __('Login') }}</a>
                  @endif
                  @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="text-white bg-indigo-600 hover:bg-indigo-700 hover:ring-indigo-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 dark:bg-indigo-700 dark:hover:bg-indigo-700 hover:ring-indigo-700 focus:outline-none dark:focus:ring-blue-800 " data-modal-toggle="signup-modal">{{ __('Register') }}</a>
                  @endif
             @else
      
            <!-- notifications        -->
            <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400" type="button"> 
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
            <div class="flex relative">
              <div class="inline-flex relative -top-2 right-3 w-3 h-3 bg-red-500 rounded-full border-2 border-white dark:border-gray-900"></div>
            </div>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownNotification" class="hidden z-20 w-full max-w-sm bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
              <div class="block py-2 px-4 font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-white">
                  Notifications
              </div>
              <div class="divide-y divide-gray-100 dark:divide-gray-700">
                <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                  <div class="flex-shrink-0">
                    <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-blue-600 rounded-full border border-white dark:border-gray-800">
                      <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                    </div>
                  </div>
                  <div class="pl-3 w-full">
                      <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New message from <span class="font-semibold text-gray-900 dark:text-white">Jese Leos</span>: "Hey, what's up? All set for the presentation?"</div>
                      <div class="text-xs text-blue-600 dark:text-blue-500">a few moments ago</div>
                  </div>
                </a>
                <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                  <div class="flex-shrink-0">
                    <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-2.jpg" alt="Joseph image">
                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-gray-900 rounded-full border border-white dark:border-gray-800">
                      <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                    </div>
                  </div>
                  <div class="pl-3 w-full">
                      <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Joseph Mcfall</span> and <span class="font-medium text-gray-900 dark:text-white">5 others</span> started following you.</div>
                      <div class="text-xs text-blue-600 dark:text-blue-500">10 minutes ago</div>
                  </div>
                </a>
                <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                  <div class="flex-shrink-0">
                    <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image">
                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-red-600 rounded-full border border-white dark:border-gray-800">
                      <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                    </div>
                  </div>
                  <div class="pl-3 w-full">
                      <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span> and <span class="font-medium text-gray-900 dark:text-white">141 others</span> love your story. See it and view more stories.</div>
                      <div class="text-xs text-blue-600 dark:text-blue-500">44 minutes ago</div>
                  </div>
                </a>
                <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                  <div class="flex-shrink-0">
                    <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-4.jpg" alt="Leslie image">
                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-green-400 rounded-full border border-white dark:border-gray-800">
                      <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                  </div>
                  <div class="pl-3 w-full">
                      <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Leslie Livingston</span> mentioned you in a comment: <span class="font-medium text-blue-500" href="#">@bonnie.green</span> what do you say?</div>
                      <div class="text-xs text-blue-600 dark:text-blue-500">1 hour ago</div>
                  </div>
                </a>
                <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                  <div class="flex-shrink-0">
                    <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="Robert image">
                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-purple-500 rounded-full border border-white dark:border-gray-800">
                      <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                    </div>
                  </div>
                  <div class="pl-3 w-full">
                      <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Robert Brown</span> posted a new video: Glassmorphism - learn how to implement the new design trend.</div>
                      <div class="text-xs text-blue-600 dark:text-blue-500">3 hours ago</div>
                  </div>
                </a>
              </div>
              <a href="#" class="block py-2 text-sm font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                <div class="inline-flex items-center ">
                  <svg class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                    View all
                </div>
              </a>
            </div>
            
               <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                   <span class="sr-only">Open user menu</span>
                   <div class="inline-flex  relative justify-center items-center w-10 h-10 bg-indigo-500 rounded-full dark:bg-gray-600">
                    <span class="text-base font-medium text-white dark:text-gray-300">{{  $firstStringCharacterfirstname = substr(Auth::user()->firstname, 0, 1). $firstStringCharacterlastname = substr(Auth::user()->lastname, 0, 1)}}</span>
                    <span id="status" class="top-0 left-7  absolute  w-3.5 h-3.5  rounded-full"></span>
                    </div>
                   <!-- <img class="w-11 h-11 rounded-full" src="{{ asset('storage/uploads/avatar.png')}}" alt="{{ Auth::user()->name }}"> -->
                 </button>
                 
                 <!-- Dropdown menu -->
                 <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                   <div class="px-4 py-3">
                     <a href="/home" class="block text-sm text-indigo-500 dark:text-gray-400">{{ Auth::user()->firstname ." ". Auth::user()->lastname  }}</a>
                     <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                   </div>
                   <ul class="py-1" aria-labelledby="user-menu-button">
                     <li>
                       <a href="/home" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Mijn-Advertenties</a>
                     </li>
                     <li>
                       <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile bewerken</a>
                     </li>
                     <li>
                       <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                     </li>
                     <li>
                    <a class="block px-4 py-2 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" href="{{ route('logout') }}"
                      onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                     </a>
                     </li>
                   </ul>
                  </div>
    
    
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  {{csrf_field()}}
                 </form>
            
            @endguest
         <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
           <span class="sr-only">Open main menu</span>
           <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
       </button>
     </div>
     
     </div>
   </nav>
  <div class="hidden w-full z-10 md:block md:w-auto  md:order-1" id="mobile-menu-2">
   <!-- secondery Navbar    -->
   <nav class="border border-gray-400  shadow-sm">
    <div class="max-w-screen-xl px-4 py-1 mx-auto md:px-6">
         <div class=" relative ">
           <div class="search relative flex justify-center p-3">
             <input type="search" name="search" id="search" class="block search md:w-full w-50 p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Zoeken Naar Auto's, Fietsen, Kleren...">
           </div>
           <div id="Content" class=" absolute z-20 w-full overflow-auto max-h-40 max-w-sm bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
         </div>
        </div>
    
        <div class="md:flex items-center justify-between pb-3">
            @if(Auth::check())
            <a href="{{ route('advertentie.create') }}" class="md:hidden  ring-2 ring-purple-500 ring-offset-4 mb-2 relative flex items-center justify-center w-full h-10  text-white transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                Advertentie Plaatsen
            </a>
            @endif
            <ul class="flex flex-row items-center mt-2 w-full space-x-3 md:space-x-5 text-sm font-medium">

                <li>
                    <a href="{{ route('advertentie.index') }}" class="text-gray-900 dark:text-white hover:underline">Advertentie's</a>
                </li>
                <li>
                  
                   <button id="mega-menu-dropdown-button" data-dropdown-toggle="mega-menu-dropdown" class="text-gray-900 dark:text-white hover:underline flex">
                   Categorieën<svg aria-hidden="true" class="ml-1 w-5 h-5 md:w-4 md:h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                   </button>
                   <div id="mega-menu-dropdown" class="grid basis-1/4 hidden z-20 w-full max-w-sm grid-cols-2 w-auto text-sm bg-white rounded-lg border border-gray-100 shadow-md dark:border-gray-700 md:grid-cols-3 dark:bg-gray-700">
                       <div class="p-4 pb-4 text-gray-900 md:pb-4 dark:text-white">
                           <ul class="space-y-4" aria-labelledby="mega-menu-dropdown-button">
                               <li>
                                   <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                       About Us
                                   </a>
                               </li>
                               <li>
                                   <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                       Library
                                   </a>
                               </li>
                               <li>
                                   <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                       Resources
                                   </a>
                               </li>
                               <li>
                                   <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                       Pro Version
                                   </a>
                               </li>
                           </ul>
                       </div>
                       <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                           <ul class="space-y-4">
                               <li>
                                   <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                       Blog
                                   </a>
                               </li>
                               <li>
                                   <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                       Newsletter
                                   </a>
                               </li>
                               <li>
                                   <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                       Playground
                                   </a>
                               </li>
                               <li>
                                   <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                       License
                                   </a>
                               </li>
                           </ul>
                       </div>
                       <div class="p-4 text-gray-900 dark:text-white">
                           <ul class="space-y-4">
                               <li>
                                   <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                       Contact Us
                                   </a>
                               </li>
                               <li>
                                   <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                       Support Center
                                   </a>
                               </li>
                               <li>
                                   <a href="#" class="text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500">
                                       Terms
                                   </a>
                               </li>
                           </ul>
                       </div>
                   </div>
               </li>
                <li>
                    <a href="#" class="text-gray-900 dark:text-white hover:underline">About</a>
                </li>
                <li>
                    <a href="#" class="text-gray-900 dark:text-white hover:underline">Contact</a>
                </li>

            </ul>
            @if(Auth::check())
             <a href="{{ route('advertentie.create') }}" class="md:flex ring-2 ring-purple-500 ring-offset-4 cursor-cell hidden relative items-center justify-center w-56 h-10 p-3 text-white transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">
               <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
               Advertentie Plaatsen
            </a>
            @endif
        </div>
    </div>
  </nav>
</div>



     <!-- This example requires Tailwind CSS v3.0+ -->
           
     <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
                  <svg class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
                    <defs>
                      <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9089FC"></stop>
                        <stop offset="1" stop-color="#FF80B5"></stop>
                      </linearGradient>
                    </defs>
                  </svg>
              </div>
        <main class="relative flex justify-center min-h-screen sm:items-center my-4 sm:pt-0">
            @yield('content')
        </main>
    </div>
    
   <div>
     @include('layouts.footer')
   </div>
      

</body>
</html>
