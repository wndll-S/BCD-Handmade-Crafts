@php
    $mostSoldProduct = $transactions->groupBy('product_id')->map->sum('total_quantity');
    $productId = $mostSoldProduct->keys()->sortDesc()->first();
    $productQuantity = $mostSoldProduct->get($productId); 
    $product = App\Models\Products::find($productId);

    $preferredPaymentMethod = $transactions->groupBy('payment_method')->map->count();
    $mostPreferredMethod = $preferredPaymentMethod->max(); 
    $mostPreferredMethodKey = $preferredPaymentMethod->search($mostPreferredMethod);

    $buyers_in_range = App\Models\Buyer::whereBetween('created_at', [$from, $to])->get();

    $number_of_buyers_with_transaction = $transactions->pluck('buyer_id')->unique()->count();
    $total_number_of_buyers = $total_buyers->count(); 
    $percentage = number_format(($number_of_buyers_with_transaction / $total_number_of_buyers) * 100, 2);
    $from->toDateString(); $to->toDateString();
    $buyers_with_no_transactions = $total_number_of_buyers - $number_of_buyers_with_transaction;
@endphp
@include('partials.__header')
<nav class="bg-gray-100 z-50 fixed top-0 right-0 left-0">
    <a href="/admin/dashboard" class=" flex font-semibold fixed ml-4 bg-blue-600 text-white p-4 rounded-lg shadow-md babye">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
        </svg>
        Back
    </a>
    <div class="flex w-screen px-4 place-items-center">
            <a href="/buyer/home" class="flex items-center sm:mx-auto py-5 px-2 text-gray-700 hover:text-gray-900">
              <svg   viewBox="0 0 1024 1024" class="icon w-6 h-6 mr-2"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M907.9 914.5H116.6c-7 0-12.6-5.7-12.6-12.6V234.1c0-7 5.7-12.6 12.6-12.6h791.3c7 0 12.6 5.7 12.6 12.6v667.7c0.1 7-5.6 12.7-12.6 12.7z m-778.6-25.3h766V246.7h-766v642.5z" fill="#10457E" /><path d="M212.2 272.9h600.1v468.7H212.2z" fill="#9ED5E4" /><path d="M62.2 179.6v125.2c0 91 67.5 165.5 150 165.5s150-74.5 150-165.5V179.6h-300z" fill="#FAFCFC" /><path d="M212.2 482.9c-89.7 0-162.7-79.9-162.7-178.2V179.6c0-7 5.7-12.6 12.6-12.6h300c7 0 12.6 5.7 12.6 12.6v125.2c0.2 98.2-72.8 178.1-162.5 178.1zM74.9 192.2v112.5c0 40.9 14.5 79.4 40.8 108.4 26 28.7 60.3 44.5 96.6 44.5s70.6-15.8 96.6-44.5c26.3-29 40.8-67.5 40.8-108.4V192.2H74.9z" fill="#154B8B" /><path d="M362.3 179.6v125.2c0 91 67.5 165.5 150 165.5s150-74.5 150-165.5V179.6h-300z" fill="#FAFCFC" /><path d="M512.3 482.9c-89.7 0-162.7-79.9-162.7-178.2V179.6c0-7 5.7-12.6 12.6-12.6h300c7 0 12.6 5.7 12.6 12.6v125.2c0.1 98.2-72.8 178.1-162.5 178.1zM374.9 192.2v112.5c0 40.9 14.5 79.4 40.8 108.4 26 28.7 60.3 44.5 96.6 44.5s70.6-15.8 96.6-44.5c26.3-29 40.8-67.5 40.8-108.4V192.2H374.9z" fill="#154B8B" /><path d="M662.3 179.6v125.2c0 91 67.5 165.5 150 165.5s150-74.5 150-165.5V179.6h-300z" fill="#FAFCFC" /><path d="M812.3 482.9c-89.7 0-162.7-79.9-162.7-178.2V179.6c0-7 5.7-12.6 12.6-12.6h300c7 0 12.6 5.7 12.6 12.6v125.2C975 403 902 482.9 812.3 482.9zM674.9 192.2v112.5c0 40.9 14.5 79.4 40.8 108.4 26 28.7 60.3 44.5 96.6 44.5s70.6-15.8 96.6-44.5c26.3-29 40.8-67.5 40.8-108.4V192.2H674.9z" fill="#154B8B" /><path d="M962.3 179.6H62.2L198.5 116h627.6z" fill="#98C9D6" /><path d="M962.3 192.2H62.2c-5.9 0-11.1-4.1-12.3-9.9-1.3-5.8 1.6-11.7 7-14.2l136.3-63.6c1.7-0.8 3.5-1.2 5.3-1.2h627.6c1.8 0 3.7 0.4 5.3 1.2l136.3 63.6c5.4 2.5 8.3 8.4 7 14.2-1.3 5.8-6.4 9.9-12.4 9.9z m-843.1-25.3h786.1l-82.1-38.3h-622l-82 38.3z" fill="#154B8B" /></svg>
              <span class="font-bold">Local Handmade Crafts Online Store</span>
            </a>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<main class="mt-16 mb-28 w-screen flex-col ">
    <div  class="flex mb-8">
        <h1 class="text-4xl font-bold mx-auto">Report for {{$from->toDateString()}} till {{$to->toDateString()}}</h1>
    </div>
    <div class="flex">
        <div class="mx-auto space-y-4">
            <p class="text-black text-xl font-semibold">Adjusted Earnings: <span class="text-2xl italic">₱{{$transactions->sum('total_amount')}}</span> </p>
            <p class="text-black text-xl font-semibold">Total Transactions: <span class="text-2xl italic">{{$transactions->count()}}</span></p>
            <p class="text-black text-xl font-semibold">Units Sold: <span class="text-2xl italic">{{$transactions->sum('total_quantity')}}</span> </p>
            <p class="text-black text-xl font-semibold">Successful Orders: <span class="text-2xl italic">{{$transactions->where('status', 'completed')->count()}}</span></p>
            <p class="text-black text-xl font-semibold">Cancelled Transactions: <span class="text-2xl italic">{{$transactions->where('status', 'cancelled')->count()}}</span></p>
            <p class="text-black text-xl font-semibold">Top-Performing Category: <span class="text-2xl italic">{{$product ? $product->category->title : 'N/A'}}</span></p>
            <p class="text-black text-xl font-semibold">Most Utilized Payment Method: <span class="text-2xl italic">{{$mostPreferredMethodKey ?? 'N/A'}} ({{$mostPreferredMethod ?? 'N/A'}}))</span></p>
            <p class="text-black text-xl font-semibold">Top-Selling Item: <span class="text-2xl italic">{{$product ? $product->name : 'N/A'}} ({{$productQuantity}})</span></p>
            <p class="text-black text-xl font-semibold">Buyers with a Transaction: <span class="text-2xl italic">{{ $number_of_buyers_with_transaction }} (all-time) </span></p>
            <p class="text-black text-xl font-semibold">Unique Sellers: <span class="text-2xl italic">{{ $total_sellers->count() }} (all-time) </span></p>
            <p class="text-black text-xl font-semibold">Buyer Conversion Rate: <span class="text-2xl italic">{{ $percentage }}% (all-time)</span></p>
            <p data-uniqueBuyer="{{ $total_buyers->count() }}" id="" class="hidden"></p>
            <p data-totalBuyers="{{$total_buyers->count()}}" class="hidden"></p>
            <p class="text-black text-xl font-semibold">Printed by: {{auth()->guard('admin')->user()->username}}</p>
            <button id="saveAsPdfButton" class="bg-blue-700 babye p-4 rounded-md border text-white">Save as PDF</button>
        </div>
        <div class="py-6 my-auto" id="pie-chart"></div>
    </div>
   
