<label class="block text-gray-700 text-sm font-bold mb-2" for="username">
    {{ $model->label($name) }}
</label>
<input
    value="{{ $model->$name }}"
    class="shadow appearance-none border rounded
    w-full py-2 px-3 text-gray-700 leading-tight
    focus:outline-none focus:shadow-outline\
    {{ $model->errors($name) ? ' border-red-500' : '' }}"
    name="{{ $model->basename() }}[{{ $name }}]"
    id="{{ $model->basename() }}_{{ $name }}"
    type="text">
<div class="text-red-500 text-xs italic mb-2">
    {{ $model->errors($name) }}
</div>