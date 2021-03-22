<form action="/tasks/{{ $task->id }}/update" method="post" class="mr-3">
    @csrf
    @method('patch')
    <button type="submit">
      @if ($task->state)
        <i class="fas fa-redo text-blue-500 hover:text-blue-700"  title="Restore"></i>
      @else
        <i class="fas fa-check text-green-200 hover:text-green-400"  title="Check"></i>
      @endif
    </button>
</form>
