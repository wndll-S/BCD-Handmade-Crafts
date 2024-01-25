@include('partials.__header')
   {{-- navbar --}}
   <x-buyer_navbar />
<main>
   {{-- sidebar --}}
   <x-buyer_aside />
   
   <div class="p-4 sm:ml-64 mt-16">
      <div class="p-4 md:border-l-2  border-gray-200 dark:border-gray-700 ">
         <div class="flex flex-row  justify-between">
            <div>
               <h2 class="text-5xl font-bold mb-4 ml-2 flex place-content-center text-gray-800">Account Details</h2>
               <div class="mx-auto">
                  <img class="h-48 w-48 border-2 rounded-full" src="{{auth('buyer')->user()->image_url}}" alt="{{auth('buyer')->user()->first_name}} {{auth('buyer')->user()->last_name}}">                   
                  <p class="font-bold text-2xl">{{auth('buyer')->user()->first_name}} {{auth('buyer')->user()->last_name}} {{auth('buyer')->user()->name_ext}}</p>
                  <p class="font-bold">{{auth('buyer')->user()->mobile_number}}</p>
                  <p class="font-semibold text-gray-700">{{auth('buyer')->user()->email}}</p>
               </div>
            </div>
            <div>
               <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="flex text-center border-2 p-3 font-medium text-sm bg-blue-600 text-white hover:bg-blue-800 rounded-lg group">
                  <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4.5 3A1.5 1.5 0 003 4.5v11A1.5 1.5 0 004.5 17h11a1.5 1.5 0 001.5-1.5V12h-2v3H5V5h3V3H4.5zM17 4a1 1 0 00-1-1h-5a1 1 0 100 2h2.586l-5.293 5.293a.999.999 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4z" fill="#5C5F62"/></svg>
                  BE A SELLER
               </button>
            </div>
            
         </div>
         {{-- <div>
            <h2 class="font-bold text-xl">Saved Products</h2>
            <div class="flex flex-col mb-4" >
               @if(auth('buyer')->check())
                  @foreach($bookmarks as $bookmark)
                     <div> 
                           <h3>{{ $bookmark->product_id }}</h3>
                           <p>Category: {{ $bookmark->product_id }}</p>
                           <p>Craftspeople: {{ $bookmark->product_id }}</p>
                           <!-- Add other product details as needed -->
                     </div>
                  @endforeach
               @endif
            </div>
         </div> --}}
         @if ($errors->any())
            <div class="alert alert-danger">
               <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
               </ul>
            </div>
         @endif
      </div>
      
   </div>
</main>

{{-- modal --}}
<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
   <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 pt-5">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
            </button>
         <div class="p-4 md:p-5">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white mb-5">
                     Do you wish to continue to registration?
            </h1>
            <div class="mx-auto text-center">
               <button data-modal-target="registration-modal" data-modal-toggle="registration-modal" data-modal-hide="popup-modal"  class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                       Yes
               </button>
               <button data-modal-hide="popup-modal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No</button>
            </div>  
         </div>
      </div>
   </div>
</div>
{{-- registration modal --}}
<div id="registration-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center  md:inset-0 h-[calc(100%-1rem)] max-h-full">
   <div class="relative p-4 w-full max-w-md max-h-full">
       <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
           <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="registration-modal">
               <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
               </svg>
               <span class="sr-only">Close modal</span>
           </button>
           <div class="p-4 md:p-5">
               <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Register as a Seller</h3>

               <form action="/store/seller" method="POST"  class="space-y-4 md:space-y-6">
                  @csrf 
                  <input type="text" name="account_status" value="Pending" hidden>
                  <div class="flex items-center lg:justify-between md:justify-between">
                     <div class="w-full">
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Juan" required="" value={{auth('buyer')->user()->first_name}}>
                        
                     </div>
                     <div class="md:ml-5 ml-2 w-full">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Dela Cruz" required="" value={{auth('buyer')->user()->last_name}}>
                     </div>
                     <div class="md:ml-5 ml-2 w-full">
                        <label for="name_ext" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name Extension</label>
                        <select name="name_ext" id="name_ext" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                           <option value="value={{auth('buyer')->user()->name_ext}}" selected disabled>Name extension:</option>
                           <option value="Sr.">Sr.</option>
                           <option value="Jr.">Jr.</option>
                           <option value="III">III</option>
                           <option value="IV">IV</option>
                           <option value="V">V</option>
                        </select>
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
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="" value={{auth('buyer')->user()->email}}>
                        @error('email')
                           <p class="text-red-500 text-xs">
                                 {{$message}}
                           </p>
                        @enderror
                     </div>
                     <div class="md:ml-5 ml-2">
                        <label for="mobile_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile Number</label>
                        <input type="number" name="mobile_number" id="mobile_number" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="09*********" required="" value={{auth('buyer')->user()->mobile_number}}>
                        @error('mobile_number')
                           <p class="text-red-500 text-xs">
                                 {{$message}}
                           </p>
                        @enderror
                     </div>
                  </div>
                  <div>
                     <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                     <textarea name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Lot #, Block #, Subdivision/Purok, Barangay, City, Philippines" required=""></textarea>
                     @error('address')
                        <p class="text-red-500 text-xs">
                              {{$message}}
                        </p>
                     @enderror
                  </div>
                  <div>
                     <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                     <input type="password" name="password" id="password" placeholder="•••••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{auth('buyer')->user()->name_ext}}">
                     @error('password')
                        <p class="text-red-500 text-xs">
                              {{$message}}
                        </p>
                     @enderror
                  </div>
                  <div>
                     <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                     <input type="password" name="password_confirmation" id="password_confirmation" placeholder="•••••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                  </div>
                  {{-- <div>
                     <label for="image_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selfie Picture</label>
                     <input type="file" name="image_url" id="image_url" value="{{auth('buyer')->user()->image_url}}">
                  </div> --}}
                  <input type="text" name="image_url" value="hehe" hidden>

                  <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign Up</button>
            </form>  
           </div>
       </div>
   </div>
</div>

@include('partials.__footer')
