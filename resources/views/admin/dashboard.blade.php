@php
                  $latest_transaction = $transactions->sortByDesc('created_at')->first();
                  $latest_buyer = $buyers->sortByDesc('created_at')->first();
                  $latest_craftsperson = $seller->sortByDesc('created_at')->first();
                  $latest_product = $products->sortByDesc('created_at')->first();
                  $latest_category = $category->sortByDesc('created_at')->first();

                  $buyerWithMostProducts = $transactions->groupBy('buyer_id')->map->sum('total_quantity');
                  $maxBuyerId = $buyerWithMostProducts->keys()->sortDesc()->first();
                  $maxQuantity = $buyerWithMostProducts->get($maxBuyerId); 
                  $buyer = App\Models\Buyer::find($maxBuyerId);

                  $mostSoldProduct = $transactions->groupBy('product_id')->map->sum('total_quantity');
                  $productId = $mostSoldProduct->keys()->sortDesc()->first();
                  $productQuantity = $mostSoldProduct->get($productId); 
                  $product = App\Models\Products::find($productId);

                  $craftsperson = $product->craftspeople;


@endphp
@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
   
 <main>
   {{-- sidebar --}}
   <x-admin_aside />
   
   <div class="p-4 sm:ml-64 mt-16 ">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 flex justify-between">
         {{-- <h2 class="font-bold text-5xl">Welcome {{auth('buyer')->user()->first_name}}!</h2> --}}
         <h2 class="font-bold text-5xl text-gray-800 mb-5">Dashboard</h2>
         <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="rounded-md border bg-blue-500 shadow-lg flex text-white font-semibold place-items-center p-4 space-x-2 justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
            </svg>
            <span>Generate Report</span>
         </button>
         {{-- <p>Latest Transaction Date & Time: {{$latest_transaction->created_at}} </p>
         <p>Last registered buyer: {{$latest_buyer->first_name}}</p>
         <p>Last registered craftsperson: {{$latest_craftsperson->first_name}}</p>
         <p>Last added product: {{$latest_product->name}}</p> --}}
      </div>
      <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 p-4 md:border-l-2">
         <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Buyer Count: {{$buyers->count()}}</p></div>
         <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Craftspeople Count: {{$seller->count()}}</p></div>
         <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Products Count: {{$products->count()}}</p></div>
         <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Transactions Count: {{$transactions->count()}}</p></div>

         <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Total Revenue: ₱{{$transactions->sum('total_amount')}}</p></div>
         <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Total Sold Products: {{$transactions->sum('total_quantity')}}</p></div>
         <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Best Buyer: {{$buyer->first_name}} {{$buyer->last_name}} {{$buyer->name_ext}} ({{$maxQuantity}})</div>
         <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Seller with most sold product: {{$craftsperson->first_name}}</p></div>

         <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Best selling product: {{$product->id}}</p></div>
         <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Number of completed Orders: {{$transactions->where('status', 'completed')->count()}}</p></div>
         <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Number of cancelled Orders: {{$transactions->where('status', 'cancelled')->count()}}</p></div>
         <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Categories Count: {{$category->count()}}</p></div>
      </div>
   </div>
   
 </main>
<x-generate_reports_modal />
@include('partials.__footer')
                                          {{-- 'buyers' => $buyers, 
                                          'category' => $categories,
                                          'seller' => $seller,
                                          'products' => $products,
                                          'transactions' => $transactions --}}