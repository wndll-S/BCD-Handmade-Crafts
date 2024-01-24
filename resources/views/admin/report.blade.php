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
                <svg class="h-6 w-6 mr-1 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
                <span class="font-bold">BCD Handmade Crafts</span>
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