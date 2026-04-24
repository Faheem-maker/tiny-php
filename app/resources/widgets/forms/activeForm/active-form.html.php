<form action="{{ app()->url->to($action) }}" method="{{ $method == 'GET' ? 'GET' : 'POST'}}"
    enctype="multipart/form-data">
    @if($method != 'GET' && $method != 'POST')
    <input type="hidden" name="_method" value="{{ $method }}">
    @endif
    @if($method != 'GET')
    <input type="hidden" name="_csrf" value="{{ \framework\web\utils\security\Csrf::allocate() }}">
    @endif
    {{!! $content }}
</form>