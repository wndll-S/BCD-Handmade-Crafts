<div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
    <div>Hello! {{auth('buyer')->user()->first_name}}</div>
    <div class="font-medium truncate">{{auth('buyer')->user()->email}}</div>
</div>
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
    <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Account</a>
    </li>
    <li>
        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bookmarks</a>
    </li>
    </ul>
    <div class="py-2">
    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
    </div>