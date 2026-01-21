@extends('layout/auth')
@section('title', 'OFF SCRIPT | Login')

@section('auth-content')
  <form method="POST" action="{{ route('auth.login.store') }}" class="flex flex-col max-w-lg w-full gap-y-5">
    @csrf

    <div class="flex flex-col gap-1">
      <label for="email" class="font-semibold">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email"
        class="border p-4 focus:outline-none
        @error('email') border-red-500 @enderror" required>
    </div>

    <div class="flex flex-col gap-1">
      <label for="password" class="font-semibold">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter Password"
        class="border p-4 focus:outline-none
        @error('password') border-red-500 @enderror" required>
    </div>

    <div class="flex items-center justify-between">
      <label class="flex items-center gap-2 cursor-pointer select-none">
        <input type="checkbox" name="remember" class="accent-black">
        <span class="text-sm text-black">Remember me</span>
      </label>

      <span class="text-sm text-black hover:underline cursor-pointer">
        Forgot password?
      </span>
    </div>

    <button type="submit" class="p-4 w-full border cursor-pointer bg-black text-white font-semibold text-lg">
      Login
    </button>

    <div class="flex items-center gap-3">
      <span class="h-[1px] w-full bg-black/50 block"></span>
      <span>Or</span>
      <span class="h-[1px] w-full bg-black/50 block"></span>
    </div>

    <button type="submit"
      class="p-4 w-full border cursor-pointer text-black bg-white hover:bg-neutral-100 transition-colors font-semibold text-lg flex items-center gap-2 justify-center">
      <img src="{{ asset(path: 'logo/google.svg') }}" alt="google-logo" class="size-6">
      <span>Sign In with Google</span>
    </button>

    <div class="mx-auto">
      <span>Don't have an account?</span>
      <a href="{{ route('register') }}" class="font-bold underline">Register</a>
    </div>
  </form>

  </section>
@endsection
