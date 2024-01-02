@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
<main>
   {{-- sidebar --}}
   <x-buyer_aside />

   <div class="p-4 sm:ml-64 mt-16">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 ">
         <h2 class="text-5xl font-bold mb-4 ml-2 flex place-content-center">Categories</h2>

         <div class="grid md:grid-cols-2 grid-cols-1  gap-4 mb-4">
            @foreach ($categories as $category)
               <a href="/buyer/handmade-crafts#{{$category->title}}" id={{ $category->id }} class="rounded bg-gray-100 h-28 dark:bg-gray-800 p-5 hover:bg-gray-400">
                  <h2 class="font-bold text-xl">{{ $category->title }}</h2>
                  <p> {{ $category->description }} </p>
               </a>
            @endforeach
         </div>
      </div>
   </div>
</main>
@include('partials.__footer')