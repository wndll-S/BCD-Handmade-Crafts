@include('partials.__header')
    <!-- navbar goes here -->
    <nav class="bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
    
            <div class="flex space-x-4">
            <!-- logo -->
            <div>
                <a href="#" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                  <svg   viewBox="0 0 1024 1024" class="icon w-6 h-6 mr-2"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M907.9 914.5H116.6c-7 0-12.6-5.7-12.6-12.6V234.1c0-7 5.7-12.6 12.6-12.6h791.3c7 0 12.6 5.7 12.6 12.6v667.7c0.1 7-5.6 12.7-12.6 12.7z m-778.6-25.3h766V246.7h-766v642.5z" fill="#10457E" /><path d="M212.2 272.9h600.1v468.7H212.2z" fill="#9ED5E4" /><path d="M62.2 179.6v125.2c0 91 67.5 165.5 150 165.5s150-74.5 150-165.5V179.6h-300z" fill="#FAFCFC" /><path d="M212.2 482.9c-89.7 0-162.7-79.9-162.7-178.2V179.6c0-7 5.7-12.6 12.6-12.6h300c7 0 12.6 5.7 12.6 12.6v125.2c0.2 98.2-72.8 178.1-162.5 178.1zM74.9 192.2v112.5c0 40.9 14.5 79.4 40.8 108.4 26 28.7 60.3 44.5 96.6 44.5s70.6-15.8 96.6-44.5c26.3-29 40.8-67.5 40.8-108.4V192.2H74.9z" fill="#154B8B" /><path d="M362.3 179.6v125.2c0 91 67.5 165.5 150 165.5s150-74.5 150-165.5V179.6h-300z" fill="#FAFCFC" /><path d="M512.3 482.9c-89.7 0-162.7-79.9-162.7-178.2V179.6c0-7 5.7-12.6 12.6-12.6h300c7 0 12.6 5.7 12.6 12.6v125.2c0.1 98.2-72.8 178.1-162.5 178.1zM374.9 192.2v112.5c0 40.9 14.5 79.4 40.8 108.4 26 28.7 60.3 44.5 96.6 44.5s70.6-15.8 96.6-44.5c26.3-29 40.8-67.5 40.8-108.4V192.2H374.9z" fill="#154B8B" /><path d="M662.3 179.6v125.2c0 91 67.5 165.5 150 165.5s150-74.5 150-165.5V179.6h-300z" fill="#FAFCFC" /><path d="M812.3 482.9c-89.7 0-162.7-79.9-162.7-178.2V179.6c0-7 5.7-12.6 12.6-12.6h300c7 0 12.6 5.7 12.6 12.6v125.2C975 403 902 482.9 812.3 482.9zM674.9 192.2v112.5c0 40.9 14.5 79.4 40.8 108.4 26 28.7 60.3 44.5 96.6 44.5s70.6-15.8 96.6-44.5c26.3-29 40.8-67.5 40.8-108.4V192.2H674.9z" fill="#154B8B" /><path d="M962.3 179.6H62.2L198.5 116h627.6z" fill="#98C9D6" /><path d="M962.3 192.2H62.2c-5.9 0-11.1-4.1-12.3-9.9-1.3-5.8 1.6-11.7 7-14.2l136.3-63.6c1.7-0.8 3.5-1.2 5.3-1.2h627.6c1.8 0 3.7 0.4 5.3 1.2l136.3 63.6c5.4 2.5 8.3 8.4 7 14.2-1.3 5.8-6.4 9.9-12.4 9.9z m-843.1-25.3h786.1l-82.1-38.3h-622l-82 38.3z" fill="#154B8B" /></svg>
                  <span class="font-bold">Local Handmade Crafts Online Store</span>
                </a>
            </div>
    
            <!-- primary nav -->
            <div class="h-max w-max md:flex items-center space-x-1 border-dashed border rounded-lg border-sky-500 bg-blue-200 my-auto">
               <p class=" px-3 py-2 text-gray-700 hover:text-gray-900 font-semibold">Seller</p>
           </div> 
            </div>
    
            <!-- secondary nav -->
            <div class="hidden md:flex items-center space-x-1">
            <a href="login" class="py-5 px-3">Login</a>
            <a href="#" class="py-2 px-3 shadow-md bg-yellow-400 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-800 rounded transition duration-300" >Signup</a>
            </div>
    
            <!-- mobile button goes here -->
            <div class="md:hidden flex items-center">
            <button class="mobile-menu-button shadow-md">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            </div>
    
        </div>
        </div>
    
        <!-- mobile menu -->
        <div class="mobile-menu hidden md:hidden ">
        <a href="" class="block py-2 px-4 text-sm hover:bg-gray-200 bg-yellow-400 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-800 rounded transition duration-300">Login</a>
        <a href="" class="block py-2 px-4 text-sm hover:bg-gray-200">Signup</a>
        </div>
    </nav>
  

    <main class="md:flex flex-grow lg:flex-row justify-between items-center sm:block mb-32">
      <section class="lg:w-3/5 flex items-center justify-center">
            <img src="{{asset('images/background_images/seller.jpg')}}" alt="BCD-Handmade-Craft Buyer Login" class="shadow-xl h-4/5 w-4/5 opacity-90 rounded-3xl"> 
        </section>

        <section class="lg:w-2/5 flex-col">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 shadow-2xl">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Register a <span class="font-bold text-blue-700 underline italic">SELLER</span> Account
                    </h1>
                    <form action="/store/seller" method="POST"  class="space-y-4 md:space-y-6">
                        @csrf 
                        <input type="text" name="account_status" value="Pending" hidden>
                        <div class="flex items-center lg:justify-between md:justify-between">
                           <div class="w-full">
                              <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                              <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Juan" required="">
                              
                           </div>
                           <div class="md:ml-5 ml-2 w-full">
                              <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                              <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Dela Cruz" required="" >
                           </div>
                           <div class="md:ml-5 ml-2 w-full">
                              <label for="name_ext" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name Extension</label>
                              <select name="name_ext" id="name_ext" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                 <option value="" selected disabled>Name extension:</option>
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
                              <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                              @error('email')
                                 <p class="text-red-500 text-xs">
                                       {{$message}}
                                 </p>
                              @enderror
                           </div>
                           <div class="md:ml-5 ml-2">
                              <label for="mobile_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobile Number</label>
                              <input type="number" name="mobile_number" id="mobile_number" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="09*********" required="" >
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
                        <div class="flex space-x-2">
                           <div>
                              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                              <input type="password" name="password" id="password" placeholder="Must be atleast 6 characters" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
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
                        </div>
                        
                        {{-- <div>
                           <label for="image_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selfie Picture</label>
                           <input type="file" name="image_url" id="image_url" value="{{auth('buyer')->user()->image_url}}">
                        </div> --}}
                        <input type="text" name="image_url" value="https://via.placeholder.com/640x480.png/00eecc?text=libero" hidden>
      
                        <button type="submit" class="w-full shadow-md text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign Up</button>
                  </form>  
                  <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                     Already have an account yet? <a href="/seller/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign In</a>
                 </p>
                </div>
            </div>
        </section>
    </main>
    
   
@include('partials.__footer')