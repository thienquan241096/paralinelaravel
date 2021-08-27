@extends('admin.layouts.index')
@section('title')
<h1 class="m-0">Add TEAM</h1>
@endsection
@section('content')
<form action="{{ route('admin.group.postAdd') }}" method="post">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="{{old('name')}}"
            placeholder="Frontend, Backend, App, AI...">
    </div>
    @error('name')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new group</button>

</form>

{{-- EmployeeFormRequest
    GroupFormRequest
    TeamFormRequest
    --}}
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new group ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.group.postAdd') }}" method="post">
<div class="modal-body">
    Are you sure ?
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
    <button type="button" class="btn btn-primary">Yes</button>
</div>
</form>
</div>
</div>
</div> --}}
@endsection