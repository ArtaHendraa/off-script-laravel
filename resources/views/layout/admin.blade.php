<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <div class="flex h-screen overflow-hidden">
    <aside class="w-72 bg-black text-white">
      <div class="sticky top-0 h-screen">
        <div class="flex flex-col h-full p-5 overflow-y-auto">
          <header class="flex items-center gap-2">
            <a href="/" class="max-w-36">
              <img src="/logo/x_logo.svg" class="w-full" />
            </a>
          </header>

          <div class="flex-1">
            <h2 class="text-sm font-semibold text-gray-500 uppercase mb-4">
              Main Menu
            </h2>

            @php
              $activeClass = 'bg-white text-black';
              $normalClass = 'text-white hover:bg-white hover:text-black transition-colors';
            @endphp

            <nav class="flex flex-col gap-3">
              <a href="/admin"
                class="py-2 px-3 flex items-center gap-2 {{ request()->is('admin') ? $activeClass : $normalClass }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <span>Dashboard</span>
              </a>

              <a href="/admin/product"
                class="py-2 px-3 flex items-center gap-2 {{ request()->is('admin/product*') ? $activeClass : $normalClass }}">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                </svg>

                <span>Products</span>
              </a>

              <a href="/admin/category"
                class="py-2 px-3 flex items-center gap-2 {{ request()->is('admin/category*') ? $activeClass : $normalClass }}">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
                </svg>

                <span>Categories</span>
              </a>
            </nav>
          </div>

          <div class="pt-6">
            <a href="/" class="flex items-center gap-3 py-3 px-3 opacity-60 hover:opacity-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M8.25 9V5.25A2.25 2.25 0 0110.5 3h6A2.25 2.25 0 0118.75 5.25v13.5A2.25 2.25 0 0116.5 21h-6a2.25 2.25 0 01-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
              </svg>
              <span>Log out</span>
            </a>
          </div>

        </div>

      </div>
    </aside>

    {{-- konten sidbar --}}
    <main class="flex-1 overflow-y-auto">
      <section class="p-5">
        @yield('content-admin')
      </section>
    </main>

  </div>

</body>

</html>
