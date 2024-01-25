@include('partials.__header')
<x-seller_navbar />
<main class="h-full">
    {{-- sidebar --}}
    <x-seller_aside />
    
    <div class="p-4 sm:ml-64 mt-16 mb-28">
        <div class="p-4 md:border-l-2 flex sm:flex-wrap justify-between border-gray-200 dark:border-gray-700 ">
           {{-- <h2 class="font-bold text-5xl">Welcome {{auth('buyer')->user()->first_name}}!</h2> --}}
           <h2 class="font-bold text-5xl text-gray-800 mb-5">Your Handmade Crafts</h2>
           {{-- <button data-modal-target="addProduct" data-modal-toggle="addProduct" class="bg-blue-500 text-white hover:bg-blue-800 rounded-lg w-content h-max p-3">
                Add a Product
           </button> --}}
           <a href="/products/add" class=" bg-blue-500 text-white hover:bg-blue-800 rounded-lg w-max h-max p-3">
                Add a Product
           </a>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4 h-full">
        @if ($products->isNotEmpty())
            @foreach ($products as $item)
                <div data-action="{{ $item->id }}" class="product rounded flex flex-row bg-gray-100 h-max dark:bg-gray-800 p-5 hover:bg-gray-400 space-x-5 relative">
                    <div class="">
                        <img src="{{ asset($item->image_url )}}" alt="{{$item->image_url}}" class="h-80 w-80">
                    </div>
                    <div class="space-y-5">
                        <p><span class="font-bold">Product id:</span> <span class="font-bold text-xl">{{$item->id}}</span></p>
                        <p><span class="font-bold">Product Name:</span> {{$item->name}}</p>
                        <p><span class="font-bold">Product Description:</span> {{$item->description}}</p>
                        <p><span class="font-bold">Category:</span> {{$item->category->title}}</p>
                        <p><span class="font-bold">Price:</span> {{$item->price}}</p>
                        <p><span class="font-bold">Quantity:</span> {{$item->quantity}}</p>
                        <p><span class="font-bold">Status:</span> {{$item->status}}</p>
                        <div id="{{ $item->id }}" class="absolute hidden top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 space-x-4">
                            {{-- <a href="" class=" p-3 rounded-md bg-blue-500 hover:bg-blue-800">View Products</a> --}}
                            <a href="/edit/product/{{ $item->id }}" class="flex flex-row p-3 rounded-md bg-orange-600 hover:bg-orange-900"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                               <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                               <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                            </svg>
                            Edit
                            </a>
                         </div> 
                    </div>
                </div>
            @endforeach
        @else
            <div class="font-md text-5xl text-gray-600 mx-auto md:mt-60 col-span-2">You do not have any products yet!</div>
        @endif
        
        </div>
     </div>
 </main>
{{-- <x-add_product_modal /> --}}
@include('partials.__footer')