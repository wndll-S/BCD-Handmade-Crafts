<div id="seller_tbl" >
    <div class="bg-white p-4">
        {{ $sellers->links() }}
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
                    Name
                </th>
                <th scope="col" class="px-6 py-3 ">
                    Address
                </th>
                <th scope="col" class="px-6 py-3 ">
                    Mobile Number
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
          @foreach ($sellers as $seller)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                <img class="w-10 h-10 rounded-full" src="{{ $seller->image_url }}" alt="{{ $seller->first_name }} {{ $seller->last_name }}">                   
                <div class="ps-3">
                    <div class="text-base font-semibold">{{$seller->first_name}} {{$seller->last_name}} {{$seller->name_ext}}</div>
                    <div class="font-normal text-gray-500">{{$seller->email}}</div>
                </div>  
                </th>
                <td class="px-6 py-4">
                   {{$seller->address}}
                </td>
                <td class="px-6 py-4">
                   {{$seller->mobile_number}}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                         
                        <div class="h-2.5 w-2.5 rounded-full 
                        @if($seller->account_status == 'Activated') 
                             bg-green-500 
                        @elseif($seller->account_status == 'Declined') 
                             bg-gray-900
                         @elseif($seller->account_status == 'Pending')
                             bg-amber-400
                         @elseif($seller->account_status == 'Suspended')
                             bg-red-500
                        @endif 
                        me-2"></div> {{$seller->account_status}}
                    </div>
                </td>
                <td class="px-6 py-4">
                     <a href="/accounts/{{$seller->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit status</a>
                </td>
            </tr>
            @endforeach
         </tbody>
     </table>
     <div class="grid place-items-end bg-white w-full">
        <div class="p-4">
            {{ $sellers->links() }}
        </div>
     </div>
     
</div>
