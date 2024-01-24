@include('partials.__header', [$title, $role])
    <!-- navbar goes here -->
    <nav class="bg-gray-100 ">
        <div class="flex justify-center items-center">
            <!-- logo -->
                <a href="#" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
                    <svg   viewBox="0 0 1024 1024" class="icon w-8 h-8 mr-2"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M907.9 914.5H116.6c-7 0-12.6-5.7-12.6-12.6V234.1c0-7 5.7-12.6 12.6-12.6h791.3c7 0 12.6 5.7 12.6 12.6v667.7c0.1 7-5.6 12.7-12.6 12.7z m-778.6-25.3h766V246.7h-766v642.5z" fill="#10457E" /><path d="M212.2 272.9h600.1v468.7H212.2z" fill="#9ED5E4" /><path d="M62.2 179.6v125.2c0 91 67.5 165.5 150 165.5s150-74.5 150-165.5V179.6h-300z" fill="#FAFCFC" /><path d="M212.2 482.9c-89.7 0-162.7-79.9-162.7-178.2V179.6c0-7 5.7-12.6 12.6-12.6h300c7 0 12.6 5.7 12.6 12.6v125.2c0.2 98.2-72.8 178.1-162.5 178.1zM74.9 192.2v112.5c0 40.9 14.5 79.4 40.8 108.4 26 28.7 60.3 44.5 96.6 44.5s70.6-15.8 96.6-44.5c26.3-29 40.8-67.5 40.8-108.4V192.2H74.9z" fill="#154B8B" /><path d="M362.3 179.6v125.2c0 91 67.5 165.5 150 165.5s150-74.5 150-165.5V179.6h-300z" fill="#FAFCFC" /><path d="M512.3 482.9c-89.7 0-162.7-79.9-162.7-178.2V179.6c0-7 5.7-12.6 12.6-12.6h300c7 0 12.6 5.7 12.6 12.6v125.2c0.1 98.2-72.8 178.1-162.5 178.1zM374.9 192.2v112.5c0 40.9 14.5 79.4 40.8 108.4 26 28.7 60.3 44.5 96.6 44.5s70.6-15.8 96.6-44.5c26.3-29 40.8-67.5 40.8-108.4V192.2H374.9z" fill="#154B8B" /><path d="M662.3 179.6v125.2c0 91 67.5 165.5 150 165.5s150-74.5 150-165.5V179.6h-300z" fill="#FAFCFC" /><path d="M812.3 482.9c-89.7 0-162.7-79.9-162.7-178.2V179.6c0-7 5.7-12.6 12.6-12.6h300c7 0 12.6 5.7 12.6 12.6v125.2C975 403 902 482.9 812.3 482.9zM674.9 192.2v112.5c0 40.9 14.5 79.4 40.8 108.4 26 28.7 60.3 44.5 96.6 44.5s70.6-15.8 96.6-44.5c26.3-29 40.8-67.5 40.8-108.4V192.2H674.9z" fill="#154B8B" /><path d="M962.3 179.6H62.2L198.5 116h627.6z" fill="#98C9D6" /><path d="M962.3 192.2H62.2c-5.9 0-11.1-4.1-12.3-9.9-1.3-5.8 1.6-11.7 7-14.2l136.3-63.6c1.7-0.8 3.5-1.2 5.3-1.2h627.6c1.8 0 3.7 0.4 5.3 1.2l136.3 63.6c5.4 2.5 8.3 8.4 7 14.2-1.3 5.8-6.4 9.9-12.4 9.9z m-843.1-25.3h786.1l-82.1-38.3h-622l-82 38.3z" fill="#154B8B" /></svg>
                    <span class="font-bold text-3xl">Local Handmade Crafts Online Store</span>
                </a>
            {{-- <x-messages /> --}}
        </div>
    </nav>
  

    <main class="lg:pt-10 items-center sm:block">

        <section class="flex flex-col items-center justify-center px-6 py-8 mx-auto  md:h-full lg:py-0 ">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 shadow-2xl">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="/login/admin" method="POST" autocomplete="off">
                        @csrf
                        @error('email')
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
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="" autocomplete="off">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" autocomplete="off">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                  <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" >
                                </div>
                                <div class="ml-3 text-sm">
                                  <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-gray-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign In</button>
                        
                    </form>
                </div>
            </div>
        </section>
    </main>
    {{-- popup --}}
    {{-- <div id="info-popup" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 md:p-8">
                <div class="mb-4 text-sm font-light text-gray-500 dark:text-gray-400">
                    <h3 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">Privacy info</h3>
                    <p>
                        The backup created with this export functionnality may contain some sensitive data. We suggest you to save this archive in a securised location.
                    </p>
                </div>
                <div class="justify-between items-center pt-0 space-y-4 sm:flex sm:space-y-0">
                    <a href="#" class="font-medium text-primary-600 dark:text-primary-500 hover:underline">Learn more about privacy</a>
                    <div class="items-center space-y-4 sm:space-x-4 sm:flex sm:space-y-0">
                        <button id="close-modal" type="button"  class="py-2 px-4 w-full text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 sm:w-auto hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                        <button id="confirm-button" type="button" class="py-2 px-4 w-full text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-auto hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
      </div> --}}
@include('partials.__footer')