<div>
    <h3>Reviews</h3>

    @foreach($reviews as $review)
        <div>
            <p><strong>{{ $review->user->name }}:</strong> {{ $review->rating }} stars</p>
            <p>{{ $review->comment }}</p>
        </div>
    @endforeach

    <h4>Write a Review</h4>

    <form wire:submit.prevent="submitReview">
        <div>
            <label for="rating">Rating:</label>
            <input type="number" wire:model="rating" min="1" max="5" required>
        </div>

        <div>
            <label for="comment">Comment:</label>
            <textarea wire:model="comment"></textarea>
        </div>

        <button type="submit">Submit Review</button>
    </form>

    @if(session()->has('success'))
        <div>{{ session('success') }}</div>
    @endif
</div>
