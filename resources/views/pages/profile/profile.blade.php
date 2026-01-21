@extends('layout/store')
@section('title', 'OFF SCRIPT | Profile')

@section('content')
  <main class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between my-10">
      <h1 class="text-3xl font-bold">Profile</h1>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();"
          class="flex items-center gap-3 py-3 px-3 opacity-60 hover:opacity-100">

          <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M8.25 9V5.25A2.25 2.25 0 0110.5 3h6A2.25 2.25 0 0118.75 5.25v13.5A2.25 2.25 0 0116.5 21h-6a2.25 2.25 0 01-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
          </svg>

          <span>Log out</span>
        </a>
      </form>
    </div>

    <div class="flex gap-5 mb-10">
      <div class="max-w-28 border">
        <img src="/auth/no_profile.webp" alt="no-profile" class="w-full aspect-square">
      </div>

      <div>
        <h1 class="text-3xl font-semibold">{{ $user->name }}</h1>
        <h1>{{ $user->email }}</h1>
      </div>
    </div>

    <div class="mb-5">
      <h2 class="text-xl font-bold mb-4">Order History</h2>
      @if ($orders->count())
        <ul class="space-y-3">
          @foreach ($orders as $order)
            <li class="p-4 border">
              <p><strong>Total:</strong> Rp {{ number_format($order->total_price) }}</p>
              <p><strong>Status:</strong> {{ $order->status }}</p>
              <p><strong>Payment Mathod:</strong> {{ $order->payment_method }}</p>
              <p><strong>Address:</strong> {{ $order->address }}</p>
              <p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
            </li>
          @endforeach
        </ul>
      @else
        <div class="w-full h-96 flex flex-col justify-center items-center">
          <div class="max-w-52 opacity-50">
            <img src="/icons/cart_empty.png" alt="no-cart">
          </div>

          <p class="mt-5 text-center">No Order</p>
        </div>
      @endif
    </div>
  </main>
@endsection
