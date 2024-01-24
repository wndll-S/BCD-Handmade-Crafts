@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
<main>
   {{-- sidebar --}}
   <x-admin_aside />
   
   <div class="p-4 sm:ml-64 mt-16 mb-32">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 ">
        <h2 class="font-bold text-5xl text-gray-800 mb-5">Account Details</h2>
         <div class="bg-gray-300 rounded-lg">
            <div class="relative">
               <button id="craftspeople_viewer" class="md:flex font-semibold pl-4 rounded-r-full z-50 bg-white view items-center hover:bg-gray-400 hover:rounded-tl-lg lg:w-36 ">
                  <span class="py-5 px-3 text-gray-700 hover:text-gray-900">Craftspeople</span>
               </button> 
               <button id="buyers_viewer" class="absolute top-0 font-semibold left-32 pl-5 md:flex rounded-r-full  items-center  view hover:bg-gray-400 lg:w-36 ">
                  <span class="py-5 px-3 text-gray-700 hover:text-gray-900 ">Buyers</span>
               </button> 
            </div>
            

<div class="relative overflow-x-auto shadow-md sm:rounded-lg" id="craftspeople">
   <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
      
   </div>
        <x-seller_tbl  :sellers="$sellers"/>
        <x-buyer_tbl  :buyers="$buyers"/>
    </div>

         </div>
      </div>
   </div>
</main>



@include('partials.__footer')