<form action="{{ app()->url->to($action) }}"
    method="{{ $method == 'GET' ? 'GET' : 'POST'}}">
    @if($method != 'GET' && $method != 'POST')
        <input type="hidden" name="_method" value="{{ $method }}">
    @endif
    {{!! $content }}
</form>