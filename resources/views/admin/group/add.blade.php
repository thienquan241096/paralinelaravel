@extends('admin.layouts.index')
@section('title')
<h1 class="m-0">Add Group</h1>
@endsection
@section('content')
<div id="success_message"></div>
<form action="" id="form">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control name" name="name" placeholder="Frontend, Backend, App, AI..." required>
    </div>
    <p class="text-danger error_name"></p>
    <button type="submit" class="btn btn-primary" data-target="#exampleModal">Add new group</button>
</form>

<div id="add-confirm">
    <div class="mb-3">
        <label>Name : </label>
        <span class="confirm-name"></span>
    </div>
    <input type="button" class="btn btn-primary back" value="Back">
    <button type="submit" class="btn btn-primary add" data-target="#exampleModal">Add new</button>
</div>

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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" data-route="{{ route('admin.group.postAdd') }}"
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
            $.ajax({
                type: "GET",
                url: "/api/checkGroup",
                data: {
                    name : inputName
                },
                dataType: "json",
                success: function (dataName) {
                    console.log(dataName)
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
                        $('.confirm-name').html(inputName);
                        
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
            formData.append('name', $('.name').val());
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
                            if(response.status == 200){
                                $('#exampleModal').modal('hide');
                                window.location.href= 'http://127.0.0.1:8000/admin/group/';
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