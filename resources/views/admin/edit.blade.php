@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
@if(@isset($seller))
   <main class="lg:pt-10 items-center sm:block mt-16 my-32">
    <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto  md:h-full lg:py-0 ">
        <div class="bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-lg xl:p-0 dark:bg-gray-800 dark:border-gray-700 ">
            <!-- Modal content -->
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-2xl font-medium mx-auto text-gray-900 dark:text-white">
                        Account Approval Request
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    @if($seller->account_status == 'Declined')
                    <p class="text-xl leading-relaxed text-gray-500 dark:text-gray-400">
                        <span class="font-bold text-gray-900">{{$seller->first_name}} {{$seller->last_name}} {{$seller->name_ext}}'s</span>
                        account approval request has been declined and cannot be reversed.
                    </p>

                    @else
                    <img class="w-40 h-40 rounded-full mx-auto" src="{{$seller->image_url}}" alt="{{$seller->first_name}} {{$seller->last_name}}">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        ID: <span class="font-bold text-gray-900">{{$seller->id}} </span>
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Name: <span class="font-bold text-gray-900">{{$seller->first_name}} {{$seller->last_name}} {{$seller->name_ext}}</span>
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Address: <span class="font-bold text-gray-900">{{$seller->address}}</span>
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Mobile Number: <span class="font-bold text-gray-900">{{$seller->mobile_number}}</span>
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        Account Status: <span class="font-bold text-gray-900">{{$seller->account_status}}</span>
                    </p>
                </div>
                <!-- Modal footer -->
                    @if($seller->account_status == 'Activated' )
                        <div class="flex items-center p-4 md:p-5 w-full">
                            <button data-title="Suspend" data-action="Suspended" data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="mx-auto pop-up text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5  focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Suspend</button>
                        </div>
                    @elseif($seller->account_status == 'Pending' || $seller->account_status == 'Suspended')
                        <div class="flex items-center space-x-4 p-4 md:p-5 w-full">
                            <div class="mx-auto">
                                <button data-title="Activate" data-action="Activated" data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="pop-up text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Activate</button>

                                <button data-title="Decline" data-action="Declined" data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="pop-up ms-3 text-white bg-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5  focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                            </div>
                        </div>
                    @endif
                @endif
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 justify-between">
                    <a href="/admin/accounts" type="button" class=" text-center w-full text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</a>
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
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to <span id="title" class="text-gray-600 font-bold underline"></span> this user?</h3>
                <form action="/update/craftspeople/{{$seller->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="account_status" name="account_status" value="">
                    <button type="submit" data-modal-hide="popup-modal"  class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="popup-modal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </form>  
            </div>
        </div>
    </div>
</div>

{{-- category editor --}}
{{-- category editor --}}
{{-- category editor --}}

@elseif(@isset($category))
   <main class="lg:pt-10 items-center sm:block mt-16 my-32">
    <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto  md:h-full lg:py-0 ">
        <div class="bg-white rounded-lg shadow dark:border md:mt-0 w-full lg:max-w-lg xl:p-0 dark:bg-gray-800 dark:border-gray-700 ">
            <!-- Modal content -->
            <div class="p-6 bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-2xl font-bold mx-auto text-gray-800 dark:text-white">
                        Edit Category Details
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 md:full">
                    <form action="/update/category/{{$category->id}}" method="POST" class="space-y-5">
                        @csrf
                        @method('PUT')
                        <p><span class="font-bold">ID:</span> {{$category->id}}</p>
                        <div>
                            <label for="title" class="block mb-2 font-bold text-gray-900 dark:text-white">Category Title:</label>
                            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$category->title}}">
                        </div>
                        @error('title')
                            <div class="flex items-center p-2 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                <span class="font-xs">{{$message}}</span> 
                                </div>
                            </div>
                        @enderror
                        <div>
                        <div class="mt-4">
                            <label for="description" class="block mb-2  font-bold text-gray-900 dark:text-white">Category Description:</label>
                            <textarea name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> {{$category->description}}</textarea>
                        </div>
                        @error('description')
                            <div class="flex items-center p-2 mb-4 text-sm mt-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                <span class="font-xs">{{$message}}</span> 
                                </div>
                            </div>
                        @enderror
                </div>
                
                <!-- Modal footer -->
                
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 space-x-4">
                    <button type="submit" type="button" class=" text-center w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5  focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Save Changes</button>
                </form>
                    <a href="/admin/categories" type="button" class=" text-center w-full text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</a>
                </div>
            </div>
        </div>
    </section>
    </main>
@endif
@include('partials.__footer')