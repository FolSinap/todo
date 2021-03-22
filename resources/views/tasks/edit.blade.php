@extends('layouts.app')

@section('content')
  <section class="text-center text-gray-600">
    <div class="border border-black mx-auto md:w-1/3 rounded-md bg-gray-100 p-5">
      <h1 class="text-4xl font-bold mb-4">Edit</h1>
      <form method="post" action="/tasks/{{ $task->id }}/edit">
        <div class="flex justify-center mb-4">
          <a href="{{ route('home') }}" class="mr-5 text-blue-400" title="Back"><i class="fas fa-arrow-left fa-2x"></i></a>
          @csrf
          @method('patch')
          <label for="priority" class="mr-2 my-auto text-black">Priority:</label>
          <select name="priority" id="priority" class="mr-4 border border-gray-300 rounded-md px-2 py-2">
            <option value="0" {{ $task->priority === 0 ? 'selected' : '' }} class="text-red-500">High</option>
            <option value="1" {{ $task->priority === 1 ? 'selected' : '' }} class="text-yellow-500">Normal</option>
            <option value="2" {{ $task->priority === 2 ? 'selected' : '' }} class="text-green-500">Low</option>
          </select>
          <input type="text" name="title" placeholder="Your plans are..." value="{{ $task->title }}"
            class="border border-black rounded-md px-4 py-2 focus:border-blue-500 self-auto">
          <button type="submit" title="Complete" class="ml-4 text-green-300 hover:text-green-400"><i class="fas fa-check fa-2x"></i></button>
        </div>
        <label for="deadline">Set deadline:</label>
        <input id="deadline" type="date" name="deadline" value="{{ $task->fail_at }}" placeholder="Today by default" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+1 year')) }}"
          class="ml-2 rounded-lg border border-black mb-2 p-1">
        <textarea name="description" class="md:w-3/4 border border-black rounded-md px-4 py-2" placeholder="Add description">{{ $task->description }}</textarea>
      </form>
      @error ('title')
        <p class="text-red-400">{{ $message }}</p>
      @enderror
      @error ('priority')
        <p class="text-red-400">{{ $message }}</p>
      @enderror
    </div>
  </section>
@endsection
