<form action="/tasks/{{ $task->id }}/delete" method="post">
  @csrf
  @method('delete')
  <button type="submit" title="Delete"><i class="fas fa-trash text-red-300 hover:text-red-500"></i></button>
</form>
