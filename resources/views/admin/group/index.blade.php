@extends('admin.layouts.index')
@section('title')
<div class="float-left">
    <h1 class="m-0">List Group</h1>
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
<div class="row">
    <div class="col-md-10">
        <form action="{{ route('admin.group.search') }}" method="GET">
            <div class="row">
                <div class="col-md-1"><label for="name">Name</label></div>
                <div class="col-md-4">
                    <input type="search" name="keyword" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3 mb-3">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
        </form>

    </div>
    <div class="col-md-2">
        <a href="{{ route('admin.group.getAdd') }}" class="btn btn-block btn-success btn-lg">Add group</a>
    </div>
</div>
<div class="mt-2">
    <table class="table text-center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($groups as $group)
            <tr>
                <td scope="row">{{$group->id}}</td>
                <td>{{$group->name}}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('admin.group.view', ['id'=>$group->id]) }}">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-primary" href="{{ route('admin.group.getEdit', ['id'=>$group->id]) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="" data-id={{$group->id}} data-toggle="modal" data-target="#delete"
                        class="btn btn-danger open-delete-modal">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $groups->links() }}
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="text-center" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <form action="{{ route('admin.group.getDelete') }}" method="GET">
                <input type="hidden" name="id" id="groupid" value="">
                <div class="modal-footer justify-content-center">
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
    $(document).on('click','.open-delete-modal',function(){
         let id = $(this).attr('data-id');
         $('#groupid').val(id);
    });
</script>
@endsection