</main>

<script>
    // ApexCharts options and config
    window.addEventListener("load", function() {
      const getChartOptions = () => {
          return {
            series: [{{$number_of_buyers_with_transaction}}, {{$buyers_with_no_transactions}}],
            colors: ["#1C64F2", "#16BDCA"],
            chart: {
              height: 420,
              width: "100%",
              type: "pie",
            },
            stroke: {
              colors: ["white"],
              lineCap: "",
            },
            plotOptions: {
              pie: {
                labels: {
                  show: true,
                },
                size: "100%",
                dataLabels: {
                  offset: -25
                }
              },
            },
            labels: ["Buyers w/transaction", "Buyers w/out transaction"],
            dataLabels: {
              enabled: true,
              style: {
                fontFamily: "Inter, sans-serif",
              },
            },
            legend: {
              position: "bottom",
              fontFamily: "Inter, sans-serif",
            },
            yaxis: {
              labels: {
                formatter: function (value) {
                  return value + "%"
                },
              },
            },
            xaxis: {
              labels: {
                formatter: function (value) {
                  return value  + "%"
                },
              },
              axisTicks: {
                show: false,
              },
              axisBorder: {
                show: false,
              },
            },
          }
        }
  
        if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
          const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
          chart.render();
        }
    });
  </script>
@include('partials.__footer')