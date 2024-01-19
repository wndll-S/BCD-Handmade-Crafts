@include('partials.__header')
<x-seller_navbar />
<main>
    {{-- sidebar --}}
    <x-seller_aside />
    
    <div class="p-4 sm:ml-64 mt-16 mb-28">
        <div class="p-4 md:border-l-2 flex sm:flex-wrap justify-between border-gray-200 dark:border-gray-700 ">
           {{-- <h2 class="font-bold text-5xl">Welcome {{auth('buyer')->user()->first_name}}!</h2> --}}
           <h2 class="font-bold text-5xl text-gray-800 mb-5">Your Handmade Crafts</h2>
           {{-- <button data-modal-target="addProduct" data-modal-toggle="addProduct" class="bg-blue-500 text-white hover:bg-blue-800 rounded-lg w-content h-max p-3">
                Add a Product
           </button> --}}
           <a href="/products/add" class=" bg-blue-500 text-white hover:bg-blue-800 rounded-lg w-content h-max p-3">
                Add a Product
           </a>
        </div>
        <div class="flex flex-col gap-4 mb-4">
        @foreach ($products as $item)
                <a href="#" class="rounded bg-gray-100 h-max dark:bg-gray-800 p-5 hover:bg-gray-400">
                    <p><span class="font-bold">Product id:</span> {{$item->id}}</p>
                    <p><span class="font-bold">Seller:</span> {{$item->craftspeople->first_name}}</p>
                    <p><span class="font-bold">Category:</span> {{$item->category->title}}</p>
                    <p><span class="font-bold">Product Name:</span> {{$item->name}}</p>
                    <p><span class="font-bold">Product Description:</span> {{$item->description}}</p>
                    <p><span class="font-bold">Price:</span> {{$item->price}}</p>
                    <p><span class="font-bold">Quantity:</span> {{$item->quantity}}</p>
                    <p><span class="font-bold">Status:</span> {{$item->status}}</p>
                </a>
        @endforeach
        </div>
     </div>
 </main>
{{-- <x-add_product_modal /> --}}
@include('partials.__footer')