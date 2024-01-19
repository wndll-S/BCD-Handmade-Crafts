
@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
<main>
   {{-- sidebar --}}
   <x-buyer_aside />
   
   <div class="p-4 sm:ml-64 mt-16">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 ">
         <h2 class="text-5xl font-bold mb-4 ml-2 flex place-content-center">Handmade Crafts</h2>
         <div class="flex flex-col mb-4" >
            @foreach ($categories as $category)
               @if ($category->products->isNotEmpty())
                  <h2 class="font-bold text-2xl mb-2" id="{{ $category->title }}">{{ $category->title }}</h2>
                  @foreach ($category->products as $product)
                     <a href="#" id={{ $product->id }} class="rounded bg-gray-100  dark:bg-gray-800 p-5 hover:bg-gray-400">
                        <h2 class="font-bold text-xl">{{ $product->name }}</h2>
                        <p> description {{ $product->description }} </p>
                        <p> seller: {{ $product->craftspeople->first_name }} {{ $product->craftspeople->last_name }} {{ $product->craftspeople->name_ext }}</p>
                        <p> category: {{ $product->category->title }} </p>
                     </a>
                  @endforeach
                  <div class="border-b my-4"></div>
               @endif
            @endforeach
         </div>
      </div>
   </div>
</main>
@include('partials.__footer')