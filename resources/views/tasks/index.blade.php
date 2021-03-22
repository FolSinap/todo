@extends('layouts.app')

@section('content')
  <section class="text-center text-gray-600">
    <div class="border border-black mx-auto md:w-3/4 xl:w-1/3 rounded-md bg-gray-100 p-5">
      <h1 class="text-4xl font-bold mb-4">Your task list</h1>
      <form method="post" action="/tasks">
        <div class="md:flex justify-center mb-4">
        @csrf
        <label for="priority" class="mr-2 my-auto text-black">Priority:</label>
        <select name="priority" id="priority" class="mr-4 border border-gray-300 rounded-md px-2 py-2">
          <option value="0" class="text-red-500">High</option>
          <option value="1" class="text-yellow-500" selected>Normal</option>
          <option value="2" class="text-green-500">Low</option>
        </select>
        <input type="text" name="title" placeholder="Your plans are..."
          class="mt-2 md:mt-0 border border-black rounded-md px-4 py-2 focus:border-blue-500 self-auto">
        <button type="submit" title="Add New" class="ml-4 text-blue-400 hover:text-blue-500"><i class="fas fa-plus-circle fa-2x"></i></button>
        </div>
        <label for="deadline">Set deadline:</label>
        <input id="deadline" type="date" name="deadline" value="{{date('Y-m-d')}}" placeholder="Today by default" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+1 year')) }}"
          class="ml-2 rounded-lg border border-black mb-2 p-1">
        <textarea name="description" class="md:w-3/4 border border-black rounded-md px-4 py-2" placeholder="Add description">{{ old('description') }}</textarea>
      </form>
      @error('deadline')
        <p class="text-red-400">{{ $message }}</p>
      @enderror
      @error('title')
        <p class="text-red-400">{{ $message }}</p>
      @enderror
      @include('_tasks')
      @if (auth()->user()->tasks()->exists())
        <div class="flex justify-end">
          <form action="/tasks/delete" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="p-2 border text-white border-gray-300 bg-blue-300 hover:bg-blue-400 text-xs rounded-lg">Clear Checked</button>
          </form>
        </div>
      @endif
    </div>
  </section>
@endsection
