<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ empty($title) ? session('title') : $title }}</title>
    @vite('resources/css/app.css')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>
<body>
  <nav class="bg-gray-100 z-50 fixed top-0 right-0 left-0">
    <div class="mx-1 px-4">
        <div class="flex justify-between ">

            <div class="flex">
                <div >
                    <a href="#" class="flex items-center sm:mx-auto py-5 px-2 text-gray-700 hover:text-gray-900">
                    <svg class="h-6 w-6 mr-1 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                    <span class="font-bold">BCD Handmade Crafts</span>
                    </a>
                </div>

        </div>
    </div>
    
   
</nav>

@include('partials.__footer')