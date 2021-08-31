@extends('admin.layouts.index')
@section('title')
<h1 class="m-0">Team Group</h1>
@endsection
@section('content')
@if(Session::has('message'))
<div class="float-right">
    <p class="alert alert-success">
        {{Session::get('message')}}
    </p>
</div>
@endif
<div class="row">
    <div class="col-md-10">
        <form action="{{ route('admin.team.search') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control form-control-lg" name="keyword"
                    placeholder="what do you search ...?">
                <select class="form-control form-control-lg" name="group_id" id="">
                    <option value="0">Choose group</option>
                    @foreach ($groups as $group)
                    <option value="{{$group->id}}">{{$group->name}}
                    </option>
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
        <a href="{{ route('admin.team.getAdd') }}" class="btn btn-block btn-success btn-lg">Add team</a>
    </div>
</div>
<div class="mt-2">
    <table class="table text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>Group name</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($teams as $team)
            <tr>
                <td scope="row">{{$team->id}}</td>
                <td scope="row">{{$team->name}}</td>
                <td scope="row">{{$team->m_groups->name}}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('admin.team.view', ['id'=>$team->id]) }}">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-primary" href="{{ route('admin.team.getEdit', ['id'=>$team->id]) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="" data-id={{$team->id}} data-toggle="modal" data-target="#deleteTeam"
                        class="btn btn-danger open-delete-modal-team">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $teams->links() }}
<div class="modal modal-danger fade" id="deleteTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <form action="{{ route('admin.team.getDelete') }}" method="GET">
                <div class="modal-body">
                    <p class="text-center">
                        Are you sure you want to delete this?
                    </p>
                    <input type="hidden" name="id" id="teamId" value="">
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
    $(document).on('click','.open-delete-modal-team',function(){
         let id = $(this).attr('data-id');
         console.log(id);
         $('#teamId').val(id);
    });
</script>
@endsection