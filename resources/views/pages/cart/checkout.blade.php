@extends('layout/store')
@section('title', 'Checkout')

@section('content')
  <main class="max-w-3xl mx-auto my-10">

    <h1 class="text-3xl font-bold mb-5">Checkout</h1>

    @if (!session('cart') || count(session('cart')) === 0)
      <p>Keranjang kosong</p>
    @else
      <table class="w-full border mb-5">
        <thead>
          <tr class="border-b">
            <th class="p-2 text-left">Produk</th>
            <th class="p-2">Qty</th>
            <th class="p-2">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          @php $total = 0; @endphp
          @foreach (session('cart') as $id => $item)
            @php
              $subtotal = $item['price'] * $item['qty'];
              $total += $subtotal;
            @endphp
            <tr class="border-b">
              <td class="p-2">{{ $item['name'] }}</td>
              <td class="p-2 text-center">{{ $item['qty'] }}</td>
              <td class="p-2 text-right">Rp {{ number_format($subtotal) }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <p class="text-right font-bold text-xl mb-5">Total: Rp {{ number_format($total) }}</p>

      <form method="POST" action="{{ route('checkout.store') }}">
        @csrf
        <div class="mb-4">
          <label>Alamat Pengiriman</label>
          <textarea name="address" class="w-full border p-2" required></textarea>
        </div>

        <div class="mb-4">
          <label>Pembayaran (Dummy)</label>
          <select name="payment_method" class="w-full border p-2" required>
            <option value="cash">Cash</option>
            <option value="transfer">Transfer</option>
            <option value="qris">QRIS</option>
          </select>
        </div>

        <button type="submit" class="bg-black text-white px-6 py-2">
          Selesaikan & Cetak Struk
        </button>
      </form>

    @endif

  </main>
@endsection
