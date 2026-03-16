<input type="hidden"
    name="{{ $model->basename() }}[{{ $name }}]"
    value="{{ $model->$name }}"
    id="{{ $model->basename() }}_{{ $name }}">