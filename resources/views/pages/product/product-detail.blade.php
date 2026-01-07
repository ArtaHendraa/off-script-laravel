@extends('layout/store')
@section('title', 'OFF SCRIPT | Product | ' . $product['name'])

@section('content')
  <main class="max-w-7xl mx-auto">
    <header class="flex items-center gap-2 font-[RobotoMono] my-10 font-semibold justify-between">
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
      <div class="max-w-1/2 w-full sticky top-5 self-start">
        <img class="bg-cover aspect-square overflow-hidden contrast-90 border shrink-0"
          src={{ asset('storage/' . $product->image) }} alt="{{ $product['name'] }}">
      </div>

      <div class="max-w-1/2 w-full flex flex-col gap-5">
        <div class="flex flex-col gap-y-1">
          <h1 class="capitalize text-4xl font-semibold">
            {{ $product['name'] }}
          </h1>
          <h2 class="capitalize text-sm font-light opacity-50 font-[RobotoMono]">{{ $product->category->name }}</h2>
          <h2 class="capitalize text-sm font-light opacity-50 font-[RobotoMono]">
            Stock:
            @if ($product['stock'] == 0)
              <span class="bg-red-500 px-1">Sold Out</span>
            @else
              <span>{{ $product['stock'] }}</span>
            @endif
          </h2>
          <h2 class="font-[RobotoMono] text-lg">Rp.{{ number_format($product['price'], 0, ',', '.') }}</h2>
        </div>

        <hr class="my-5" />

        <div class="flex flex-col gap-3 max-w-xs">
          <div class="flex items-center gap-3">
            @foreach (json_decode($product['sizes'], true) ?? [] as $size)
              <button class="border py-2 px-4 cursor-pointer font-[RobotoMono]">{{ $size }}</button>
            @endforeach

          </div>

          <form action="" class="relative flex">
            <button class="p-2 border border-r-transparent cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
              </svg>
            </button>
            <input category="number" value="1" class="border py-2 w-full px-2 focus:outline-none font-[RobotoMono]">
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
          class="bg-[#e72954] text-white max-w-xs font-semibold py-3 px-6 font-sans cursor-pointer border border-black">
          ADD TO CART
        </button>

        <div class="prose quill-content leading-9 font-[RobotoMono]">
          <p> {!! $product->description !!}</p>
        </div>
      </div>
    </section>

    <x-carousel id="1" title="You Might Also Like"
      subtitle="Discover more products that match your style and interests." category="all" :products="$products"
      viewAllText="View All Items" viewAllUrl="/products/category/all" />
  </main>
@endsection
