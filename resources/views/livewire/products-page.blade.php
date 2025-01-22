<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <section class="py-10 bg-gray-50 font-poppins rounded-lg">
    <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
      <div class="flex flex-wrap mb-24 -mx-3">
        <aside class="w-full pr-2 lg:w-1/4 lg:block">
          <div class="p-4 mb-5 bg-white border border-gray-200">
            <h2 class="text-2xl font-bold">Categories</h2>
            
            <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
            <ul>
    @foreach($categories as $category)
    <li class="mb-4" wire:key="{{ $category->id }}">
        <label for="{{ $category->slug }}" class="flex items-center">
            <input type="checkbox" wire:model.live="selected_categories" id="{{ $category->slug }}" class="w-4 h-4 mr-2">
            <span class="text-lg">
                {{ $category->name }}
            </span>
        </label>
    </li>
    @endforeach
</ul>

          </div>
          <div class="p-4 mb-5 bg-white border border-gray-200">
            <h2 class="text-2xl font-bold">Brand</h2>
            <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
            <ul>
              <li class="mb-4">
                <label for="apple" class="flex items-center">
                  <input type="checkbox" id="apple" class="w-4 h-4 mr-2">
                  <span class="text-lg">Sofasy</span>
                </label>
              </li>
          <input type="checkbox" id="nothing" class="w-4 h-4 mr-2">
      
          <div class="p-4 mb-5 bg-white border border-gray-200">
            <h2 class="text-2xl font-bold">Product Status</h2>
            <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
            <ul>
              <li class="mb-4">
                <label for="in-stock" class="flex items-center">
                  <input type="checkbox" id="in-stock"wire:model.live="in-stock" class="w-4 h-4 mr-2">
                  <span class="text-lg">In Stock</span>
                </label>
              </li>
              <li class="mb-4">
                <label for="on-sale" class="flex items-center">
                  <input type="checkbox" id="on-sale" wire:model.live="on-sale" class="w-4 h-4 mr-2">
                  <span class="text-lg">On Sale</span>
                </label>
              </li>
            </ul>
          </div>
          <div class="p-4 mb-5 bg-white border border-gray-200">
    <h2 class="text-2xl font-bold">Price</h2>
    <div class="w-16 pb-2 mb-6 border-b border-rose-600"></div>
    
    <div>
    <!-- Display the current price range dynamically -->
    <div class="font-semibold">
        {{ Number::currency($price_range, 'INR') }}
    </div>

    <!-- Input range for adjusting the price -->
    <input 
        type="range" 
        wire:model.live="price_range" 
        class="w-full h-1 mb-4 bg-blue-100 rounded appearance-none cursor-pointer" 
        max="500000" 
        value="300000" 
        step="1000"
    >

    <!-- Min and max price labels -->
    <div class="flex justify-between">
        <span class="inline-block text-lg font-bold text-blue-400">
            {{ Number::currency(1000, 'INR') }}
        </span>
        <span class="inline-block text-lg font-bold text-blue-400">
            {{ Number::currency(500000, 'INR') }}
        </span>
    </div>
</div>


        </aside>
        <main class="w-full px-3 lg:w-3/4">
          <div class="px-3 mb-4">
            <div class="items-center justify-between hidden px-3 py-2 bg-gray-100 md:flex">
              <div class="flex items-center justify-between">
                <select name="sort" id="sort" class="block w-40 text-base bg-gray-100 cursor-pointer">
                  <option value="latest">Sort by latest</option>
                  <option value="price">Sort by Price</option>
                </select>
              </div>
            </div>
          </div>
          <div>
  <section class="py-16">
    <div class="container mx-auto px-4">
      <div class="flex flex-col">
        <div class="mb-8">
          <h2 class="text-3xl font-semibold">Furniture Items</h2>
          <p class="text-gray-600">Explore our range of modern and stylish furniture.</p>
        </div>
        <main>
          <div class="flex flex-wrap -mx-3">

          @foreach($products as $product)
             <!-- Product Card 1 -->
             <article class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3">
              <div class="border border-gray-300">
                <div class="relative bg-gray-200">
                  <a href="/products/{{$product ->slug}}" class="">
                    <img src="{{url('storage',$product->images[0])}}" alt="Modern Bedroom Storage" class="object-cover w-full h-56 mx-auto" loading="lazy">
                  </a>
                </div>
                <div class="p-3">
                  <div class="flex items-center justify-between gap-2 mb-2">
                    <h3 class="text-xl font-medium">{{$product->name}}</h3>
                  </div>
                  <p class="text-lg">
                    <span class="text-green-600">{{Number::currency($product->price,'INR')}}</span>
                  </p>
                </div>
                <div class="flex justify-center p-4 border-t border-gray-300">
                                      <a wire:click.prevent="addToCart({{ $product->id }})" href="#" class="
                      text-gray-500
                      flex items-center space-x-2
                     
                      hover:text-red-500
                     ">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
                          class="w-4 h-4 bi bi-cart3" viewBox="0 0 16 16">
                              <path d="M0 1.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1.5 9a.5.5 0 0 1-.465.401H4.415l-.972-3.597L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.367 5.144L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                          </svg>
                          <span>Add to Cart</span>            
                           <span wire:loading>Adding</span>
                      </a>


                </div>
              </div>
            </article>

        

          @endforeach
          </div>
          <div class="flex justify-end mt-6">
            {{$products->links()}}
            </div>   
        </main>
      </div>
    </div>
  </section>
</div>
