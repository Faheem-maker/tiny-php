<form action="{{ app()->url->to($action) }}"
    method="{{ $method == 'GET' ? 'GET' : 'POST'}}">
    @if($method != 'GET' && $method != 'POST')
        <input type="hidden" name="_method" value="{{ $method }}">
    @endif
    @if($method != 'GET')
        <input type="hidden" name="_csrf" value="{{ \framework\utils\security\Csrf::allocate() }}">
    @endif
    {{!! $content }}
</form>