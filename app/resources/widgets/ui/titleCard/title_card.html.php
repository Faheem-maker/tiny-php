<div class="{{ $color == 'primary' ? 'bg-indigo-50' : 'bg-gray-50' }} p-4 rounded-2xl text-center">
    <div class="text-3xl font-bold {{ $color == 'primary' ? 'text-indigo-700' : 'text-gray-700' }}"
        {{!! $data_text ? 'data-text="' . $data_text . '"' : ''}}
        >{{ $text }}</div>
    <div class="text-xs font-medium {{ $color == 'primary' ? 'text-indigo-500' : 'text-gray-500' }} uppercase tracking-widest mt-1">{{ $title }}</div>
</div>