@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
<main>
   {{-- sidebar --}}
   <x-admin_aside />
   
   <div class="p-4 sm:ml-64 mt-16 mb-32">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 ">
        <h2 class="font-bold text-5xl text-gray-800 mb-5">Transactions</h2>
         <div class="bg-gray-300 rounded-lg">
            

<div class="relative overflow-x-auto shadow-md sm:rounded-lg" id="craftspeople">
   <div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
       
   </div class="overflow-x-auto">
        <x-transactions_tbl  :transactions="$transactions"/>
    </div>

         </div>
      </div>
   </div>
</main>



@include('partials.__footer')