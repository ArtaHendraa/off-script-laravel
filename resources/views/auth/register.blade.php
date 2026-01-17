@extends('layout/auth')
@section('title', 'OFF SCRIPT | Login')

@section('auth-content')
  <!-- ERROR GLOBAL -->
  @if ($errors->any())
    <div class="mb-4 w-full max-w-lg border border-red-300 bg-red-50 p-4 text-red-700 text-sm">
      @foreach ($errors->all() as $error)
        <p class="text-center">{{ $error }}</p>
      @endforeach
    </div>
  @endif

  <form action="{{ route('auth.register.store') }}" method="POST" class="flex flex-col max-w-lg w-full gap-y-5">
    @csrf
    <label for="name" class="font-semibold">Username</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter Username"
      class="border p-4 focus:outline-none @error('name') border-red-500 @enderror" required>

    <label for="email" class="font-semibold">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email"
      class="border p-4 focus:outline-none @error('email') border-red-500 @enderror" required>

    <label for="password" class="font-semibold">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter Password"
      class="border p-4 focus:outline-none @error('password') border-red-500 @enderror" required>

    <label for="password_confirmation" class="font-semibold">Confirm Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password"
      class="border p-4 focus:outline-none @error('password') border-red-500 @enderror" required>

    <button type="submit" class="p-4 w-full border bg-black text-white font-semibold text-lg cursor-pointer">
      Register
    </button>

    <div class="flex items-center gap-3">
      <span class="h-[1px] w-full bg-black/50 block"></span>
      <span>Or</span>
      <span class="h-[1px] w-full bg-black/50 block"></span>
    </div>

    <button type="submit"
      class="p-4 w-full border cursor-pointer text-black bg-white hover:bg-neutral-100 transition-colors font-semibold text-lg flex items-center gap-2 justify-center">
      <img src="{{ asset(path: 'logo/google.svg') }}" alt="google-logo" class="size-6">
      <span>Google</span>
    </button>

    <div class="mx-auto">
      <span>Alredy have an account?</span>
      <a href="{{ route('login') }}" class="font-bold underline">Login</a>
    </div>
  </form>

@endsection
