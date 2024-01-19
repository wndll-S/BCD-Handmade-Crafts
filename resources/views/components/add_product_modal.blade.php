<div id="addProduct" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center  md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="addProduct">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5">
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Add a Product Form</h3>
 
                <form action="/store/product" method="POST"  class="space-y-4 md:space-y-6">
                   @csrf 
                   <input type="text" name="status" value="Pending" hidden>
                   <div class="flex items-center md:justify-between">
                      <div class="w-full">
                         <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                         <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Juan" required="" >
                      </div>
                      <div class="md:ml-5 ml-2 w-full">
                         <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                         <input type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Dela Cruz" required="" >
                      </div>
                   </div>
                   @error('first_name')
                      <p class="text-red-500 text-xs">
                         {{$message}}
                      </p>
                   @enderror
                   @error('last_name')
                      <p class="text-red-500 text-xs">
                         {{$message}}
                      </p>
                   @enderror
                   <div class="flex items-center lg:justify-between md:justify-between">
                      <div>
                         <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                         <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="" >
                         @error('price')
                            <p class="text-red-500 text-xs">
                                  {{$message}}
                            </p>
                         @enderror
                      </div>
                      <div class="md:ml-5 ml-2">
                         <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                         <input type="number" name="quantity" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="09*********" required="" >
                         @error('quantity')
                            <p class="text-red-500 text-xs">
                                  {{$message}}
                            </p>
                         @enderror
                      </div>
                   </div>
                      <label for="image_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selfie Picture</label>
                      <input type="file" name="image_url" id="image_url" value="">
                   
                   <input type="text" name="image_url" value="hehe" hidden>
 
                   <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign Up</button>
             </form>  
            </div>
        </div>
    </div>
 </div>