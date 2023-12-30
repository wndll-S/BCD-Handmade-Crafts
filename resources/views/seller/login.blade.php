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
            <a href="#" class="py-2 px-3 bg-yellow-400 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-800 rounded transition duration-300">Login</a>
            <a href="register" class="py-5 px-3">Signup</a>
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
        <section class="flex flex-col items-center justify-center px-6 py-8 ml-auto md:h-full lg:py-0">
            {{-- <h1 class="font-bold text-8xl">butang d pic</h1> --}}
            <x-feedback />
        </section>

        <section class="flex flex-col items-center justify-center px-6 py-8 ml-auto lg:mr-10 md:h-full lg:py-0 lg:mr-24">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 shadow-2xl">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                  <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                </div>
                                <div class="ml-3 text-sm">
                                  <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                        </div>
                        <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign In</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <a href="register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign Up</a>
                        </p>
                    </form>
                </div>
            </div>
        </section>
    </main>
    

@include('partials.__footer')