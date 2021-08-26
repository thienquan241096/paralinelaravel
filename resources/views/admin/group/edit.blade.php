@extends('admin.layouts.index')
@section('title')
<h1>Edit Group</h1>
@endsection
@section('content')
<form action="{{ route('admin.group.postEdit') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$group->id}}">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="{{old('name',$group->name)}}"
            placeholder="Frontend, Backend, App, AI...">
    </div>
    @error('name')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Update group</button>
</form>
@endsection