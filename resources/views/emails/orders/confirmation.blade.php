<x-mail::message>
# Order Confirmation

Your order has been confirmed!

Order ID: {{ $order->id }}
Total Amount: {{ $order->grand_total }}

<x-mail::button :url="route('my-orders.show', $order->id)">
View Order Details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> 