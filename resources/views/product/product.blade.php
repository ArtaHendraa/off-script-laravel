@extends('layout')
@section('title', 'OFF SCRIPT | Home')

@section('content')
  <main>
    {{-- <section class="relative border-b border-black">
      <img src="/hero/website_hero.webp" alt="hero-img" class="h-[35rem] w-full object-cover" loading="lazy">
      <span class="w-full bg-black h-[35rem] absolute top-0 opacity-50"></span>
      <div class="absolute bottom-20 max-w-7xl w-full inset-x-1/2 -translate-x-1/2">
        <h1 class="text-white font-[Inter] text-5xl font-semibold mb-5">Yes. We Make Clothing.</h1>
        <button class="bg-[#e72954] text-white font-semibold py-3 px-6 font-[Inter] cursor-pointer border border-black">
          Shop ALL
        </button>
      </div>
    </section> --}}

    <section class="max-w-7xl mx-auto mb-10">
      <header class="">
        <div class="flex items-center gap-2 font-[Roboto_Mono] my-10 font-semibold justify-between">
          <h2>
            <a href="/">Home</a>
            <span>/</span>
            <a href="/products">Products</a>
            <span>/</span>
            <a href="/products/category">Category</a>
            <span>/</span>
            <a href="/products/category/{{ $type_slug ? $type_slug : 'All' }}"
              class="capitalize">{{ $type_slug ? str_replace('-', ' ', $type_slug) : 'All Items' }}</a>
          </h2>
          <h2>ᕦ(ò_ó)ᕤ</h2>
        </div>

        <h1 class="mb-10">
          <span class="block text-2xl font-[Inter] font-semibold">{{ $type ? $type : 'ALL ITEMS ᕦ(ò_ó)ᕤ' }}</span>
          @if ($type == 'Shirt')
            <span class="block text-md font-[Roboto_Mono] font-semibold">
              Relaxed and Oversized for Everyday Comfort
            </span>
          @elseif($type == 'Hoodie / Sweater')
            <span class="block text-md font-[Roboto_Mono] font-semibold">
              Comfy and Embroidered with over 12,000 Threads
            </span>
          @elseif($type == 'Accessories & Others')
            <span class="block text-md font-[Roboto_Mono] font-semibold">
              Beanies, Plushy, Bags, and Others
            </span>
          @else
            <span class="block text-md font-[Roboto_Mono] font-semibold">
              Check out everything we&rsquo;ve got in store!
            </span>
          @endif
        </h1>
      </header>

      <div class="grid grid-cols-4 gap-5" id="carousel">
        @if (count($products) > 0)
          @foreach ($products as $product)
            <a href="{{ route('product.product-detail.show', $product['slug']) }}" class="block max-w-80 w-full shrink-0">
              <div class="relative border border-black overflow-hidden aspect-[4/5]">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" loading="lazy"
                  class="w-full h-full object-cover">

                <button
                  class="absolute bottom-2 right-2 cursor-pointer bg-white shadow-xl p-1 border hover:scale-105 duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="#000" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                  </svg>
                </button>
              </div>

              <h1 class="capitalize font-semibold text-xl mt-2 text-nowrap overflow-hidden text-ellipsis font-[Inter]">
                {{ $product['name'] }}
              </h1>

              <div class="flex items-center justify-between mt-1">
                <h2 class="text-md font-light font-[Roboto_Mono]">Rp.{{ number_format($product['price'], 0, ',', '.') }}
                </h2>
                <h2 class="capitalize text-sm font-light opacity-50 font-[Roboto_Mono]">{{ $product['type'] }}</h2>
              </div>
            </a>
          @endforeach
        @else
          <h1 class="text-center w-full text-3xl font-[Inter] font-semibold">No Data Available</h1>
        @endif
      </div>
    </section>
  </main>
@endsection
