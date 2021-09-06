@extends('admin/layouts/index')
@section('title')
<div class="float-left">
    <h1 class="m-0">List Employee</h1>
</div>
@endsection
@section('content')
@if(Session::has('message'))
<div class="float-right">
    <p class="alert alert-success">
        {{Session::get('message')}}
    </p>
</div>
@endif
<div id="success_message"></div>
<div class="offset-md-10 col-md-2">
    <a href="{{ route('admin.employee.getAdd') }}" class="btn btn-block btn-success btn-lg">Add employee</a>
</div>
<form action="{{ route('admin.employee.search') }}" method="GET">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-1"><label for="name">Name</label></div>
                <div class="col-md-4">
                    <input type="search" name="keywordName" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-1"><label for="name">Email</label></div>
                <div class="col-md-4">
                    <input type="search" name="keywordEmail" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-1"><label for="name">Team</label></div>
                <div class="col-md-4">
                    <select class="form-control" name="team_id">
                        <option value="0">Choose Team</option>
                        @foreach ($teams as $team)
                        <option value="{{$team->id}}">{{$team->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-1"><label for="name">Group</label></div>
                <div class="col-md-4">
                    <select class="form-control" name="group_id">
                        <option value="0">Choose Group</option>
                        @foreach ($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3 mb-3">
                    <button class="btn btn-success">Search</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="mt-2">
    <table class="table text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Employee Name</th>
                <th>Email</th>
                <th>Avatar</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td scope="row">{{$employee->id}}</td>
                <td scope="row">{{$employee->name}}</td>
                <td scope="row">{{$employee->m_teams->name}}</td>
                <td scope="row">{{$employee->email}}</td>
                <td scope="row">
                    <img src="{{ asset('storage/'.$employee->avatar) }}" width="100px" alt="">
                </td>
                <td>
                    <a class="btn btn-success" href="{{ route('admin.employee.view', ['id'=>$employee->id]) }}">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-primary" href="{{ route('admin.employee.getEdit', ['id'=>$employee->id]) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="" data-id={{$employee->id}} data-toggle="modal" data-target="#deleteemployee"
                        class="btn btn-danger open-delete-modal-employee">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            {{-- @if(count($employees) < 0) <tr>
                <td>Không có dữ liệu</td>
                </tr>
                @endif --}}
        </tbody>
    </table>
</div>
{{ $employees->links() }}
<div class="modal modal-danger fade" id="deleteemployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <form action="{{ route('admin.employee.getDelete') }}" method="GET">
                <input type="hidden" name="id" id="employeeId" value="">
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                    <button type="submit" class="btn btn-warning">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).on('click','.open-delete-modal-employee',function(){
         let id = $(this).attr('data-id');
        //  console.log(id);
         $('#employeeId').val(id);
    });
</script>
@endsection