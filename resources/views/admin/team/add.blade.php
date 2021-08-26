@extends('admin.layouts.index')
@section('title')
<h1 class="m-0">Add TEAM</h1>
@endsection
@section('content')
<form action="{{ route('admin.team.postAdd') }}" method="post">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="{{old('name')}}"
            placeholder="Team Ruby, Team Diamond, Team Chibi...">
    </div>
    @error('name')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <div class="form-group">
        <label for="">Group name</label>
        <select class="form-control" name="group_id">
            @foreach ($groups as $group)
            <option value="{{$group->id}}" @if($group->id == old('group_id')) selected @endif>{{$group->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add new team</button>
</form>

@endsection