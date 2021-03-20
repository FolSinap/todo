@extends('layouts.app')

@section('content')
  <div class="flex mx-auto justify-center">
    <div class="mx-auto pt-8 pb-4 px-16 bg-blue-100 rounded-lg border border-gray-300">
      <div class="card-header font-bold text-lg mb-4">{{ __('Login') }}</div>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
            Email
          </label>
          <input class="border border-gray-400 p-2 w-full"
             type="text" name="email" id='email' value="{{ old('email') }}">
          @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
            Password
          </label>
          <input class="border border-gray-400 p-2 w-full" type="password" name="password" id='password' value="{{ old('password') }}">
          @error('password')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <div>
            <input class="mr-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="text-xs text-gray-700 font-bold uppercase" for="remember">
              {{ __('Remember Me') }}
            </label>
          </div>
        </div>

        <div class="mb-2">
          <button type="submit" class="text-white bg-blue-400 px-4 py-2 rounded-lg mr-2 hover:bg-blue-500">
            {{ __('Login') }}
          </button>
          @if (Route::has('password.request'))
          <a class="text-xs text-gray-700 mr-2" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
          </a>
          @endif
        </div>
      </form>
      <a href="/register" class="text-sm text-gray-700">Or Registrate a new account</a>
    </div>
  </div>
@endsection
