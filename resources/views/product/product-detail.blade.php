@extends('layout')
@section('title', 'OFF SCRIPT | Product | ' . $product['name'])

@section('content')
  <main class="max-w-7xl mx-auto">
    <header class="flex items-center gap-2 font-[Roboto_Mono] my-10 font-semibold justify-between">
      <h2>
        <a href="/">Home</a>
        <span>/</span>
        <a href="/products">Products</a>
        <span>/</span>
        <a href="{{ $product['slug'] }}">{{ $product['name'] }}</a>
      </h2>

      <h2>ᕦ(ò_ó)ᕤ</h2>
    </header>

    <section class="flex gap-10">
      <div class="max-w-1/2 w-full">
        <img class="bg-cover aspect-square overflow-hidden contrast-90 border shrink-0" src={{ $product['image'] }}
          alt="{{ $product['name'] }}">
      </div>

      <div class="max-w-1/2 w-full flex flex-col gap-5">
        <div class="flex flex-col gap-y-1">
          <h1 class="capitalize text-4xl font-semibold">
            {{ $product['name'] }}
          </h1>
          <h2 class="capitalize text-sm font-light opacity-50 font-[Roboto_Mono]">{{ $product['type'] }}</h2>
          <h2 class="capitalize text-sm font-light opacity-50 font-[Roboto_Mono]">
            Stock:
            @if ($product['stock'] == 0)
              <span class="bg-red-500 px-1">Sold Out</span>
            @else
              <span>{{ $product['stock'] }}</span>
            @endif
          </h2>
          <h2 class="font-[Roboto_Mono] text-lg">Rp.{{ number_format($product['price'], 0, ',', '.') }}</h2>
        </div>

        <hr class="my-5" />

        <div class="flex flex-col gap-3 max-w-xs">
          <div class="flex items-center gap-3">
            @foreach ($product['sizes'] as $size)
              <button class="border py-2 px-4 cursor-pointer font-[Roboto_Mono]">{{ $size }}</button>
            @endforeach
          </div>

          <form action="" class="relative flex">
            <button class="p-2 border border-r-transparent cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
              </svg>
            </button>
            <input type="number" value="1" class="border py-2 w-full px-2 focus:outline-none font-[Roboto_Mono]">
            <button class="p-2 border border-l-transparent cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
            </button>
          </form>
        </div>

        <hr class="my-5" />

        <button
          class="bg-[#e72954] text-white max-w-xs font-semibold py-3 px-6 font-[Inter] cursor-pointer border border-black">
          ADD TO CART
        </button>

        <div class=" leading-9 font-[Roboto_Mono]">
          <p>{{ $product['description']['intro'] }}</p>
          <ul>
            @foreach ($product['description']['details'] as $detail)
              <li class="flex items-start gap-2">
                <span class="bg-black size-1.5 block mt-3.5 shrink-0"></span>
                <span>{{ $detail }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </section>
  </main>
@endsection
