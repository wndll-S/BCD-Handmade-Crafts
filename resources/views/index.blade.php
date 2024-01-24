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
    <div class="flex w-screen px-4 place-items-center">
            <a href="/buyer/home" class="flex items-center sm:mx-auto py-5 px-2 text-gray-700 hover:text-gray-900">
              <svg   viewBox="0 0 1024 1024" class="icon w-6 h-6 mr-2"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M907.9 914.5H116.6c-7 0-12.6-5.7-12.6-12.6V234.1c0-7 5.7-12.6 12.6-12.6h791.3c7 0 12.6 5.7 12.6 12.6v667.7c0.1 7-5.6 12.7-12.6 12.7z m-778.6-25.3h766V246.7h-766v642.5z" fill="#10457E" /><path d="M212.2 272.9h600.1v468.7H212.2z" fill="#9ED5E4" /><path d="M62.2 179.6v125.2c0 91 67.5 165.5 150 165.5s150-74.5 150-165.5V179.6h-300z" fill="#FAFCFC" /><path d="M212.2 482.9c-89.7 0-162.7-79.9-162.7-178.2V179.6c0-7 5.7-12.6 12.6-12.6h300c7 0 12.6 5.7 12.6 12.6v125.2c0.2 98.2-72.8 178.1-162.5 178.1zM74.9 192.2v112.5c0 40.9 14.5 79.4 40.8 108.4 26 28.7 60.3 44.5 96.6 44.5s70.6-15.8 96.6-44.5c26.3-29 40.8-67.5 40.8-108.4V192.2H74.9z" fill="#154B8B" /><path d="M362.3 179.6v125.2c0 91 67.5 165.5 150 165.5s150-74.5 150-165.5V179.6h-300z" fill="#FAFCFC" /><path d="M512.3 482.9c-89.7 0-162.7-79.9-162.7-178.2V179.6c0-7 5.7-12.6 12.6-12.6h300c7 0 12.6 5.7 12.6 12.6v125.2c0.1 98.2-72.8 178.1-162.5 178.1zM374.9 192.2v112.5c0 40.9 14.5 79.4 40.8 108.4 26 28.7 60.3 44.5 96.6 44.5s70.6-15.8 96.6-44.5c26.3-29 40.8-67.5 40.8-108.4V192.2H374.9z" fill="#154B8B" /><path d="M662.3 179.6v125.2c0 91 67.5 165.5 150 165.5s150-74.5 150-165.5V179.6h-300z" fill="#FAFCFC" /><path d="M812.3 482.9c-89.7 0-162.7-79.9-162.7-178.2V179.6c0-7 5.7-12.6 12.6-12.6h300c7 0 12.6 5.7 12.6 12.6v125.2C975 403 902 482.9 812.3 482.9zM674.9 192.2v112.5c0 40.9 14.5 79.4 40.8 108.4 26 28.7 60.3 44.5 96.6 44.5s70.6-15.8 96.6-44.5c26.3-29 40.8-67.5 40.8-108.4V192.2H674.9z" fill="#154B8B" /><path d="M962.3 179.6H62.2L198.5 116h627.6z" fill="#98C9D6" /><path d="M962.3 192.2H62.2c-5.9 0-11.1-4.1-12.3-9.9-1.3-5.8 1.6-11.7 7-14.2l136.3-63.6c1.7-0.8 3.5-1.2 5.3-1.2h627.6c1.8 0 3.7 0.4 5.3 1.2l136.3 63.6c5.4 2.5 8.3 8.4 7 14.2-1.3 5.8-6.4 9.9-12.4 9.9z m-843.1-25.3h786.1l-82.1-38.3h-622l-82 38.3z" fill="#154B8B" /></svg>
              <span class="font-bold text-3xl">Local Handmade Crafts Online Store</span>
            </a>
    </div>
</nav>
<main class="flex flex-col lg:flex-row py-48">
  <section class="lg:w-2/5 flex-col text-center px-20">
    <h1 class="  font-extrabold text-2xl text-blue-800">LOCAL HANDMADE CRAFTS <br> ONLINE STORE</h1>
    <p class="text-gray-700 hover:text-gray-900 mt-3 text-justify indent-8">Dive into a world of unique, locally crafted treasures that tell stories of passion and artistry. From handwoven textiles to intricately designed jewelry, our curated collection brings the spirit of your community to your fingertips. Click "Get Started" below and explore the beauty of handmade crafts while supporting local artisans.</p>
    <a href="/login" type="button" class=" mt-10 bg-blue-600 hover:bg-blue-800 p-4 rounded-lg shadow-md border-red-200 text-white focus:outline-dashed">Explore Now!</a>
  </section>
  <section class="lg:w-3/5 flex items-center justify-center">
    <img src="{{asset('images/background_images/landing-page.jpg')}}" alt="BCD-Handmade-Craft Landing Page" class="shadow-xl">
  </section>
</main>

@include('partials.__footer')