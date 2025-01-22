<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Reviews</h2>
                
                <div class="mb-8 p-6 bg-gray-50 rounded-lg">
                    <h3 class="text-lg font-semibold mb-4">Add a Review</h3>
                    <form action="{{ url('/reviews') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Product</label>
                                <select name="product_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    @foreach(\App\Models\Product::all() as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Rating</label>
                                <select name="rating" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                    @foreach(range(1, 5) as $rating)
                                        <option value="{{ $rating }}">{{ $rating }} {{ Str::plural('star', $rating) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Comment</label>
                                <textarea name="comment" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                            </div>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                Submit Review
                            </button>
                        </div>
                    </form>
                </div>

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

                @foreach($reviews as $review)
                    <div class="mb-4 p-4 border rounded">
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
                @endforeach

                @if($reviews->isEmpty())
                    <p class="text-gray-500 text-center">No reviews yet.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout> 