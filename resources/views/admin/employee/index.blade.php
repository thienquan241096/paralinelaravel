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
<div class="row">
    <div class="col-md-10">
        <form action="{{ route('admin.employee.search') }}" method="GET">
            <div class="input-group">
                <input type="search" name="keywordName" class="form-control form-control-lg"
                    placeholder="search by name...?">
                <input type="search" name="keywordEmail" class="form-control form-control-lg"
                    placeholder="search by email...?">
                <select class="form-control form-control-lg" name="team_id" id="">
                    <option>Choose Team</option>
                    @foreach ($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                    @endforeach
                </select>
                <select class="form-control form-control-lg" name="group_id" id="">
                    <option>Choose Group</option>
                    @foreach ($groups as $group)
                    <option value="{{$group->id}}">{{$group->name}}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-lg btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2">
        <a href="{{ route('admin.employee.getAdd') }}" class="btn btn-block btn-success btn-lg">Add employee</a>
    </div>
</div>
<div class="mt-2">
    <table class="table text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>employee name</th>
                <th>Avatar</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td scope="row">{{$employee->id}}</td>
                <td scope="row">{{$employee->full_name}}</td>
                <td scope="row">{{$employee->m_teams->name}}</td>
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
                <div class="modal-body">
                    <p class="text-center">
                        Are you sure you want to delete this?
                    </p>
                    <input type="hidden" name="id" id="employeeId" value="">
                </div>
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