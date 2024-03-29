<div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
@if (auth()->guard('buyer')->user())
    <div>Hello! <span class="text-sky-800">{{auth('buyer')->user()->first_name}}</span></div>
    <div class="font-medium truncate">{{auth('buyer')->user()->email}}</div>
@elseif(auth()->guard('admin')->user())
    <div>Hello! <span class="text-sky-800">{{auth('admin')->user()->username}}</span></div>
    <div class="font-medium truncate">{{auth('admin')->user()->email}}</div>
@endif
    
</div>
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
    <li>
        @if(auth()->guard('admin')->user())
            <a href="/admin/accounts" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Accounts</a>
        @else
            <a href="/account" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Account</a>
        @endif
    </li>
   
    </ul>
    <div class="py-2 w-full">
        <form action="/logout" method="post">
            @csrf
            <button href="/logout" class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
        </form>
    </div>