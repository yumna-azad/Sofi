<x-mail::message>
# Order Placed

Thank you for your order!

Order ID: {{ $order->id }}
Total Amount: {{ $order->grand_total }}

<x-mail::button :url="route('my-orders.show', $order->id)">
View Order
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> 