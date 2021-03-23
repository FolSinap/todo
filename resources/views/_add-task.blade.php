<div class="relative md:static">
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
      class="mt-2 md:mt-0 border border-black rounded-md px-4 py-2 focus:border-blue-500 ">
    <button type="submit" title="Add New" class="absolute top-0 right-1 md:static ml-4 text-blue-400 hover:text-blue-500"><i class="fas fa-plus-circle fa-2x"></i></button>
    </div>
    <label for="deadline">Set deadline:</label>
    <input id="deadline" type="date" name="deadline" value="{{ date('Y-m-d') }}" placeholder="Today by default" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+1 year')) }}"
      class="ml-2 rounded-lg border border-black mb-2 p-1">
    <textarea name="description" class="w-3/4 border border-black rounded-md px-4 py-2" placeholder="Add description">{{ old('description') }}</textarea>
  </form>
  @error('deadline')
    <p class="text-red-400">{{ $message }}</p>
  @enderror
  @error('title')
    <p class="text-red-400">{{ $message }}</p>
  @enderror
</div>
