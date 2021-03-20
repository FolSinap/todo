@extends('layouts.app')

@section('content')
<div class="flex mx-auto justify-center">
  <div class="mx-auto pt-8 pb-8 px-16 bg-blue-100 rounded-lg border border-gray-300">
    <div class="card-header font-bold text-lg mb-4">{{ __('Reset Password') }}</div>
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="mb-6">
        <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
          {{ __('E-Mail Address') }}
        </label>
        <input id="email" type="email" class="border border-gray-400 p-2 w-full form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </div>
      <button type="submit" class="text-white bg-blue-400 px-4 py-2 rounded-lg mr-2 hover:bg-blue-500">
        {{ __('Send Password Reset Link') }}
      </button>
    </form>
  </div>
</div>
@endsection
