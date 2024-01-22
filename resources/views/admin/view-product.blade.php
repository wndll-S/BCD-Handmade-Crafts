@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
   <main class="lg:pt-10 items-center sm:block mt-16 my-32">
    <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto  md:h-full lg:py-0 ">
        <div class="bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-lg xl:p-0 dark:bg-gray-800 dark:border-gray-700 ">
            <!-- Modal content -->
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-2xl font-medium mx-auto text-gray-900 dark:text-white">
                        Product Details
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <img  src="{{asset($product->image_url)}}" alt="{{$product->first_name}} {{$product->last_name}}" class="w-40 h-40 rounded-md mx-auto">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400" >
                        ID: <span class="font-bold text-gray-900">{{$product->id}} </span>
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Seller: <span class="font-bold text-gray-900">{{$product->craftspeople->first_name}} {{$product->craftspeople->last_name}} {{$product->craftspeople->name_ext}}</span>
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Product Name: <span class="font-bold text-gray-900">{{$product->name}} </span>
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Description: <span class="font-bold text-gray-900">{{$product->description}}</span>
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Price: <span class="font-bold text-gray-900">{{$product->price}}</span>
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                       Quantity: <span class="font-bold text-gray-900">{{$product->quantity}}</span>
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                       Product Status: <span class="font-bold text-gray-900">{{$product->status}}</span>
                    </p>
                </div>
                <!-- Modal footer -->
                    @if($product->status == 'Active' )
                        <div class="flex items-center p-4 md:p-5 w-full">
                            <button data-title="Suspend" data-action="Suspended" data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="mx-auto pop text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5  focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Suspend</button>
                        </div>
                    @elseif($product->status == 'Deleted' )
                        <div class="flex items-center p-4 md:p-5 w-full">
                            <span class="mx-auto pop text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5  focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">THIS PRODUCT HAS BEEN DELETED BY THE OWNER</span>
                        </div>
                    @elseif($product->status == 'Pending' || $product->status == 'Suspended')
                        <div class="flex items-center space-x-4 p-4 md:p-5 w-full">
                            <div class="mx-auto">
                                <button data-title="Approve" data-action="Active" data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="pop text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Activate</button>

                                <button data-title="Decline" data-action="Declined" data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="pop ms-3 text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5  focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                            </div>
                        </div>
                    @endif
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 justify-between">
                    <a href="/admin/handmade-crafts" type="button" class=" text-center w-full text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</a>
                </div>
            </div>
        </div>
    </section>
    </main>
{{-- modal --}}
<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to <span id="title" class="text-gray-600 font-bold underline"></span> this product?</h3>
                <form action="/update/product/{{$product->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="status" name="status" value="">
                    <button type="submit" data-modal-hide="popup-modal"  class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="popup-modal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </form>  
            </div>
        </div>
    </div>
</div>

@include('partials.__footer')