@extends('layouts.app')

@section('content')
  <section class="text-center text-gray-600">
    <h1 class="text-4xl font-bold mb-10">Welcome</h1>
    <p class="text-md">
      Please <a class="hover:underline text-black" href="{{ route('login') }}"
      >Log In</a> or <a class="hover:underline text-black" href="{{ route('register') }}"
      >Create</a> a new account to make your own task list.
    </p>
  </section>
@endsection
