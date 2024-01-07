@if (session()->has('message'))
    <h1 class="text-3xl">{{session('message')}}</h1>
@endif