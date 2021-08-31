@extends('admin.layouts.index')
@section('title')
<h1 class="m-0">Add TEAM</h1>
@endsection
@section('content')
<div id="success_message"></div>
<div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control name" name="name" value="{{old('name')}}"
        placeholder="Team Ruby, Team Diamond, Team Chibi...">
    <p class="error_name"></p>
</div>
<div class="form-group">
    <label for="">Group name</label>
    <select class="form-control group_id" name="group_id">
        @foreach ($groups as $group)
        <option value="{{$group->id}}" @if($group->id == old('group_id')) selected @endif>{{$group->name}}</option>
        @endforeach
    </select>
</div>
<button type="submit" class="btn btn-primary btn-submit" data-target="#exampleModal">Add new
    team</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new team ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" data-route="{{ route('admin.team.postAdd') }}"
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
            $('.btnYes').click(function (e) { 
                e.preventDefault();
                var inputName = $('.name').val();
                var groupId = $('.group_id').val();
                var route = $(this).data('route');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: route,
                    data: {
                        name : inputName,
                        group_id : groupId
                    },
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 200){
                            $('#exampleModal').modal('hide');
                            $('#success_message').addClass('alert alert-success');
                            $('#success_message').text(response.message);
                            window.location.reload();
                        }else{
                            $('#exampleModal').modal('hide');
                            $('.error_name').html(response.error.name[0]);
                            $('.error_name').addClass('text text-danger');
                        }
                    }
                });
            });
        });
    });
</script>
@endsection