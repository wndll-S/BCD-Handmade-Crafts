@if (session()->has('message'))
<div class="fixed bottom-0 right-0 z-50">
    <h1 class="text-3xl">{{session('message')}}</h1>
</div>
    
@endif