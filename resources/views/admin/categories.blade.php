@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
<main>
   {{-- sidebar --}}
   <x-admin_aside />

   <div class="p-4 sm:ml-64 mt-16 mb-24">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 ">
         <h2 class="font-bold text-5xl text-gray-800 mb-5">Categories</h2>
         <div class="grid md:grid-cols-2 grid-cols-1  gap-4 mb-4">
            @foreach ($categories as $category)
            {{-- href="/buyer/handmade-crafts#{{$category->title}}" --}}
               <div  data-action="{{ $category->id }}" class="category rounded bg-gray-100 h-28 dark:bg-gray-400 p-5 hover:text-gray-300 hover:bg-gray-400 relative">
                  <h2 class="font-bold text-xl">{{ $category->title }}</h2>
                  <p> {{ $category->description }} </p>
                  <div id="{{ $category->id }}" class="absolute hidden top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 space-x-4">
                     <a href="/admin/handmade-crafts#{{$category->title}}" class=" p-3 rounded-md bg-blue-500 hover:bg-blue-800">View Products</a>
                     <a href="/admin/category/{{$category->id}}" class=" p-3 rounded-md bg-orange-600 hover:bg-orange-900"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                     </svg>
                     </a>
                  </div> 
               </div>
            @endforeach
         </div>
      </div>
   </div>
</main>
@include('partials.__footer')