@extends('admin.layouts.index')
@section('title')
<h1>Edit Group</h1>
@endsection
@section('content')
<div id="success_message"></div>
<input type="hidden" class="idGroup" name="id" value="{{$group->id}}">
<div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control name" name="name" value="{{old('name',$group->name)}}"
        placeholder="Frontend, Backend, App, AI...">
</div>
<p class="text-danger error_name"></p>
<button type="submit" class="btn btn-primary btn-submit" data-route="admin.group.postEdit"
    data-target="#exampleModal">Update
    group</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new group ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" data-route="{{ route('admin.group.postEdit') }}"
                    class="btn btn-primary btnYes">Yes</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('.btn-submit').click(function (e) { 
            e.preventDefault();
            $('#exampleModal').modal('show');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.btnYes').click(function (e) { 
                e.preventDefault();
                var inputName = $('.name').val();
                var inputId = $('.idGroup').val();
                console.log(inputId);
                var route = $(this).data('route');
                console.log(route);
                $.ajax({
                    type: "POST",
                    url: route,
                    data:{
                        name : inputName,
                        id : inputId
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        if(response.status == 200){
                            $('#exampleModal').modal('hide');
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            window.location.reload();
                        }else{
                            $('#exampleModal').modal('hide');
                            $('.error_name').html(response.error.name[0]);
                        }
                    }
                });
            });
        });
    });
</script>
@endsection