<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="icon" href="{{ asset('logo/logo_icon.webp') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

  <section class="fixed top-0 z-50" id="loader-wrapper">
    <div class="w-screen h-screen bg-[#fdfdfd] flex justify-center items-center transition-opacity duration-500"
      id="content">
      <img src="/preload/preloaderapp.gif" alt="logo" class="w-full max-w-3xs">
    </div>
  </section>

  <nav class="py-5 border-b bg-black xl:px-0 px-4">
    <div class="max-w-7xl mx-auto class flex justify-between items-center">
      <button class="xl:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
          stroke="currentColor" class="size-6 text-white">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
        </svg>
      </button>

      <a href="/" class="w-full max-w-28 xl:max-w-36">
        <img src="/logo/x_logo.svg" alt="" class="w-full">
      </a>

      <div class="items-center gap-5 hidden xl:flex">
        <button onclick="alert('belum bisa')" class="cursor-pointer text-white font-mono flex items-center gap-1">
          <p>Indonesia (IDR Rp)</p>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="#FFF"
            class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
          </svg>
        </button>

        <button class="cursor-pointer" onclick="alert('belum bisa')">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFF"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
          </svg>
        </button>

        <a href="/login" class="cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFF"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
          </svg>
        </a>

        <a href="/cart" class="cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFF"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
          </svg>
        </a>
      </div>

      <a href="/cart" class="cursor-pointer xl:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFF"
          class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
        </svg>
      </a>
    </div>
  </nav>

  @yield('content')

  <footer class="bg-black overflow-hidden hidden md:block">
    <section class="w-full relative p-20">
      <div class="xl:mb-40 flex justify-between md:max-w-7xl mx-auto">
        <div class=" max-w-xs">
          <h1 class="text-xl md:text-3xl text-white font-bold">NOT JUST CLOTHING. IT`S A LIFESTYLE.</h1>
          <button
            class="bg-[#e72954] mt-5 text-white font-semibold py-3 px-6 font-sans cursor-pointer border border-black">
            Shop ALL
          </button>

          <p class="text-white mt-5 font-light">&copy;2026 OFF SCRIPT. All rights reserved.</p>
        </div>

        <div class="flex flex-col gap-y-3 text-white">
          <h2 class="text-2xl font-semibold">Contact</h2>
          <a href="" class="text-white/70 font-light">Instagram</a>
          <a href="" class="text-white/70 font-light">WhatsApp</a>
          <a href="" class="text-white/70 font-light">TikTok</a>
        </div>
      </div>

      <div class="hidden xl:block max-w-6xl w-full absolute -bottom-79 left-1/2 -translate-x-1/2 opacity-50">
        <img src="/logo/x_logo.svg" alt="" class="w-full">
      </div>
    </section>
  </footer>

  <footer class="bg-black md:hidden">
    <section class="px-6 py-14 text-center">
      <h1 class="text-2xl font-bold text-white leading-snug">
        NOT JUST CLOTHING.<br> IT`S A LIFESTYLE.
      </h1>

      <button class="mt-6 bg-[#e72954] px-7 py-3 text-sm font-semibold text-white">
        Shop ALL
      </button>

      <div class="mt-10 space-y-2">
        <h2 class="text-lg font-semibold text-white">Contact</h2>
        <a href="#" class="block text-sm text-white/70">Instagram</a>
        <a href="#" class="block text-sm text-white/70">WhatsApp</a>
        <a href="#" class="block text-sm text-white/70">TikTok</a>
      </div>

      <p class="mt-10 text-xs text-white/60">
        &copy;2026 OFF SCRIPT. All rights reserved.
      </p>
    </section>
  </footer>

  <script>
    window.addEventListener('load', () => {
      const loader = document.getElementById('content');
      const body = document.body;

      body.classList.add('overflow-hidden');

      setTimeout(() => {
        loader.classList.add('opacity-0');

        loader.addEventListener('transitionend', () => {
          loader.classList.add('hidden');
          body.classList.remove('overflow-hidden');
        }, {
          once: true
        });
      }, 500);
    });
  </script>
</body>

</html>
