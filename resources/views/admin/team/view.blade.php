@extends('admin.layouts.index')
@section('title')
<h1 class="m-0">View TEAM</h1>
@endsection
@section('content')
<div>
    <label>Name</label>
    <input type="text" class="form-control" value="{{$team->name}}" readonly>
</div>
<div>
    <label>Name</label>
    <input type="text" class="form-control" value="{{$team->m_groups->name}}" readonly>
</div>
<div>
    <label>create_at</label>
    <input type="text" class="form-control" value="{{$team->created_at}}" readonly>
</div>
<div>
    <label>updated_at</label>
    <input type="text" class="form-control" value="{{$team->updated_at}}" readonly>
</div>
<div>
    <label>insert by</label>
    <input type="text" class="form-control" value="{{$team->ins_id}}" readonly>
</div>
<div>
    <label>update by</label>
    <input type="text" class="form-control" value="{{$team->upd_id}}" readonly>
</div>
@endsection