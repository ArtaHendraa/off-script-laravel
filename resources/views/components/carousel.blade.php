@props(['id', 'title', 'subtitle', 'category', 'products', 'viewAllText', 'viewAllUrl'])

<section class="md:max-w-7xl mx-auto">
  <header class="flex justify-between items-center md:items-start mx-4 xl:mx-0 mt-10 mb-5 md:my-10">
    <h1>
      <span class="block text-xl md:text-2xl font-sans font-semibold">{{ $title }}</span>
      <span
        class="block text-xs md:text-md xl:text-base text-black/70 font-[RobotoMono] font-semibold">{{ $subtitle }}</span>
    </h1>

    <a href="{{ $viewAllUrl }}"
      class="hidden md:block text-xs md:text-sm font-[RobotoMono] font-semibold hover:underline cursor-pointer">
      {{ $viewAllText }}
    </a>
  </header>

  <div id="carousel-{{ $id }}"
    class="flex items-center gap-0 xl:gap-5 mb-10 xl:mb-0 overflow-x-scroll [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none] pr-4 xl:pr-0">
    @if (count($products) > 0)
      @foreach ($products as $product)
        @if ($category === 'all' || $product->category->name === $category)
          <a href="{{ route('product.product-detail.show', $product['slug']) }}"
            class="block max-w-72 md:max-w-80 w-full shrink-0 pl-4 xl:pl-0">
            <div class="relative border border-black overflow-hidden aspect-[4/5]">
              @if ($product['stock'] > 0)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product['name'] }}" loading="lazy"
                  class="w-full h-full object-cover hover:scale-105 duration-200">
              @else
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product['name'] }}" loading="lazy"
                  class="w-full h-full object-cover grayscale-100 hover:scale-105 duration-200">
              @endif

              @if ($product['stock'] == 0)
                <h3
                  class="absolute top-4 right-[-40px] bg-[#e72954] text-white px-10 py-1 border-y border-black text-xs font-[RobotoMono] transform rotate-45 shadow-lg">
                  Sold Out
                </h3>
              @endif

              <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" @if ($product->stock <= 0) disabled @endif
                  class="absolute bottom-2 right-2 cursor-pointer bg-white shadow-lg p-1 border hover:scale-105 duration-150 disabled:cursor-not-allowed disabled:hover:scale-100">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="#000" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                  </svg>
                </button>
              </form>

            </div>

            <h1 class="capitalize font-semibold text-xl mt-2 text-nowrap overflow-hidden text-ellipsis font-sans">
              {{ $product['name'] }}
            </h1>

            <div class="flex items-center justify-between mt-1">
              <h2 class="text-xs md:text-base font-light font-[RobotoMono]">
                Rp.{{ number_format($product['price'], 0, ',', '.') }}
              </h2>
              <h2 class="capitalize text-sm font-light opacity-50 font-[RobotoMono]">{{ $product->category->name }}
              </h2>
            </div>
          </a>
        @endif
      @endforeach
    @else
      <h1 class="text-center w-full text-3xl font-sans font-semibold">No Data Available</h1>
    @endif
  </div>

  <div class="hidden xl:flex items-center justify-between mt-5 mb-10 mx-4 xl:mx-0">
    <button class="border p-2 cursor-pointer" id="prevBtn-{{ $id }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
      </svg>
    </button>

    <span class="font-[RobotoMono] text-sm">
      {{ $category === 'all' ? $products->count() : $products->where('category.name', $category)->count() }} ITEMS
    </span>

    <button class="border p-2 cursor-pointer" id="nextBtn-{{ $id }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
      </svg>
    </button>
  </div>
</section>

<script>
  (function() {
    const carousel = document.getElementById("carousel-{{ $id }}");
    const nextBtn = document.getElementById("nextBtn-{{ $id }}");
    const prevBtn = document.getElementById("prevBtn-{{ $id }}");
    const distance = 550;

    nextBtn.addEventListener("click", () => {
      carousel.scrollBy({
        left: distance,
        behavior: "smooth"
      });
    });

    prevBtn.addEventListener("click", () => {
      carousel.scrollBy({
        left: -distance,
        behavior: "smooth"
      });
    });
  })();
</script>
