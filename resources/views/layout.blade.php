<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
    rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <nav class="py-5 border-b bg-black">
    <div class="max-w-7xl mx-auto class flex justify-between">
      <a href="/" class="max-w-36">
        <img src="/logo/x_logo.svg" alt="" class="w-full">
      </a>

      <div class="flex items-center gap-5">
        <button onclick="alert('belum bisa')"
          class="cursor-pointer text-white font-[Roboto_Mono] flex items-center gap-1">
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

        <button class="cursor-pointer" onclick="alert('belum bisa')">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFF"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
          </svg>
        </button>

        <button class="cursor-pointer" onclick="alert('belum bisa')">

          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFF"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
          </svg>

        </button>
      </div>
    </div>
  </nav>

  <section class="fixed top-0 z-50" id="loader-wrapper">
    <div class="w-screen h-screen bg-[#fdfdfd] flex justify-center items-center transition-opacity duration-500"
      id="content">
      <img src="/preload/preloaderapp.gif" alt="logo" class="w-full max-w-3xs">
    </div>
  </section>

  @yield('content')

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
