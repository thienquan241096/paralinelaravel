@extends('admin.layouts.index')
@section('title')
<h1 class="m-0">View Team</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>last_name</label>
            <input type="text" class="form-control" value="{{$employee->last_name}}" readonly>
        </div>
        <div class="form-group">
            <label>first_name</label>
            <input type="text" class="form-control" value="{{$employee->first_name}}" readonly>
        </div>
        <div class="form-group">
            <label>email</label>
            <input type="text" class="form-control" value="{{$employee->email}}" readonly>
        </div>
        <div class="form-group">
            <label for="">Gender</label>
            <select class="form-control" name="gender">
                @foreach (Config::get('common.GENDER') as $key => $value)
                <option value="{{$key}}" @if($key==old('gender',$employee->gender)) selected
                    @endif>{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Type of work</label>
            <select class="form-control" name="type_of_work">
                @foreach (Config::get('common.TYPE_OF_WORK') as $key => $value)
                <option value="{{$key}}" @if($key==old('type_of_work',$employee->type_of_work)) selected
                    @endif>{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>birthday</label>
            <input type="text" class="form-control" name="birthday" value="{{$employee->birthday}}" readonly>
        </div>
        <div class="form-group">
            <label>salary</label>
            <input type="text" class="form-control" name="salary" value="{{$employee->salary}}" readonly>
        </div>
        <div class="form-group">
            <label>address</label>
            <input type="text" class="form-control" name="address" value="{{$employee->address}}" readonly>

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>create_at</label>
            <input type="text" class="form-control" value="{{$employee->created_at}}" readonly>
        </div>
        <div class="form-group">
            <label>updated_at</label>
            <input type="text" class="form-control" value="{{$employee->updated_at}}" readonly>
        </div>
        <div class="form-group">
            <label>ins_id</label>
            <input type="text" class="form-control" value="{{$employee->ins_id}}" readonly>
        </div>
        <div class="form-group">
            <label>upd_id</label>
            <input type="text" class="form-control" value="{{$employee->upd_id}}" readonly>
        </div>
        <div class="form-group">
            <label for="">Name team</label>
            <select class="form-control" name="team_id" id="">
                @foreach ($teams as $team)
                <option value="{{$team->id}}" @if($team->id == old('team_id',$employee->team_id)) selected
                    @endif>{{$team->name}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">STATUS</label>
            <select class="form-control" name="status">
                @foreach (Config::get('common.STATUS') as $key => $value)
                <option value="{{$key}}" @if($key==old('status',$employee->status)) selected @endif>{{$value}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Positon</label>
            <select class="form-control" name="position">
                @foreach (Config::get('common.POSITION') as $key => $value)
                <option value="{{$key}}" @if($key==old('positon',$employee->team_id)) selected @endif>{{$value}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Avatar</label>
            <img src="{{ asset("storage/$employee->avatar") }}" width='200px' alt="">
        </div>
    </div>
</div>


@endsection