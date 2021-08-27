@extends('admin.layouts.index')
@section('title')
<h1>Edit TEAM</h1>
@endsection
@section('content')
<form action="{{ route('admin.employee.postEdit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$employee->id}}">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="{{old('email',$employee->email)}}">
                <div>
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>last_name</label>
                <input type="text" class="form-control" name="last_name"
                    value="{{old('last_name',$employee->last_name)}}">
                <div>
                    @error('last_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>first_name</label>
                <input type="text" class="form-control" name="first_name"
                    value="{{old('first_name',$employee->first_name)}}">
                <div class="">
                    @error('first_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>birthday</label>
                <input type="date" class="form-control" name="birthday" value="{{old('birthday',$employee->birthday)}}">
                <div>
                    @error('birthday')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>address</label>
                <input type="text" class="form-control" name="address" value="{{old('address',$employee->address)}}">
                @error('address')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>salary</label>
                <input type="text" class="form-control" name="salary" value="{{old('salary',$employee->salary)}}">
                <div>
                    @error('salary')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-md-6">
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
                <label for="">Positon</label>
                <select class="form-control" name="position">
                    @foreach (Config::get('common.POSITION') as $key => $value)
                    <option value="{{$key}}" @if($key==old('positon',$employee->team_id)) selected @endif>{{$value}}
                    </option>
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
                <label for="">Gender</label>
                <select class="form-control" name="gender">
                    @foreach (Config::get('common.GENDER') as $key => $value)
                    <option value="{{$key}}" @if($key==old('gender',$employee->type_of_work)) selected
                        @endif>{{$value}}</option>
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
                <label for="">avatar</label>
                <input type="file" class="form-control-file" name="avatar">
                <img src="{{ asset('storage/'.$employee->avatar) }}" alt="" width="100px">
                @error('avatar')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Update
        employee</button>
</form>
@endsection