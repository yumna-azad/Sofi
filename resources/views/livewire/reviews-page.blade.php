<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Reviews</h2>
                
                @auth
                    <div class="mb-8 p-6 bg-gray-50 rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Add a Review</h3>
                        <form wire:submit.prevent="submitReview">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Product</label>
                                    <select wire:model="product_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        <option value="">Select a product</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Rating</label>
                                    <select wire:model="rating" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                        <option value="">Select rating</option>
                                        @foreach(range(1, 5) as $rating)
                                            <option value="{{ $rating }}">{{ $rating }} {{ Str::plural('star', $rating) }}</option>
                                        @endforeach
                                    </select>
                                    @error('rating') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Comment</label>
                                    <textarea wire:model="comment" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                                    @error('comment') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                    Submit Review
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="mb-8 p-6 bg-gray-50 rounded-lg">
                        <p class="text-center">
                            Please <a href="{{ route('login') }}" class="text-blue-500 hover:underline">login</a> 
                            to submit a review.
                        </p>
                    </div>
                @endauth

                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="space-y-4">
                    @forelse($reviews as $review)
                        <div class="p-4 border rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-bold">{{ $review['user']['name'] ?? 'Anonymous' }}</p>
                                    <p class="text-yellow-500">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review['rating'])
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </p>
                                </div>
                                <div class="text-gray-500">
                                    {{ \Carbon\Carbon::parse($review['created_at'])->diffForHumans() }}
                                </div>
                            </div>
                            <p class="mt-2">{{ $review['comment'] }}</p>
                            @if($review['product'])
                                <p class="text-sm text-gray-600 mt-2">
                                    Product: {{ $review['product']['name'] }}
                                </p>
                            @endif
                        </div>
                    @empty
                        <p class="text-center text-gray-500">No reviews yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div> 