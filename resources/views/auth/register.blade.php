@extends('layouts.app')

@section('content')
  <div class="flex mx-auto justify-center">
    <div class="mx-auto pt-8 pb-4 px-16 bg-blue-100 rounded-lg border border-gray-300">
      <div class="card-header font-bold text-lg mb-4">{{ __('Registration') }}</div>
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
            Username
          </label>
          <input class="border border-gray-400 p-2 w-full"
            type="text" name="username" id='username' value="{{ old('username') }}" required>
          @error('username')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
            E-Mail Address
          </label>
          <input class="border border-gray-400 p-2 w-full"
            type="text" name="email" id='email' value="{{ old('email') }}" required>
          @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
            password
          </label>
          <input class="border border-gray-400 p-2 w-full"
            type="password" name="password" id='password' required>
          @error('password')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation">
            Confirm Password
          </label>
          <input class="border border-gray-400 p-2 w-full"
            type="password" name="password_confirmation" id='password_confirmation' required>
          @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-2">
          <button type="submit" class="text-white bg-blue-400 px-4 py-2 rounded-lg mr-2 hover:bg-blue-500">
            {{ __('Register') }}
          </button>
          <a href="/login" class="text-sm text-gray-700">Or Login</a>
        </div>
      </form>
    </div>
  </div>
@endsection
