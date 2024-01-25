
@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
<main>
   {{-- sidebar --}}
   <x-buyer_aside />
   
   <div class="p-4 sm:ml-64 mt-16 mb-28">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 ">
         <h2 class="text-5xl font-bold mb-4 ml-2 flex place-content-center">Handmade Crafts</h2>
         <div class="flex flex-col mb-4" >
            @foreach ($category as $category)
               @if ($category->products->contains('status', 'Active'))
                  <h2 class="font-bold text-2xl mb-2" id="{{ $category->title }}">{{ $category->title }}</h2>
                  @foreach ($category->products as $product)
                     @if ($product->status == 'Active')
                        <div data-action="{{ $product->id }}" class="category flex flex-row rounded bg-gray-100  dark:bg-gray-800 p-5 hover:text-gray-300 hover:bg-gray-400 relative">
                           <div>
                              <img src="{{asset($product->image_url)}}" alt="{{$product->name}}" class="h-96 w-96 rounded-md">
                           </div>
                           <div class="ml-5 space-y-6">
                              <h2 class="font-bold text-xl">{{ $product->name }}</h2>
                              <p> Description: <span class="font-semibold text-xl"> {{ $product->description }} </span></p>
                              <p> Seller: <span class="font-semibold text-xl">{{ $product->craftspeople->first_name }} {{ $product->craftspeople->last_name }} {{ $product->craftspeople->name_ext }}</span> </p>
                              <p> Category: <span class="font-semibold text-xl">{{ $product->category->title }}</span>  </p>
                              <p> Available stock: <span class="font-semibold text-xl">{{$product->quantity }}</span> </p>
                              <p> Price: <span class="font-semibold text-xl">{{$product->price }}</span></p>
                           </div>
                           
                           

                           <div id="{{ $product->id }}" class="absolute hidden top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 space-x-4">
                              <a href="/handmade-crafts/order/{{$product->id}}" class="order p-3 rounded-md bg-red-700 hover:bg-red-900 flex">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                 </svg>
                                 <span class="ml-2">Order Now</span>                              
                              </a>
                           </div> 
                        </div>
                        @endif
                  @endforeach
                  <div class="border-b my-4 "></div>
               @endif
            @endforeach
         </div>
      </div>
   </div>
</main>
@include('partials.__footer')