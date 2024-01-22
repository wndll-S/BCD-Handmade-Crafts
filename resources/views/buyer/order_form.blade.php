@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
   <main class="lg:pt-10 block lg:flex mt-16 my-32">
    <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto  md:h-full lg:py-0 lg:w-3/5">
        <div class="bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-lg xl:p-0 dark:bg-gray-800 dark:border-gray-700 ">
            <!-- Modal content -->
            <div class="p-6 w-full bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-2xl font-medium mx-auto text-gray-900 dark:text-white">
                        Order Form
                    </h3>
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
                <!-- Modal body -->
                <form action="/store/transaction" method="POST">
                    @csrf 
                    <input type="text" name="status" value="pending" hidden>
                    <input type="text" name="buyer_id" value="{{auth()->guard('buyer')->id()}}" hidden>
                    <input type="text" name="product_id" id="product_id" value="{{$product->id}}" hidden>
                    <div class="space-y-4 md:space-y-6 mt-5">
                        <div>
                            <div class="w-full">
                               <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Buyer's Name</label>
                               <input type="text" id="Name" class="border-0 text-gray-900 font-bold" placeholder="Juan" required="" value='{{auth('buyer')->user()->first_name}} {{auth('buyer')->user()->last_name}} {{auth('buyer')->user()->name_ext}}' disabled>
                            </div>
                         </div>
                         <div>
                            <div class="">
                               <label for="mobile_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                               <input type="number" id="mobile_number" class="border-0 text-gray-900 font-bold" placeholder="" disabled value={{auth('buyer')->user()->mobile_number}}>
                            </div>
                         </div>
                         <div>
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                            <textarea name="shipping_address" id="address" class="bg-gray-50 border font-bold border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lot #, Block #, Subdivision/Purok, Barangay, City, Philippines" required=""></textarea>
                            @error('shipping_address')
                               <p class="text-red-500 text-xs">
                                     {{$message}}
                               </p>
                            @enderror
                         </div>
                         <div class="flex">
                              <div>
                                  <label for="total_quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                                  <input type="number" name="total_quantity" min="1" max="{{$product->quantity}}" id="total_quantity" class="font-bold bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="">
                                  @error('total_quantity')
                                      <p class="text-red-500 text-xs">
                                              {{$message}}
                                      </p>
                                  @enderror
                              </div>
                              <p class="mt-10 ml-5">Available Stock: <span class="font-bold">{{$product->quantity}}</span></p>
                          </div>
                          <div>
                            <label for="payment_method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Payment Method</label>
                            <div class="space-x-10 flex">
                                <div>
                                    <input type="radio" name="payment_method" value="cod" checked/> COD
                                </div>
                                <div>
                                    <input type="radio" name="payment_method" value="gcash" /> GCASH
                                </div>
                                <div>
                                    <input type="radio" name="payment_method" value="bank_transfer" /> Bank Transfer
                                </div>
                            </div>
                            @error('payment_method')
                                <p class="text-red-500 text-xs">
                                        {{$message}}
                                </p>
                            @enderror
                        </div>
                    </div> 
            </div>
        </div>
    </section>
    <section class="lg:w-2/5 lg:mr-10">
        <div class="p-6 w-full bg-white rounded-lg shadow dark:bg-gray-700 space-y-4 md:space-y-6 ">
            <h3 class="text-2xl font-medium text-center  mx-auto text-gray-900 dark:text-white">
                INVOICE
            </h3>
            <hr>
            <p class="text-xl">Item: <span class="font-bold">{{$product->name}}</span></p>
            <p class="text-xl">Price per product: <span id="price" class="bg-gray-200 p-3 border rounded-lg font-bold">{{$product->price}}</span></p>
            <p class="text-xl">Quantity: <span id="quantity" class="border-0 font-bold text-2xl w-max">0</span></p>
            <hr>
            <p class="text-2xl font-bold ">Total: ₱<input type="text" class="border-0 font-bold w-max text-3xl focus:ring-0" id="total" placeholder="0" name="total_amount" value="" readonly></p>
            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Place Order</button>
            <a type="button" href="/handmade-crafts" class="w-full text-white bg-gray-300 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cancel</a>
        </div> 
    </section>
</form> 
    </main>
 @include('partials.__footer')