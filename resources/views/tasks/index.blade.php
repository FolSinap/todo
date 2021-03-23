@extends('layouts.app')

@section('content')
  <section class="text-center text-gray-600">
    <div class="border border-black mx-auto md:w-3/4 xl:w-1/3 rounded-md bg-gray-100 p-5">
      <h1 class="text-4xl font-bold mb-4">Your task list</h1>
      @include('_add-task')
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
