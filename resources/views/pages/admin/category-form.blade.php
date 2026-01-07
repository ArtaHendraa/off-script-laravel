@extends('layout/admin')
@section('title', 'OFF SCRIPT | Add Product')

@section('content-admin')
  <form action="" method="POST">
    @csrf

    <div class="flex flex-col gap-y-3 mb-5 w-full">
      <label htmlFor="">
        Name
      </label>
      <input id="name" required type="text" name="name" placeholder="Enter product name"
        value="{{ old('name', $category->name ?? '') }}" class="border w-full p-4 focus:outline-none">
    </div>

    <div class="flex flex-col gap-y-3 mb-5 w-full">
      <label htmlFor="">
        Slug
      </label>

      <div class="relative">
        <input id="slug" required type="text" name="slug" placeholder="Enter slug"
          value="{{ old('name', $category->slug ?? '') }}" class="border w-full p-4 focus:outline-none"
          oninput="this.value = this.value.toLowerCase()">
        <button class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer" onclick="generateSlug()" type="button">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
          </svg>
        </button>
      </div>
    </div>

    <button type="submit" class="bg-black text-white p-4 w-full cursor-pointer">
      {{ isset($category) ? 'Update Product' : 'Add Product' }}
    </button>

  </form>

  <script>
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
