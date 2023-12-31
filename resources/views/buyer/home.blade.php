@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
   
 <main>
   {{-- sidebar --}}
   <x-buyer_aside />
   
   <div class="p-4 sm:ml-64 mt-16">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 ">
         <h2 class="font-bold text-5xl">Welcome {{auth('buyer')->user()->first_name}}!</h2>
      </div>
   </div>
 </main>
   
 
@include('partials.__footer')