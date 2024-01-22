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
       <div>
           <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
               <span class="sr-only">Action button</span>
               Action
               <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
               </svg>
           </button>
           <!-- Dropdown menu -->
           <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
               <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                   <li>
                       <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                   </li>
                   <li>
                       <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                   </li>
                   <li>
                       <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate account</a>
                   </li>
               </ul>
               <div class="py-1">
                   <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete User</a>
               </div>
           </div>
       </div>
       <label for="table-search" class="sr-only">Search</label>
       <div class="relative">
           <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
               <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
               </svg>
           </div>
           <input type="text" id="table-search-users" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
       </div>
   </div>
        <x-seller_tbl  :sellers="$sellers"/>
        <x-buyer_tbl  :buyers="$buyers"/>
    </div>

         </div>
      </div>
   </div>
</main>



@include('partials.__footer')