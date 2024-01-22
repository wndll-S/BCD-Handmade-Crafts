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
   
   <div class="p-4 sm:ml-64 mt-16">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 ">
         {{-- <h2 class="font-bold text-5xl">Welcome {{auth('buyer')->user()->first_name}}!</h2> --}}
         <h2 class="font-bold text-5xl text-gray-800 mb-5">Dashboard</h2>
         <p>Buyer Count: {{$buyers->count()}}</p>
         <p>Category Count: {{$category->count()}}</p>
         <p>Craftspeople Count: {{$seller->count()}}</p>
         <p>Products Count: {{$products->count()}}</p>
         <p>Transactions Count: {{$transactions->count()}}</p>
         <p>Total Revenue: ₱{{$transactions->sum('total_amount')}}</p>
         <p>Total Sold Products: {{$transactions->sum('total_quantity')}}</p>
         <p>Latest Transaction Date & Time: {{$latest_transaction->created_at}} </p>
         <p>Last registered buyer: {{$latest_buyer->first_name}}</p>
         <p>Last registered craftsperson: {{$latest_craftsperson->first_name}}</p>
         <p>Last added product: {{$latest_product->name}}</p>
         <p>Best Buyer: {{$buyer->first_name}} {{$buyer->last_name}} {{$buyer->name_ext}} ({{$maxQuantity}})</p>
         <p>Seller with most sold product: {{$craftsperson->first_name}}</p>
         <p>Best selling product: {{$product->id}}</p>
         <p>Number of completed Orders: {{$transactions->where('status', 'completed')->count()}}</p>
         <p>Number of cancelled Orders: {{$transactions->where('status', 'cancelled')->count()}}</p>
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