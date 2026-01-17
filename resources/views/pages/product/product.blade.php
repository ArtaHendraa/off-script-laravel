@extends('layout/store')
@section('title', 'OFF SCRIPT | Home')

@section('content')
  <main>
    <section class="max-w-7xl mx-auto mb-10">
      <header>
        <div class="hidden md:flex items-center gap-2 font-[RobotoMono] my-10 font-semibold justify-between">
          <h2>
            <a href="/">Home</a>
            <span>/</span>
            <a href="/products">Products</a>
            <span>/</span>
            <a href="/products/category">Category</a>
            <span>/</span>
            <a href="/products/category/{{ $category_slug ? $category_slug : 'All' }}"
              class="capitalize">{{ $category_slug ? str_replace('-', ' ', $category_slug) : 'All Items' }}</a>
          </h2>
          <h2>ᕦ(ò_ó)ᕤ</h2>
        </div>

        <h1 class="mb-10">
          <span class="block text-2xl font-sans font-semibold">{{ $category?->name ?? 'ALL ITEMS ᕦ(ò_ó)ᕤ' }}</span>
          @if ($category?->slug === 'shirts')
            <span class="block text-md font-[RobotoMono] font-semibold">
              Relaxed and Oversized for Everyday Comfort
            </span>
          @elseif ($category?->slug === 'hoodie-or-sweater')
            <span class="block text-md font-[RobotoMono] font-semibold">
              Comfy and Embroidered with over 12,000 Threads
            </span>
          @elseif ($category?->slug === 'accessories-and-others')
            <span class="block text-md font-[RobotoMono] font-semibold">
              Beanies, Plushy, Bags, and Others
            </span>
          @else
            <span class="block text-md font-[RobotoMono] font-semibold">
              Check out everything we&rsquo;ve got in store!
            </span>
          @endif
        </h1>
      </header>

      <div class="grid grid-cols-2 md:grid-cols-3 mx-4 xl:mx-0 xl:grid-cols-4 gap-5" id="carousel">
        @if ($products->count())
          @foreach ($products as $product)
            <a href="{{ route('product.product-detail.show', $product['slug']) }}" class="block max-w-80 w-full shrink-0">
              <div class="relative border border-black overflow-hidden aspect-[4/5]">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product['name'] }}" loading="lazy"
                  class="w-full h-full object-cover hover:scale-[102%] duration-200">

                <button
                  class="absolute bottom-2 right-2 cursor-pointer bg-white shadow-xl p-1 border hover:scale-105 duration-150">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="#000" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                  </svg>
                </button>
              </div>

              <h1 class="capitalize font-semibold text-xl mt-2 text-nowrap overflow-hidden text-ellipsis font-sans">
                {{ $product['name'] }}
              </h1>

              <div class="flex items-center justify-between mt-1">
                <h2 class="text-md font-light font-[RobotoMono]">Rp.{{ number_format($product['price'], 0, ',', '.') }}
                </h2>
                <h2 class="capitalize text-sm font-light opacity-50 font-[RobotoMono]">{{ $product->category->name }}</h2>
              </div>
            </a>
          @endforeach
        @else
          <h1 class="text-center w-full text-3xl font-sans font-semibold">No Data Available</h1>
        @endif
      </div>
    </section>
  </main>
@endsection
