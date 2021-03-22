<div class="my-4">
  @forelse ($tasks as $task)
    <div class="{{ $loop->last ? 'border-b' : '' }}
      {{-- {{ $task->state ? 'line-through bg-green-100 hover:bg-green-200' : 'hover:bg-blue-200' }} --}}
      @if ($task->state && !$task->fail_at < date('Y-m-d'))
        bg-green-100 hover:bg-green-200
      @elseif ($task->fail_at < date('Y-m-d'))
        bg-yellow-100 hover:bg-yellow-200
      @else
        hover:bg-blue-200
      @endif
      border-t border-gray-400  py-2 px-4 flex justify-between text-left">
      <div class="flex items-center">
        @if( !($task->fail_at < date('Y-m-d')) )
          @include('_check-restore-buttons')
        @endif
        @if(!is_null($task->description))
          <details>
            <summary class="cursor-pointer {{ $task->state ? 'line-through' : '' }}">
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
          <span class="{{ $task->state ? 'line-through' : '' }}">
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
      @if ( $task->fail_at < date('Y-m-d') && !$task->state )
        <span class="italic text-red-500">failed {{ $task->fail_at }}</span>
      @endif
      @if ( $task->state )
        <span class="italic text-green-500">checked {{ $task->checked_at }}</span>
      @endif
      <div class="flex">
        @if ( !$task->state && !($task->fail_at < date('Y-m-d')) )
          <a href="/tasks/{{ $task->id }}/edit" class="mr-3" title="Edit"><i class="fas fa-edit text-blue-500 hover:text-blue-700"></i></a>
        @endif
        @include('_delete-button')
      </div>
    </div>
  @empty
    <span class="italic">Nothing is here yet</span>
  @endforelse
</div>
