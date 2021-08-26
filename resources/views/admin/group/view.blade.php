@extends('admin.layouts.index')
@section('title')
<h1 class="m-0">View Group</h1>
@endsection
@section('content')
<div>
    <label>Name</label>
    <input type="text" class="form-control" value="{{$group->name}}" readonly>
</div>
<div>
    <label>create_at</label>
    <input type="text" class="form-control" value="{{$group->created_at}}" readonly>
</div>
<div>
    <label>updated_at</label>
    <input type="text" class="form-control" value="{{$group->updated_at}}" readonly>
</div>
<div>
    <label>ins_id</label>
    <input type="text" class="form-control" value="{{$group->ins_id}}" readonly>
</div>
<div>
    <label>upd_id</label>
    <input type="text" class="form-control" value="{{$group->upd_id}}" readonly>
</div>
@endsection