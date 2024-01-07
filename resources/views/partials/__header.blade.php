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
<body class="flex flex-col min-h-screen bg-gray-50 dark:bg-gray-900">