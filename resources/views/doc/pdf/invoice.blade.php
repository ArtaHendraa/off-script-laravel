<h2>STRUK PEMBELIAN</h2>
<p>Order #{{ $order->id }}</p>
<p>Nama: {{ $order->user->name }}</p>
<p>Pembayaran: {{ strtoupper($order->payment_method) }}</p>
<hr>

@foreach ($order->items as $item)
  <p>{{ $item->product->name }} x {{ $item->qty }} = Rp {{ number_format($item->price * $item->qty) }}</p>
@endforeach

<hr>
<strong>Total: Rp {{ number_format($order->total_price) }}</strong>
