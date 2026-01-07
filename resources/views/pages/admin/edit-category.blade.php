@extends('layout/admin')
@section('title', 'OFF SCRIPT | Edit Category')

@section('content-admin')

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
