@include('partials.__header')
   {{-- navbar --}}
   <x-seller_navbar />
<main>
   {{-- sidebar --}}
   <x-seller_aside />
   
   <div class="p-4 sm:ml-64 mt-16 mb-24">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700">
         <h2 class="font-bold text-5xl text-gray-800 mb-5">Orders</h2>
         <div class="flex mb-7 space-x-4">
            <button data-status="pending" class="status p-3 bg-blue-500 rounded-lg hover:bg-blue-800 text-white shadow-lg">Pending ({{$order->where('status', 'pending')->count()}})</button>
            <button data-status="processing" class="status p-3 bg-blue-500 rounded-lg hover:bg-blue-800 text-white shadow-lg">Processing ({{$order->where('status', 'processing')->count()}})</button>
            <button data-status="out-for-delivery" class=" status p-3 bg-blue-500 rounded-lg hover:bg-blue-800 text-white shadow-lg">Out-for-Delivery ({{$order->where('status', 'out-for-delivery')->count()}})</button>
            <button data-status="completed" class="status p-3 bg-blue-500 rounded-lg hover:bg-blue-800 text-white shadow-lg">Completed ({{$order->where('status', 'completed')->count()}})</button>
            <button data-status="cancelled" class="status p-3 bg-blue-500 rounded-lg hover:bg-blue-800 text-white shadow-lg">Cancelled ({{$order->where('status', 'cancelled')->count()}})</button>
         </div>
         <div id="content" class="flex flex-col mb-4 space-y-5" >
            @foreach ($order as $item)
               <div id="{{ $item->transaction_id }}" draggable="true" class="hidden {{$item->status}} rounded  grid-cols-3 lg:grid-cols-4 shadow-inner gap-3 border-2 bg-gray-100 dark:bg-gray-800 p-5">
                  <img class="h-40 w-40" src="{{asset($item->products->image_url)}}" alt="{{ $item->products->name}}">
                  <div class="pt-5">
                     <h2 class="font-bold">Buyer Details </h2>
                     <p>{{ $item->buyers->first_name }} {{ $item->buyers->last_name }} {{ $item->buyers->name_ext }}</p>
                     <p>{{ $item->buyers->contact_number}}</p>
                     <p>{{ $item->shipping_address}}</p>
                  </div>
                  <div class="pt-5">
                     <h2 class="font-bold">Order Details </h2>
                     <p>Product Ordered: {{ $item->products->name}}</p>
                     <p>Quantity: {{ $item->total_quantity }}</p>
                     <p>Total Amount: {{ $item->total_amount}}</p>
                  </div>
                  <form action="/order/edit/{{ $item->transaction_id }}" method="post" class="my-auto">
                     @csrf
                     @method('put')
                  @switch( $item->status)
                      @case('pending')
                           <input type="hidden" name="status" value="processing">
                           <button type="submit" class="p-3 rounded-md bg-blue-400 text-gray-800 hover:text-white hover:bg-blue-700 shadow-lg">Accept Order</button>
                          @break
                      @case('processing')
                           <input type="hidden" name="status" value="out-for-delivery">
                           <button type="submit" class="p-3 rounded-md bg-blue-400 text-gray-800 hover:text-white hover:bg-blue-700 shadow-lg">Ship Out</button>
                          @break
                      @case('out-for-delivery')
                           <span class="text-sm  text-gray-500 p-3 bg-white rounded-md shadow-lg">OUT FOR DELIVERY</span> 
                          @break
                      @case('completed')
                          <span class="text-sm text-gray-500 p-3 bg-white rounded-md shadow-lg">COMPLETED</span>
                          @break
                      @default
                          
                  @endswitch
                     {{-- @foreach ($errors->all() as $item)
                         {{$item}}
                     @endforeach --}}
                  </form>
               </div>
           @endforeach
         </div>
      </div>
   </div>
</main>
@include('partials.__footer')