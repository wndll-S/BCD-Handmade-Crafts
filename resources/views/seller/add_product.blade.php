@include('partials.__header')
<x-seller_navbar />
<div class="flex-row lg:flex mt-24 mx-10">
    <div class='w-2/5'>
        <form action="/store/product" method="POST"  class="space-y-4 md:space-y-6">
            @csrf 
            <input type="text" name="status" value="Pending" hidden>
                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sunflower Embroidery" required="" >
                </div>
                <div class="w-full">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe your product . . ." required=""></textarea>
                </div>
                @error('first_name')
                <p class="text-red-500 text-xs">
                    {{$message}}
                </p>
                @enderror
                @error('last_name')
                <p class="text-red-500 text-xs">
                    {{$message}}
                </p>
                @enderror
            <div class="flex items-center lg:justify-between md:justify-between">
                <div class='w-full'>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="$" required="" >
                    @error('price')
                        <p class="text-red-500 text-xs">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="" >
                    @error('quantity')
                        <p class="text-red-500 text-xs">
                            {{$message}}
                        </p>
                    @enderror
                </div>
            </div>
            <label for="image_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Picture</label>
            <input type="file" name="image_url" id="image_url" value="">
            
            <input type="text" name="image_url" value="hehe" hidden>
    
            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add</button>
        </form>
    </div>
    <div class='w-3/5 ml-10 rounded-lg solid bg-gray-200 p-5 flex '>
        <div id='image-preview' class='w-96 h-96 lg:h-full bg-blue-300'>

        </div>
        <div class='ml-5 justify-between'>
            <h2>Product Name:</h2>
            <h2>Description:</h2>
            <h2>Category:</h2>
            <h2>Price:</h2>
            <h2>Quantity:</h2>
            <h2>Seller:</h2>
        </div>
    </div>
</div>

@include('partials.__footer')