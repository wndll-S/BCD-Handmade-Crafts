@php
    if ($maxQuantityProductId !== null) {
        $product = App\Models\Products::find($maxQuantityProductId);
        $product_name = $product->name;
        }
@endphp
@include('partials.__header')
<x-seller_navbar />
<main>
    {{-- sidebar --}}
    <x-seller_aside />
    
    <div id="lapad" class="p-4 sm:ml-64 mt-16">
        <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 flex justify-between">
           {{-- <h2 class="font-bold text-5xl">Welcome {{auth('buyer')->user()->first_name}}!</h2> --}}
           <h2 class="font-bold text-5xl text-gray-800 mb-5">Dashboard</h2>

           <button id="print" class="tago rounded-md border bg-blue-500 shadow-lg flex text-white font-semibold place-items-center p-4 space-x-2 justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
            </svg>
            <span>Print Report</span>
         </button>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 p-4 md:border-l-2">
            <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Number of Products: {{count($products)}}</p></div>
            <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Purchase Frequency: {{count($transactions)}}</p></div>
            <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Unique Customer Count: {{count($buyer_ids)}}</p></div>
            <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Total Revenue: {{$revenue}}</p></div>
            <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Total Units Sold: {{$units}}</p></div>
            <div class="flex border rounded-md p-4 bg-gray-700"><p class="text-white font-semibold">Top Selling Product: {{$product_name ?? 'N/A'}} ({{$maxQuantity}})</p></div>
        </div>
    </div>
</main>
@include('partials.__footer')