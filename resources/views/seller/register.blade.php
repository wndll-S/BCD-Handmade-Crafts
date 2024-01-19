@include('partials.__header')
    <!-- navbar goes here -->
    <nav class="bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
    
            <div class="flex space-x-4">
            <!-- logo -->
            <div>
                <a href="#" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                <svg class="h-6 w-6 mr-1 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
                <span class="font-bold">BCD Handmade Crafts</span>
                </a>
            </div>
    
            <!-- primary nav -->
            {{-- <div class="hidden md:flex items-center space-x-1">
                <a href="#" class="py-5 px-3 text-gray-700 hover:text-gray-900">Features</a>
            </div> --}}
            </div>
    
            <!-- secondary nav -->
            <div class="hidden md:flex items-center space-x-1">
            <a href="login" class="py-5 px-3">Login</a>
            <a href="#" class="py-2 px-3 bg-yellow-400 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-800 rounded transition duration-300" >Signup</a>
            </div>
    
            <!-- mobile button goes here -->
            <div class="md:hidden flex items-center">
            <button class="mobile-menu-button">
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
  

    <main class="md:flex flex-grow lg:flex-row justify-between items-center sm:block">
        <section class="flex flex-col items-center justify-center px-6 py-8 ml-auto md:h-full lg:py-0 lg:mb-32">
            <h1 class="font-bold text-8xl">butang d pic</h1>
        </section>

        <section class=" flex flex-col items-center justify-center px-6 py-8 ml-auto md:h-full lg:py-0 lg:mr-24 mb-32">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 shadow-2xl">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Register as a <span class="font-bold text-blue-700 underline italic">SELLER</span>
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
                        {{-- <div>
                           <label for="image_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selfie Picture</label>
                           <input type="file" name="image_url" id="image_url" value="{{auth('buyer')->user()->image_url}}">
                        </div> --}}
                        <input type="text" name="image_url" value="https://via.placeholder.com/640x480.png/00eecc?text=libero" hidden>
      
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign Up</button>
                  </form>  
                </div>
            </div>
        </section>
    </main>

   
@include('partials.__footer')