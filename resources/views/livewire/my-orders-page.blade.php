<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <h1 class="text-4xl font-bold text-slate-500">My Orders</h1>
  <div class="flex flex-col bg-white p-5 rounded mt-4 shadow-lg">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="overflow-hidden">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead>
              <tr>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Date</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order Status</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Payment Status</th>
                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Order Amount</th>
                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
              <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800" wire:key="{{ $order->id }}">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $order->id }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $order->created_at->format('d-m-Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                  @php
                  $status = "";
                  switch($order->status) {
                    case 'new':
                      $status = '<span class="bg-blue-500 py-1 px-3 rounded text-white shadow">New</span>';
                      break;
                    case 'processing':
                      $status = '<span class="bg-yellow-500 py-1 px-3 rounded text-white shadow">Processing</span>';
                      break;
                    case 'shipping':
                      $status = '<span class="bg-lightgreen-500 py-1 px-3 rounded text-white shadow">Shipping</span>';
                      break;
                    case 'delivered':
                      $status = '<span class="bg-green-700 py-1 px-3 rounded text-white shadow">Delivered</span>';
                      break;
                    case 'completed':
                      $status = '<span class="bg-lightgreen-500 py-1 px-3 rounded text-white shadow">Completed</span>';
                      break;
                    case 'pending':
                      $status = '<span class="bg-orange-500 py-1 px-3 rounded text-white shadow">Pending</span>';
                      break;
                    case 'canceled':
                      $status = '<span class="bg-red-500 py-1 px-3 rounded text-white shadow">Cancelled</span>';
                      break;
                    default:
                      $status = '<span class="bg-gray-500 py-1 px-3 rounded text-white shadow">Unknown</span>';
                      break;
                  }
                  @endphp
                  {!! $status !!}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                  @if($order->payment_status == 'paid')
                    <span class="bg-green-600 py-1 px-3 rounded text-white shadow">Paid</span>
                  @elseif($order->payment_status == 'pending')
                    <span class="bg-blue-500 py-1 px-3 rounded text-white shadow">Pending</span>
                  @else
                    <span class="bg-red-500 py-1 px-3 rounded text-white shadow">Failed</span>
                  @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ number_format($order->grand_total, 2) }} INR</td>
                <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                  <a href="{{  $order->id }}" class="bg-slate-600 text-white py-2 px-4 rounded-md hover:bg-slate-500">View Details</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- Pagination Links -->
      <div class="mt-4">
        {{ $orders->links() }}
      </div>
    </div>
  </div>
</div>
