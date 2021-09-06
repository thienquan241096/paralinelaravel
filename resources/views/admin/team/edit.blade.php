@extends('admin.layouts.index')
@section('title')
<h1>Edit TEAM</h1>
@endsection
@section('content')
<div id="success_message"></div>
<form action="" id="form">
    <input type="hidden" class="id" name="id" value="{{$team->id}}">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control name" name="name" value="{{old('name',$team->name)}}"
            placeholder="Frontend, Backend, App, AI...">
    </div>
    <p class="text-danger error_name"></p>
    <div class="form-group">
        <label for="">Group name</label>
        <select class="form-control group_id" name="group_id">
            @foreach ($groups as $group)
            <option value="{{$group->id}}" @if($group->id == old('group_id',$team->group_id)) selected
                @endif>{{$group->name}}
            </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-submit" data-target="#exampleModal">Update
        team</button>
</form>
<div id="add-confirm">
    <div class="mb-3">
        <label>Name : </label>
        <span class="confirm-name"></span>
    </div>
    <div class="form-group">
        <label for="">Group name :</label>
        <span class="confirm_group_id"></span>
    </div>
    <input type=" button" class="btn btn-primary back" value="Back">
    <button type="submit" class="btn btn-primary add" data-target="#exampleModal">Edit now</button>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit new team ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" data-route="{{ route('admin.team.postEdit') }}"
                    class="btn btn-primary btnYes">Yes</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#form').submit(function (e) { 
            e.preventDefault();
            var inputName = $('.name').val();
            var selectGroup = $('.group_id').val();
            var selectGroupName = [];
            $('.group_id :selected').each(function(i, selected){ 
                selectGroupName[i] = $(selected).text(); 
            });
            $.ajax({
                type: "GET",
                url: "/api/checkEditTeam",
                data: {
                    id : $('.id').val(),
                    name : inputName,
                    group_id: selectGroup,
                },
                dataType: "json",
                success: function (dataName) {
                    if(dataName.status == 422){
                        if(dataName.error.name){
                            $('.error_name').text(dataName.error.name);
                        }else{
                            $('.error_name').text("");
                        }
                    }else if(dataName.status == 200){
                        $('#form').css('display','none');
                        $('.error_name').text("");
                        $('#add-confirm').css('display','block');
                        $('#add-confirm').css('display','block');
                        $('.confirm-name').html(inputName);
                        $('.confirm_group_id').text(selectGroupName);

                        $('.back').click(function (e) { 
                            e.preventDefault();
                            $('#form').css('display','block');
                            $('#add-confirm').css('display','none');
                        });
                    }
                }
            });
        });

        $('.add').click(function (e) { 
            e.preventDefault();
            $('#exampleModal').modal('show');
            var formData = new FormData();
            formData.append('id', $('.id').val());
            formData.append('name', $('.name').val());
            formData.append('group_id', $('.group_id').val());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                $('.btnYes').click(function (e) { 
                    e.preventDefault();
                    var route = $(this).data('route');
                    $.ajax({
                        type: "POST",
                        url: route,
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            // console.log(response);
                            if(response.status == 200){
                                $('#exampleModal').modal('hide');
                                window.location.href= 'http://127.0.0.1:8000/admin/team/';
                                $('#success_message').addClass('text-success');
                                $('#success_message').text(response.message);
                            }
                        }
                    });
                });
        });
    });
</script>
@endsection