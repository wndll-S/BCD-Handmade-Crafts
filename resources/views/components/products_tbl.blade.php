<div id="products_tbl" >
    <div class="bg-white p-4">
        {{ $data->links() }}
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 overflow-x-scroll">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3 ">
                    Product
                </th>
                <th scope="col" class="px-6 py-3 ">
                    Description
                </th>
                <th scope="col" class="px-6 py-3 ">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                <img class="w-10 h-10 rounded-full" src="{{ asset($item->image_url) }}" alt="{{ $item->name }}">                   
                <div class="ps-3">
                    <div class="text-base font-semibold">{{$item->name}}</div>
                    <div class="font-normal text-gray-500">Seller: {{$item->craftspeople->first_name}} {{$item->craftspeople->last_name}} {{$item->craftspeople->name_ext}}</div>
                </div>  
                </th>
                <td class="px-6 py-4">
                   {{$item->description}}
                </td>
                <td class="px-6 py-4">
                    {{$item->price}}
                </td>
                <td class="px-6 py-4">
                    {{$item->quantity}}
                </td>
                <td class="px-6 py-4">
                     {{$item->status}}
                </td>
                <td class="px-6 py-4">
                    @if ($item->status == 'Deleted')
                    <span class="text-xs text-gray-500 p-2 bg-white rounded-md shadow-lg">DELETED</span>
                    @else
                        <a href="/admin/handmade-crafts/{{$item->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                    @endif
                </td>
            </tr>
            @endforeach
         </tbody>
     </table>
     <div class="grid place-items-end bg-white w-full">
        <div class="p-4">
            {{ $data->links() }}
        </div>
     </div>
     
</div>
