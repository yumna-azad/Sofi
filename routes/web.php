<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\HomePage;
use App\Livewire\CategoriesPage;
use App\Livewire\ProductsPage;
use App\Livewire\CartPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\CheckoutPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\MyOrderDetailPage;
use App\Livewire\auth\LoginPage;
use App\Livewire\auth\RegisterPage;
use App\Livewire\SuccessPage;
use App\Livewire\CancelPage;
use App\Livewire\auth\ForgotPasswordPage;
use App\Livewire\auth\ResetPasswordPage;
use App\Http\Controllers\ReviewController;
use App\Livewire\Auth\LogoutPage;

// Public routes
Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductsPage::class);
Route::get('/cart', CartPage::class);
Route::get('/products/{slug}', ProductDetailPage::class);

// Guest middleware - only accessible when NOT logged in
Route::middleware('guest')->group(function () {
    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/register', RegisterPage::class)->name('register');
    Route::get('/forgot', ForgotPasswordPage::class)->name('password.forgot');
    Route::get('/reset/{token}', ResetPasswordPage::class)->name('password.reset');
});


// Auth middleware - only accessible when logged in
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/logout', LogoutPage::class)->name('logout');
    Route::get('/cart', CartPage::class)->name('cart');
    Route::get('/checkout', CheckoutPage::class)->name('checkout');
    Route::get('/my-orders', MyOrdersPage::class)->name('my-orders');
    Route::get('/my-orders/{order}', MyOrderDetailPage::class)->name('my-orders.show');
    Route::get('/cancel', CancelPage::class)->name('cancel');
    Route::get('/success', SuccessPage::class)->name('success');
    Route::get('/reviews', \App\Livewire\ReviewsPage::class)->name('reviews.index');
    
});



// Authenticated user dashboard
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Reviews API routes
Route::prefix('api')->group(function () {
    Route::get('/reviews', [ReviewController::class, 'index'])->name('api.reviews.index');
    Route::post('/reviews', [ReviewController::class, 'store'])
        ->middleware('auth:sanctum')
        ->name('api.reviews.store');
});
