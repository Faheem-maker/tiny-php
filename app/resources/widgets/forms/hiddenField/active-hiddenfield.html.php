<input type="hidden" name="{{ $model->basename() }}[{{ $name }}]" value="{{ $value }}"
    id="{{ $model->basename() }}_{{ $name }}" {{ $readonly ? 'readonly' : '' }}>