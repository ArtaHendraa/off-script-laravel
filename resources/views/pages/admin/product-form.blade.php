@extends('layout/admin')
@section('title', isset($product) ? 'OFF SCRIPT | Edit Product' : 'OFF SCRIPT | Add Product')

@section('content-admin')
  <form action="{{ isset($product) ? route('admin.product.update', $product->slug) : route('admin.product.store') }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @if (isset($product))
      @method('PUT')
    @endif

    <div class="flex flex-col gap-y-3 mb-5">
      <label>
        Product Photo
      </label>

      @if (isset($product))
        <img src="{{ asset('storage/' . $product->image) }}" class="w-full max-w-50 border">
      @else
        <input required type="file" name="image" accept=".webp" class="border w-full p-4 text-black/50">
      @endif
    </div>

    <div class="flex items-center gap-5">
      <div class="flex flex-col gap-y-3 mb-5 w-full">
        <label>Name</label>
        <input id="name" required type="text" name="name" placeholder="Enter product name"
          class="border w-full p-4 focus:outline-none" value="{{ old('name', $product->name ?? '') }}">
      </div>

      <div class="flex flex-col gap-y-3 mb-5 w-full">
        <label>Slug</label>

        <div class="relative">
          <input id="slug" required type="text" name="slug" placeholder="Enter slug"
            class="border w-full p-4 focus:outline-none" value="{{ old('slug', $product->slug ?? '') }}">

          <button class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer" onclick="generateSlug()"
            type="button">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div class="flex items-center gap-5">
      <div class="flex flex-col gap-y-3 mb-5 w-full">
        <label htmlFor="">
          Price
        </label>
        <input required type="number" name="price" placeholder="Enter product name"
          class="border w-full p-4 focus:outline-none" value="{{ old('price', $product->price ?? '') }}">
      </div>

      <div class="flex flex-col gap-y-3 mb-5 w-full">
        <label htmlFor="">
          Stock
        </label>
        <input required type="number" name="stock" placeholder="Enter stock"
          class="border w-full p-4 focus:outline-none" value="{{ old('stock', $product->stock ?? '') }}">
      </div>
    </div>

    <div class="flex flex-col gap-y-3 mb-5 w-full">
      <label>
        Size
      </label>
      @php
        $sizes = ['S', 'M', 'L', 'XL', 'XXL', 'One-Size'];
      @endphp
      <div class="flex items-center gap-5">
        @php
          $selectedSizes = old('sizes', isset($product) ? json_decode($product->sizes, true) : []);
        @endphp
        @foreach ($sizes as $size)
          <label class="flex items-center gap-3 cursor-pointer select-none">
            <input type="checkbox" name="sizes[]" value="{{ $size }}" @checked(in_array($size, $selectedSizes))
              class="w-5 h-5 appearance-none border border-black rounded-none checked:bg-black relative cursor-pointer before:content-[''] before:absolute before:top-[3px] before:left-[7px] before:w-[5px] before:h-[10px] before:border-r-2 before:border-b-2 before:border-white before:rotate-45 before:opacity-0 checked:before:opacity-100">
            <span class="text-sm font-medium">{{ $size }}</span>
          </label>
        @endforeach
      </div>

    </div>

    <div class="flex flex-col gap-y-3 mb-5 w-full">
      <label>
        Category
      </label>

      <div class="relative">
        <select class="border w-full p-4 focus:outline-none appearance-none" name="category_id" required>
          <option value="" disabled {{ !isset($product) ? 'selected' : '' }}>Choose Category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
              {{ $category->name }}
            </option>
          @endforeach
        </select>

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor" class="size-5 absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none">
          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>
      </div>
    </div>

    <div class="mb-5">
      <label htmlFor="" class="mb-3 block">
        Description
      </label>
      <div id="editor"></div>
      <input required type="hidden" name="description" id="description">
    </div>

    <button type="submit" class="bg-black text-white p-4 w-full cursor-pointer">
      {{ isset($product) ? 'Update Product' : 'Add Product' }}
    </button>

  </form>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
          toolbar: [
            ['bold', 'italic', 'underline', 'strike'],
            [{
              list: 'bullet'
            }, {
              list: 'ordered'
            }]
          ]
        }
      });

      const existingDescription = @json(old('description', $product->description ?? ''));
      if (existingDescription) {
        quill.root.innerHTML = existingDescription;
      }

      document.querySelector('form').addEventListener('submit', () => {
        document.getElementById('description').value = quill.root.innerHTML;
      });
    });

    // ganerate slug
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    function slugify(text) {
      return text
        .toLowerCase()
        .trim()
        .replace(/&/g, ' and ')
        .replace(/\//g, ' or ')
        .replace(/\s+/g, '-')
        .replace(/[^a-z0-9-]/g, '')
        .replace(/-+/g, '-')
        .replace(/^-|-$/g, '');
    }

    nameInput.addEventListener('input', () => {
      if (!slugInput.dataset.manual) {
        slugInput.value = slugify(nameInput.value);
      }
    });

    function generateSlug() {
      slugInput.value = slugify(nameInput.value);
      delete slugInput.dataset.manual;
    }

    slugInput.addEventListener('input', () => {
      slugInput.dataset.manual = "true";
    });
  </script>
@endsection
