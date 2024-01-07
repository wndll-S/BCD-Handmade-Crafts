@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
<main>
   {{-- sidebar --}}
   <x-buyer_aside />
   
   <div class="p-4 sm:ml-64 mt-16">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 ">
         <h2 class="text-5xl font-bold mb-4 ml-2 flex place-content-center">Bookmarks</h2>
         <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
               <p class="text-2xl text-gray-400 dark:text-gray-500">
                  <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>
               </p>
            </div>
            @foreach($bookmarks as $bookmark)
               <div>
                  @dd($bookmark)
                  <h3>{{ $bookmark->product->name }}</h3>
                  <p>Category: {{ $bookmark->product->category->title }}</p>
                  <p>Craftspeople: {{ $bookmark->product->craftspeople->full_name }}</p>
                  <!-- Add other product details as needed -->
               </div>
            @endforeach
         </div>
      </div>
   </div>
</main>
@include('partials.__footer')