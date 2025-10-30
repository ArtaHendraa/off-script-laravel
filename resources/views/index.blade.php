@extends('layout')
@section('title', 'OFF SCRIPT | Home')

@section('content')
  <main class="">
    <section class="relative border-b border-black">
      <img src="/hero/website_hero.webp" alt="hero-img" class="h-[35rem] w-full object-cover" loading="lazy">
      <span class="w-full bg-black h-[35rem] absolute top-0 opacity-50"></span>
      <div class="absolute bottom-20 max-w-7xl w-full inset-x-1/2 -translate-x-1/2">
        <h1 class="text-white font-[Inter] text-5xl font-semibold mb-5">Yes. We Make Clothing.</h1>
        <button class="bg-[#e72954] text-white font-semibold py-3 px-6 font-[Inter] cursor-pointer border border-black">
          Shop ALL
        </button>
      </div>
    </section>

    <section class="max-w-7xl mx-auto">
      <header class="flex justify-between items-start my-10">
        <h1>
          <span class="block text-2xl font-[Inter] font-semibold">ALL ITEMS ᕦ(ò_ó)ᕤ</span>
          <span class="block text-md font-[Roboto_Mono] font-semibold">Check out everything we&rsquo;ve got in
            store!</span>
        </h1>

        <a href="/" class="block text-sm font-[Roboto_Mono] font-semibold hover:underline cursor-pointer">View All
          Items</a>
      </header>

      <div class="flex items-center gap-5 overflow-x-hidden" id="carousel">
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

      <div class="flex items-center justify-between mt-5 mb-10">
        <button class="border p-2 cursor-pointer" id="prevBtn">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
          </svg>
        </button>

        <span class="font-[Roboto_Mono] text-sm">{{ count($products) }} ITEMS</span>

        <button class="border p-2 cursor-pointer" id="nextBtn">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
          </svg>
        </button>
      </div>
    </section>

    <section class="relative border-y border-black">
      <img src="/hero/best_seller_banner.webp" alt="hero-img" class=" w-full object-cover" loading="lazy">
      <span class="w-full bg-black h-full absolute top-0 opacity-50"></span>
      <div class="absolute bottom-20 max-w-7xl w-full inset-x-1/2 -translate-x-1/2">
        <h1 class="text-white font-[Inter] text-5xl font-semibold">Our Best Sellers</h1>
        <h2 class="text-white font-[Roboto_Mono] text-2xl font-semibold mb-5">Black Hoodie</h2>
        <a href="{{ route('product.product-detail.show', 'black-hoodie') }}"
          class="bg-white font-semibold py-3 px-6 font-[Roboto_Mono] cursor-pointer border border-black">
          Shop Now
        </a>
      </div>
    </section>

    <script>
      const carousel = document.getElementById("carousel");
      const nextBtn = document.getElementById("nextBtn");
      const prevBtn = document.getElementById("prevBtn");

      const destence = 550;
      nextBtn.addEventListener("click", () => {
        carousel.scrollBy({
          left: destence,
          behavior: "smooth"
        });
      });

      prevBtn.addEventListener("click", () => {
        carousel.scrollBy({
          left: -destence,
          behavior: "smooth"
        });
      });
    </script>
  </main>
@endsection
