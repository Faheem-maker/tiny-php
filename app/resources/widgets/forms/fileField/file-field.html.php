<label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $name }}">
    {{ $label }}
</label>
<input class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0
    file:bg-teal-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-teal-700
    focus:outline-none disabled:pointer-events-none disabled:opacity-60" name="{{ $name }}" id="{{ $name }}"
    type="file">