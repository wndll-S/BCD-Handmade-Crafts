<div id="transactions_tbl" >
    <div class="bg-white p-4">
        {{ $transactions->links() }}
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
                    Buyer
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Amount
                </th>
                <th scope="col" class="px-6 py-3">
                    Payment Method
                </th>
                <th scope="col" class="px-6 py-3">
                    Shipping Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Created At
                </th>
                <th scope="col" class="px-6 py-3">
                    Updated At
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($transactions as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                <img class="w-10 h-10 rounded-full" src="{{ $item->products->image_url }}" alt="{{ $item->products->name }} "> 
                <div class="ps-3">
                    <div class="text-base font-semibold">{{$item->products->name}}</div>
                    <div class="font-normal text-gray-500">{{$item->products->craftspeople->first_name}}</div>
                </div>  
                </th>
                <td class="px-6 py-4">
                   {{$item->buyers->first_name}} {{$item->buyers->last_name}}
                </td>
                <td class="px-6 py-4">
                   {{$item->total_quantity}}
                </td>
                <td class="px-6 py-4">
                   {{$item->total_amount}}
                </td>
                <td class="px-6 py-4">
                   {{$item->payment_method}}
                </td>
                <td class="px-6 py-4">
                   {{$item->shipping_address}}
                </td>
                <td class="px-6 py-4">
                   {{$item->status}}
                </td>
                <td class="px-6 py-4">
                   {{$item->created_at}}
                </td>
                <td class="px-6 py-4">
                   {{$item->updated_at}}
                </td>
            </tr>
            @endforeach
         </tbody>
     </table>
     <div class="grid place-items-end bg-white w-full">
        <div class="p-4">
            {{ $transactions->links() }}
        </div>
     </div>
     
</div>
