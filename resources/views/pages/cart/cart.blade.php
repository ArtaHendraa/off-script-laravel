@extends('layout/store')
@section('title', 'OFF SCRIPT | My Cart')

@section('content')
  <main class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between my-10">
      <h1 class="text-3xl font-bold">My Cart</h1>
      <a href="/" class="flex items-center gap-1 hover:gap-3 duration-200">
        <span>Continue shopping</span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
        </svg>
      </a>
    </div>

    @php $total = 0; @endphp

    @forelse(session('cart', []) as $productId => $item)
      @php $total += $item['price'] * $item['qty']; @endphp

      <div class="flex mb-5 gap-5">
        <div class="w-full max-w-52 border overflow-hidden">
          <img src="{{ isset($item['image']) ? asset('storage/' . $item['image']) : asset('images/no-image.png') }}"
            alt="{{ $item['name'] }}">
        </div>

        <div class="flex flex-col gap-y-2">
          <h3 class="text-3xl font-semibold">{{ $item['name'] }}</h3>

          <p class="text-xs md:text-base font-light font-[RobotoMono]">
            Rp.{{ number_format($item['price'], 0, ',', '.') }}
          </p>

          <div class="flex border w-max items-center">
            <form method="POST" action="/cart/update/{{ $productId }}">
              @csrf
              <input type="hidden" name="action" value="decrease">
              <button type="submit" class="p-2 border-r cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                </svg>
              </button>
            </form>

            <span class="p-2 font-[RobotoMono] w-40 text-center">
              {{ $item['qty'] }}
            </span>

            <form method="POST" action="/cart/update/{{ $productId }}">
              @csrf
              <input type="hidden" name="action" value="increase">
              <button type="submit" class="p-2 border-l cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </button>
            </form>
          </div>

          <p class="font-semibold">
            Subtotal: Rp {{ number_format($item['price'] * $item['qty']) }}
          </p>

          <form method="POST" action="/cart/remove/{{ $productId }}">
            @csrf
            <button class="bg-[#e72954] text-white max-w-40 font-semibold py-2 w-full text-xs border border-black">
              Remove
            </button>
          </form>
        </div>
      </div>

    @empty
      <p class="text-gray-500">Keranjang kosong</p>
    @endforelse

    @if (session('cart'))
      <div class="mt-10 border-t pt-5 mb-10">
        <h2 class="text-xl font-bold">
          Total: Rp {{ number_format($total) }}
        </h2>

        <a href="/checkout" class="inline-block mt-4 bg-black text-white px-6 py-3">
          Checkout
        </a>
      </div>
    @endif

  </main>
@endsection
