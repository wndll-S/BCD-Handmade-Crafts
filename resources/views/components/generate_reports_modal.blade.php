@php
    $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
@endphp
{{-- modal --}}
<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
       <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 pt-5">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            <div class="p-4 md:p-5 space-y-4">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-center text-gray-900 md:text-2xl dark:text-white mb-5">
                        Generate Report
                </h1>
            <div class="flex-col ">
                    <form action="/admin/dashboard/reports" method="get">
                    <label for="from_date" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">From</label>
                    <input type="date" name="from_date" id="from_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <label for="to_date" class="block mb-2 text-md font-semibold mt-5 text-gray-900 dark:text-white">To</label>
                    <input type="date" name="to_date" id="to_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

                <div class=" border-t-2 pt-3">
                    <div class="mx-auto text-center">
                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Continue
                        </button>
                        
                    </form>
                        <button data-modal-hide="popup-modal" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
{{-- 
 <div class="flex-col ">
    <label for="from_month" class="block mb-2 text-md font-semibold text-gray-900 dark:text-white">From</label>
    <div class="flex space-x-4">
        <div class="grow">
            <label for="from_month" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Month</label>
            <select name="from_month" id="from_month" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                @foreach ($month as $key => $item)
                    <option value="{{ $key + 1 }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="from_day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Day</label>
            <select name="from_day" id="from_day" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                @for ($day = 1; $day <= 31; $day++)
                    <option value="{{ $day }}">{{ $day }}</option>
                @endfor
            </select>
        </div>
        <div>
            <label for="from_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
            <select name="from_year" id="from_year" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                @for ($year = 2024; $year >= 1900; $year--)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>
       
    </div>

    <input type="date" name="" id="">
    <label for="month" class="block mb-2 text-md font-semibold mt-5 text-gray-900 dark:text-white">To</label>
    <div class="flex space-x-4">
        <div class="grow">
            <label for="month" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Month</label>
            <select name="month" id="month" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                @foreach ($month as $key => $item)
                    <option value="{{ $key + 1 }}">{{ $item }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Day</label>
            <select name="day" id="day" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                @for ($day = 1; $day <= 31; $day++)
                    <option value="{{ $day }}">{{ $day }}</option>
                @endfor
            </select>
        </div>
        <div>
            <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
            <select name="year" id="year" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                @for ($year = 2024; $year >= 1900; $year--)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endfor
            </select>
        </div>
    </div>
</div> --}}