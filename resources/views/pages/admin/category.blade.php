@extends('layout/admin')
@section('title', 'OFF SCRIPT | Edit Category')

@section('content-admin')
  <div class="bg-white flex justify-between items-center mb-5">
    <h1 class="text-2xl font-semibold">Categories</h1>
    <a href="/admin/category/add"
      class="bg-black text-white py-3 px-5 flex items-center gap-2 hover:scale-105 duration-200">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
      </svg>

      <span>Add Category</span>
    </a>
  </div>

  <div class="overflow-x-auto">
    <table class="w-full border border-black border-collapse">
      <thead>
        <tr class="">
          <th class="border border-black px-4 py-2 text-center">No</th>
          <th class="border border-black px-4 py-2 text-center">Name</th>
          <th class="border border-black px-4 py-2 text-center">Slug</th>
          <th class="border border-black px-4 py-2 text-center">Action</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($categories as $index => $category)
          <tr class="hover:bg-gray-100 transition">
            <td class="border border-black px-4 py-2 text-center">
              {{ $index + 1 }}
            </td>

            <td class="border border-black px-4 py-2">
              {{ $category->name }}
            </td>

            <td class="border border-black px-4 py-2">
              {{ $category->slug }}
            </td>

            <td class="border border-black px-4 py-2 text-center">
              <div class="flex gap-2 w-full">

                <a href="{{ route('admin.category.edit', $category->slug) }}"
                  class="w-full text-center px-3 py-2 text-sm bg-black text-white">
                  Edit
                </a>

                <form action="{{ route('admin.cetegory.destroy', $category->slug) }}" method="POST"
                  onsubmit="return confirm('Delete this category?')" class="w-full">
                  @csrf
                  @method('DELETE')

                  <button type="submit" class="w-full px-3 py-2 text-sm bg-[#e72954] text-white">
                    Delete
                  </button>
                </form>

              </div>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

  @endsection
