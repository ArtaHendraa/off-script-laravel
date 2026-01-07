@extends('layout/store')
@section('title', 'OFF SCRIPT | Home')

@section('content')
  <main class="">
    <section class="relative border-b border-black">
      <img src="/hero/website_hero.webp" alt="hero-img" class="h-[35rem] w-full object-cover" loading="lazy">
      <span class="w-full bg-black h-[35rem] absolute top-0 opacity-50"></span>
      <div class="absolute bottom-20 max-w-7xl w-full inset-x-1/2 -translate-x-1/2">
        <h1 class="text-white font-sans text-5xl font-semibold mb-5">Yes. We Make Clothing.</h1>
        <button class="bg-[#e72954] text-white font-semibold py-3 px-6 font-sans cursor-pointer border border-black">
          Shop ALL
        </button>
      </div>

    </section>

    <x-carousel id="1" title="ALL ITEMS ᕦ(ò_ó)ᕤ" subtitle="Check out everything we've got in store!"
      category="all" :products="$products" viewAllText="View All Items" viewAllUrl="/products/category/all" />

    <section class="relative border-y border-black">
      <img src="/hero/best_seller_banner.webp" alt="hero-img" class=" w-full object-cover" loading="lazy">
      <span class="w-full bg-black h-full absolute top-0 opacity-50"></span>
      <div class="absolute bottom-20 max-w-7xl w-full inset-x-1/2 -translate-x-1/2">
        <h1 class="text-white font-sans text-5xl font-semibold mb-2">Our Best Sellers</h1>
        <h2 class="text-white font-mono text-xl font-semibold mb-5">Black Hoodie</h2>
        <a href="{{ route('product.product-detail.show', 'black-hoodie') }}"
          class="bg-white font-semibold py-3 px-6 font-mono cursor-pointer border border-black">
          Shop Now
        </a>
      </div>
    </section>

    <x-carousel id="2" title="Shirts" subtitle="Relaxed and Oversized for Everyday Comfort" category="Shirts"
      :products="$shirts" viewAllText="View All Shirts" viewAllUrl="/products/category/shirts" />

    <x-carousel id="3" title="Hoodie / Sweater" subtitle="Comfy and Embroidered with over 12,000 Threads"
      category="Hoodie / Sweater" :products="$hoodieSweater" viewAllText="View All Hoodie / Sweater"
      viewAllUrl="/products/category/hoodie-or-sweater" />

    <section class="relative border-y border-black">
      <img src="/hero/aira.jpg" alt="hero-img" class=" w-full object-cover" loading="lazy">
      <span class="w-full bg-black h-full absolute top-0 opacity-50"></span>
      <div class="absolute bottom-20 max-w-7xl w-full inset-x-1/2 -translate-x-1/2">
        <h1 class="text-white font-sans text-5xl font-semibold mb-2">Buy Our Plushie!!</h1>
        <h2 class="text-white font-mono text-xl font-semibold mb-5">Aira Plushie + glasses</h2>
        <a href="{{ route('product.product-detail.show', 'aira-plushie-and-glasses') }}"
          class="bg-white font-semibold py-3 px-6 font-mono cursor-pointer border border-black">
          Shop Now
        </a>
      </div>
    </section>

    <x-carousel id="4" title="Accessories & Others" subtitle="Beanies, Plushy, Bags, and Others"
      category="Accessories & Others" :products="$accessories" viewAllText="View All Accessories & Others"
      viewAllUrl="/products/category/accessories-and-others" />

  </main>
@endsection
