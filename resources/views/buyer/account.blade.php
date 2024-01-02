@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
<main>
   {{-- sidebar --}}
   <x-buyer_aside />
   
   <div class="p-4 sm:ml-64 mt-16">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 ">
         <div>
            <h2 class="text-5xl font-bold mb-4 ml-2 flex place-content-center">Account Details</h2>
            <div class="h-48 w-48 border-2" style="background-image: url('{{auth('buyer')->user()->image_url}}')"></div>
            <p>{{auth('buyer')->user()->first_name}} {{auth('buyer')->user()->last_name}} {{auth('buyer')->user()->name_ext}}</p>
            <p>{{auth('buyer')->user()->mobile_number}}</p>
            <p>{{auth('buyer')->user()->email}}</p>
         </div>
         <div>
            <h2 class="font-bold text-xl">Saved Products</h2>
            <div class="flex flex-col mb-4" >
               
            </div>
         </div>
      </div>
      
   </div>
</main>
@include('partials.__footer')