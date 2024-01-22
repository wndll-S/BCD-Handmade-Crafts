@include('partials.__header')
<x-seller_navbar />
<div class="flex flex-col lg:flex-row  mt-24 mx-10 mb-28">  
    <div class='lg:w-2/5'>
        <input type="image" src="" alt="">
        <form action="/store/product" method="POST"  class="space-y-4 md:space-y-6" enctype="multipart/form-data">
            @csrf 
            <input type="text" name="craftspeople_id " value="{{auth()->guard('seller')->id()}}" hidden>
            <input type="text" name="status" value="Pending" hidden>
                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                    <input type="text" name="name" id="name" data-input="name_preview" class="input bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ex. Sunflower Embroidery" required="" >
                </div>
                <div class="w-full">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea name="description" id="description" data-input="description_preview" class="input bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Describe your product . . ." required=""></textarea>
                </div>
                @error('name')
                <p class="text-red-500 text-xs">
                    {{$message}}
                </p>
                @enderror
                @error('description')
                <p class="text-red-500 text-xs">
                    {{$message}}
                </p>
                @enderror
            <div class="flex items-center lg:justify-between md:justify-between">
                <div class='w-full'>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="text" name="price" id="price" data-input="price_preview" class="input bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="₱" required="" >
                    @error('price')
                        <p class="text-red-500 text-xs">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                    <input type="number" name="quantity" id="quantity" data-input="quantity_preview" class="input bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required="" >
                    @error('quantity')
                        <p class="text-red-500 text-xs">
                            {{$message}}
                        </p>
                    @enderror
                </div>
            </div>
            <div class="w-full">
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                   <option value="" selected disabled>Choose a Category</option>
                   @foreach ($categories as $item)
                       <option value="{{$item->id}}">{{$item->title}}</option>
                   @endforeach
                </select>
            </div>
            <label for="image_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Picture</label>
            <input type="file" name="image_url" id="image_url" accept="image/*" required>
            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add</button>
        </form>
    </div>
    <hr class="mt-10 lg:hidden">
    <div class='lg:w-3/5 lg:ml-10 mt-10 lg:mt-0  rounded-lg solid bg-gray-200 p-5 '>
        <div class="text-center font-bold text-4xl p-5">
            <h2 class="text-gray-800">PREVIEW</h2>
            <div>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        </div>
        <div class="flex">
            <img id='image-preview' class='w-96 h-96 bg-blue-300 rounded-3xl'>
            <div class='ml-5 flex-col space-y-3'>
                <div id="name_preview" class="border-black border p-1 rounded">Your product name goes here</div>
                <div id="description_preview" class="border-black border p-1 rounded">Your product description goes here</div>
                <div id="category_preview" class="border-black border p-1 rounded">Your product category goes here</div>
                <div class="border-black border p-1 rounded">₱<span id="price_preview"> Your product price goes here</span></div>
                <div id="quantity_preview" class="border-black border p-1 rounded">Your product quantity goes here</div>
                <div id="seller_preview" class="border-black border p-1 rounded">Your name goes here</div>
            </div>
        </div>
        
    </div>
</div>

@include('partials.__footer')