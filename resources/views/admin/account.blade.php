@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
<main>
   {{-- sidebar --}}
   <x-buyer_aside />
   
   <div class="p-4 sm:ml-64 mt-16">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 ">
         <h2 class="text-5xl font-bold mb-4 ml-2 flex place-content-center">Account Details</h2>
         <div class="grid md:grid-cols-2 grid-cols-1  gap-4 mb-4">
            @foreach ($account as $buyer)
               <div id={{ $buyer->id }} class="rounded bg-gray-100 h-28 dark:bg-gray-800 p-5 hover:bg-gray-400" style="background-image: url({{ $buyer->image_url }}')">
                  
                  <h2 class="font-bold text-xl">{{ $buyer->email }}</h2>
                  <p> {{ $buyer->first_name }}  {{ $buyer->last_name }}  {{ $buyer->name_ext }}</p>
                  <p> {{ $buyer->mobile_number }}</p>
               </div>
            @endforeach
         </div>
      </div>
   </div>
</main>
@include('partials.__footer')