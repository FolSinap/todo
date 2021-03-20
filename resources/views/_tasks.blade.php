<div class="my-4">
  @forelse ($tasks as $task)
    <div class="{{ $loop->last ? 'border-b' : '' }}
      {{ $task->state ? 'line-through bg-green-100 hover:bg-green-200' : 'hover:bg-blue-200' }}
      border-t border-gray-400  py-2 px-4 flex justify-between text-left">
      <div class="flex items-center">
        <form action="/tasks/{{ $task->id }}/done" method="post" class="mr-3">
            @csrf
            @method('patch')
            <button type="submit" title="Check">
              @if ($task->state)
                <i class="fas fa-redo text-blue-500 hover:text-blue-700"></i>
              @else
                <i class="fas fa-check text-green-200 hover:text-green-400"></i>
              @endif
            </button>
        </form>
        @if(!is_null($task->description))
          <details>
            <summary class="cursor-pointer {{ $task->state ? 'no-underline' : '' }}">
              {{ $task->title }}
              @if ($task->priority === 2)
                <i class="fas fa-circle ml-2 text-green-300 fa-xs" title="Low"></i>
              @elseif ($task->priority === 1)
                <i class="fas fa-circle ml-2 text-yellow-300 fa-xs" title="Normal"></i>
              @else
                <i class="fas fa-circle ml-2 text-red-300 fa-xs" title="High"></i>
              @endif
            </summary>
            {{ $task->description }}
          </details>
        @else
          <span class="{{ $task->state ? 'no-underline' : '' }}">
            {{ $task->title }}
            @if ($task->priority === 2)
              <i class="fas fa-circle ml-2 text-green-300 fa-xs" title="Low"></i>
            @elseif ($task->priority === 1)
              <i class="fas fa-circle ml-2 text-yellow-300 fa-xs" title="Normal"></i>
            @else
              <i class="fas fa-circle ml-2 text-red-300 fa-xs" title="High"></i>
            @endif
          </span>
        @endif
      </div>
      <div class="flex">
        @if ( !$task->state )
          <a href="/tasks/{{ $task->id }}/edit" class="mr-3" title="Edit"><i class="fas fa-edit text-blue-500 hover:text-blue-700"></i></a>
        @endif
        <form action="/tasks/{{ $task->id }}/delete" method="post">
          @csrf
          @method('delete')
          <button type="submit" title="Delete"><i class="fas fa-trash text-red-300 hover:text-red-500"></i></button>
        </form>
      </div>
    </div>
  @empty
    <span class="italic">Nothing is here yet</span>
  @endforelse
</div>
