@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
   
 <main>
   {{-- sidebar --}}
   <x-admin_aside />
   
   <div class="p-4 sm:ml-64 mt-16">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 ">
         {{-- <h2 class="font-bold text-5xl">Welcome {{auth('buyer')->user()->first_name}}!</h2> --}}
         <h2 class="font-bold text-5xl text-gray-800 mb-5">Dashboard</h2>
         <p>Buyer Count:{{$buyers->count()}}</p>
         <p>Category Count:{{$category->count()}}</p>
         <p>Craftspeople Count:{{$seller->count()}}</p>
         <p>Products Count:{{$products->count()}}</p>
         <p>Transactions Count:{{$transactions->count()}}</p>
         <p>Latest Transaction Date:{{$transactions->count()}}</p>
      </div>
   </div>
   <div>
      
   </div>
 </main>
   
 
@include('partials.__footer')
                                          {{-- 'buyers' => $buyers, 
                                          'category' => $categories,
                                          'seller' => $seller,
                                          'products' => $products,
                                          'transactions' => $transactions --}}