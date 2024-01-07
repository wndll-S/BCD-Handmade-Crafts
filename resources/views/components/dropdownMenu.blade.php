<div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
@if (auth('buyer'))
    <div>Hello! <span class="text-sky-800">{{auth('buyer')->user()->first_name}}</span></div>
    <div class="font-medium truncate">{{auth('buyer')->user()->email}}</div>
@elseif (auth('seller'))
    <div>Hello! <span class="text-sky-800">{{auth('seller')->user()->first_name}}</span></div>
    <div class="font-medium truncate">{{auth('seller')->user()->email}}</div>
@else
    <div>Hello! <span class="text-sky-800">{{auth('admin')->user()->username}}</span></div>
    <div class="font-medium truncate">{{auth('buyer')->user()->email}}</div>
@endif
    
</div>
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
    <li>
        <a href="/buyer/account" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Account</a>
    </li>
    <li>
        <a href="/buyer/bookmarks" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bookmarks</a>
    </li>
    <li>
        <a href="/buyer/bookmarks" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign up as a seller</a>
    </li>
    </ul>
    <div class="py-2 w-full">
        <form action="/logout" method="post">
            @csrf
            <button href="/logout" class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
        </form>
    </div>