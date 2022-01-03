<form method="post" id="delete-form-{{ $id ?? __('') }}" style="display: none;" action="{{ $route ?? __('') }}">
    @csrf
    @method('DELETE')
    <input type="hidden" value="{{ $id ?? __('') }}" name="id">
</form>