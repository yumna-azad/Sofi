<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Checkout</h1>

    <form wire:submit.prevent="placeOrder">
        <div class="grid grid-cols-12 gap-4">
            <div class="md:col-span-12 lg:col-span-8 col-span-12">
                <div class="bg-white rounded-xl shadow p-4 sm:p-7">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold underline text-gray-700 mb-2">Shipping Address</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-1" for="first_name">First Name</label>
                                <input class="w-full rounded-lg border py-2 px-3" id="first_name" type="text" wire:model="first_name">
                                @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-1" for="last_name">Last Name</label>
                                <input class="w-full rounded-lg border py-2 px-3" id="last_name" type="text" wire:model="last_name">
                                @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 mb-1" for="phone">Phone</label>
                            <input class="w-full rounded-lg border py-2 px-3" id="phone" type="text" wire:model="phone">
                            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 mb-1" for="address">Address</label>
                            <input class="w-full rounded-lg border py-2 px-3" id="address" type="text" wire:model="street_address">
                            @error('street_address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 mb-1" for="city">City</label>
                            <input class="w-full rounded-lg border py-2 px-3" id="city" type="text" wire:model="city">
                            @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block text-gray-700 mb-1" for="state">State</label>
                                <input class="w-full rounded-lg border py-2 px-3" id="state" type="text" wire:model="state">
                                @error('state') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-1" for="zip">ZIP Code</label>
                                <input class="w-full rounded-lg border py-2 px-3" id="zip" type="text" wire:model="zip_code">
                                @error('zip_code') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-lg font-semibold mb-4">Select Payment Method</div>
                    <ul class="grid w-full gap-6 md:grid-cols-2">
                        <li>
                            <input class="hidden peer" id="payment-cash" name="payment_method" required type="radio" value="cash_on_delivery" wire:model="payment_method" />
                            <label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100" for="payment-cash">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">Cash on Delivery</div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewBox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                </svg>
                            </label>
                        </li>
                        <li>
                            <input class="hidden peer" id="payment-stripe" name="payment_method" type="radio" value="stripe" wire:model="payment_method">
                            @error('payment_method') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            <label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100" for="payment-stripe">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">Stripe</div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none" viewBox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                </svg>
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="md:col-span-12 lg:col-span-4 col-span-12">
                <div class="bg-white rounded-xl shadow p-4 sm:p-7 mb-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Order Summary</h2>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-500">Subtotal</span>
                        <span class="font-semibold text-gray-700">${{ number_format($grand_total, 2) }}</span>
                    </div>
                    <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition"> 
                        <span wire:loading.remove>Place Order</span>
                        <span wire:loading>Processing..</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
