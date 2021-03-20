<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
  <header class="mx-5 my-2 text-center bg-blue-300 border border-gray-400 rounded-lg py-5">
    <h1 class="text-4xl font-bold">ToDo List</h1>
  </header>
  <main>
    @if (auth()->check())
      <div class="flex justify-end mr-10">
        <form action="/logout" method="post">
          @csrf
          <button class="text-red-500" type="submit">Log Out</button>
        </form>
      </div>
    @endif
    <section class="px-8 py-4 mb-4">
      @yield('content')
    </section>
  </main>
</body>
</html>
