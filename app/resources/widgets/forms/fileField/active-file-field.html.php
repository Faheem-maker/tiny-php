<label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $model->basename() }}_{{ $name }}">
    {{ $label ?: $model->label($name) }}
</label>
<input
    class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0
    file:bg-teal-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-teal-700
    focus:outline-none disabled:pointer-events-none disabled:opacity-60
    {{ $model->errors($name) ? ' border-red-500' : '' }}"
    name="{{ $model->basename() }}[{{ $name }}]"
    id="{{ $model->basename() }}_{{ $name }}"
    type="file"
    {{ $readonly ? 'disabled' : '' }}>
<div class="text-red-500 text-xs italic mt-1 mb-2">
    {{ $model->errors($name) }}
</div>
