@extends('layout/admin')
@section('title', 'OFF SCRIPT | Edit Product')

@section('content-admin')
  <div class="grid grid-cols-4 gap-5" id="carousel">
    @if ($products->count())
      @foreach ($products as $product)
        <div>
          <a href="{{ route('product.product-detail.show', $product['slug']) }}" class="block max-w-80 w-full shrink-0">
            <div class="border border-black overflow-hidden aspect-[4/5]">
              <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product['name'] }}" loading="lazy"
                class="w-full h-full object-cover hover:scale-[102%] duration-200">
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
          <div class="flex gap-2 items-center mt-2">

            <form action="{{ route('admin.product.destroy', $product->slug) }}" method="POST"
              onsubmit="return confirm('Delete this product?')" class="w-full">
              @csrf
              @method('DELETE')

              <button type="submit" class="bg-[#e72954] text-white p-2 w-full cursor-pointer">
                Delete
              </button>
            </form>

            <a href="{{ route('admin.product.edit', $product->slug) }}"
              class="bg-black text-white p-2 w-full text-center block">
              Edit
            </a>

          </div>
        </div>
      @endforeach
    @else
      <h1 class="text-center w-full text-3xl font-sans font-semibold">No Data Available</h1>
    @endif
  </div>
@endsection
