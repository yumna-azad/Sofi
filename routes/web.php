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

// Public routes
Route::get('/', HomePage::class);
Route::get('/categories', CategoriesPage::class);
Route::get('/products', ProductsPage::class);
Route::get('/cart', CartPage::class);
Route::get('/products/{slug}', ProductDetailPage::class);

// Guest middleware (only for unauthenticated users)
Route::middleware('guest')->group(function () {
    Route::get('/login', LoginPage::class);
    Route::get('/register', RegisterPage::class);
    Route::get('/forgot', ForgotPasswordPage::class);
    Route::get('/reset', ResetPasswordPage::class);
});

// Auth middleware (only for authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/logout', function () {
        auth()->logout();
        return redirect('/');
    });

    Route::get('/checkout', CheckoutPage::class);
    Route::get('/my-orders', MyOrdersPage::class);
    Route::get('/my-orders/{order}', MyOrderDetailPage::class);

    // Payment result routes, restricted to authenticated users
    Route::get('/success', SuccessPage::class);
    Route::get('/cancel', CancelPage::class);
});
