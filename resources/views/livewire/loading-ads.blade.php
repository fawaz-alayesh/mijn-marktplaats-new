
<div wire:init="loadAds" >
                           
@if($readyToLoad == true)

<div  class="grid grid-cols-2 gap-y-4 gap-x-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 xl:gap-x-4">
@foreach($ads as $ad)

<a href="{{ route('advertentie.show', ['advertentie' => $ad['slug']]) }}" id="results" class="group aspect-w-1 aspect-h-1 w-full has-mask lg:h-75 shadow overflow-hidden rounded-lg bg-white">
  <div class="aspect-w-1 aspect-h-1 w-full has-mask md:h-72  h-48 object-center overflow-hidden bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
  <!-- php artisan storage:link is to Create a symbolic link with the help of artisan command as shown below -->
    <img src="{{ asset('uploads/'.$ad->filename)}}" alt="" class="h-full w-full object-cover groupad object-center transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0">
  </div>  
  <h3 class="mt-4 m-2 text-sm text-gray-700">{{ $ad->title }}</h3>
  <p class="mt-1 m-2 text-lg font-medium text-gray-900"> {{"€".number_format($ad->price, 0, '.', ',')}}</p>

</a> 

@endforeach
</div>
</div>
@else

<div  class="grid grid-cols-2 gap-y-4 gap-x-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 xl:gap-x-4">
<div role="status" class="load  rounded border border-gray-200 shadow animate-pulse pb-2 dark:border-gray-700">
       <div class="flex justify-center items-center load mb-4 h-72 bg-gray-300 rounded dark:bg-gray-700">
           <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
       </div>

       <div class="flex items-center mt-4 space-x-3">
           <div>
           <div class="w-44 h-2 bg-gray-200 rounded-full mt-0 m-2 dark:bg-gray-700"></div>
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-20 mt-2 m-2 "></div>
           </div>
       </div>
       <span class="sr-only">Loading...</span>
 </div> 
 
 <div role="status" class="load rounded border border-gray-200 shadow animate-pulse pb-2 dark:border-gray-700">
       <div class="flex justify-center items-center load mb-4 h-72 bg-gray-300 rounded dark:bg-gray-700">
           <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
       </div>

       <div class="flex items-center mt-4 space-x-3">
           <div>
           <div class="w-44 h-2 bg-gray-200 rounded-full mt-0 m-2 dark:bg-gray-700"></div>
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-20 mt-2 m-2 "></div>
           </div>
       </div>
       <span class="sr-only">Loading...</span>
 </div> 
 <div role="status" class="load  rounded border border-gray-200 shadow animate-pulse pb-2 dark:border-gray-700">
       <div class="flex justify-center items-center load mb-4 h-72 bg-gray-300 rounded dark:bg-gray-700">
           <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
       </div>

       <div class="flex items-center mt-4 space-x-3">
           <div>
           <div class="w-44 h-2 bg-gray-200 rounded-full mt-0 m-2 dark:bg-gray-700"></div>
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-20 mt-2 m-2 "></div>
           </div>
       </div>
       <span class="sr-only">Loading...</span>
 </div> 
 <div role="status" class="load rounded border border-gray-200 shadow animate-pulse pb-2 dark:border-gray-700">
       <div class="flex justify-center items-center load mb-4 h-72 bg-gray-300 rounded dark:bg-gray-700">
           <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
       </div>

       <div class="flex items-center mt-4 space-x-3">
           <div>
           <div class="w-44 h-2 bg-gray-200 rounded-full mt-0 m-2 dark:bg-gray-700"></div>
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-20 mt-2 m-2 "></div>
           </div>
       </div>
       <span class="sr-only">Loading...</span>
 </div> 
 <div role="status" class="load rounded border border-gray-200 shadow animate-pulse pb-2 dark:border-gray-700">
       <div class="flex justify-center items-center load mb-4 h-72 bg-gray-300 rounded dark:bg-gray-700">
           <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
       </div>

       <div class="flex items-center mt-4 space-x-3">
           <div>
           <div class="w-44 h-2 bg-gray-200 rounded-full mt-0 m-2 dark:bg-gray-700"></div>
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-20 mt-2 m-2 "></div>
           </div>
       </div>
       <span class="sr-only">Loading...</span>
 </div> 
 <div role="status" class="load  rounded border border-gray-200 shadow animate-pulse pb-2 dark:border-gray-700">
       <div class="flex justify-center items-center load mb-4 h-72 bg-gray-300 rounded dark:bg-gray-700">
           <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
       </div>

       <div class="flex items-center mt-4 space-x-3">
           <div>
           <div class="w-44 h-2 bg-gray-200 rounded-full mt-0 m-2 dark:bg-gray-700"></div>
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-20 mt-2 m-2 "></div>
           </div>
       </div>
       <span class="sr-only">Loading...</span>
 </div> 
 <div role="status" class="load rounded border border-gray-200 shadow animate-pulse pb-2 dark:border-gray-700">
       <div class="flex justify-center items-center load mb-4 h-72 bg-gray-300 rounded dark:bg-gray-700">
           <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
       </div>

       <div class="flex items-center mt-4 space-x-3">
           <div>
           <div class="w-44 h-2 bg-gray-200 rounded-full mt-0 m-2 dark:bg-gray-700"></div>
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-20 mt-2 m-2 "></div>
           </div>
       </div>
       <span class="sr-only">Loading...</span>
 </div> 
 <div role="status" class="load rounded border border-gray-200 shadow animate-pulse pb-2 dark:border-gray-700">
       <div class="flex justify-center items-center load mb-4 h-72 bg-gray-300 rounded dark:bg-gray-700">
           <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
       </div>

       <div class="flex items-center mt-4 space-x-3">
           <div>
           <div class="w-44 h-2 bg-gray-200 rounded-full mt-0 m-2 dark:bg-gray-700"></div>
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-20 mt-2 m-2 "></div>
           </div>
       </div>
       <span class="sr-only">Loading...</span>
 </div> 
 <div role="status" class="load  rounded border border-gray-200 shadow animate-pulse pb-2 dark:border-gray-700">
       <div class="flex justify-center items-center load mb-4 h-72 bg-gray-300 rounded dark:bg-gray-700">
           <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
       </div>

       <div class="flex items-center mt-4 space-x-3">
           <div>
           <div class="w-44 h-2 bg-gray-200 rounded-full mt-0 m-2 dark:bg-gray-700"></div>
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-20 mt-2 m-2 "></div>
           </div>
       </div>
       <span class="sr-only">Loading...</span>
 </div> 
 <div role="status" class="load  rounded border border-gray-200 shadow animate-pulse pb-2 dark:border-gray-700">
       <div class="flex justify-center items-center load mb-4 h-72 bg-gray-300 rounded dark:bg-gray-700">
           <svg class="w-12 h-12 text-gray-200 dark:text-gray-600" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
       </div>

       <div class="flex items-center mt-4 space-x-3">
           <div>
           <div class="w-44 h-2 bg-gray-200 rounded-full mt-0 m-2 dark:bg-gray-700"></div>
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-20 mt-2 m-2 "></div>
           </div>
       </div>
       <span class="sr-only">Loading...</span>
 </div> 
 </div> 

 @endif
