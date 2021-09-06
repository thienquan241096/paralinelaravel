@extends('admin.layouts.index')
@section('title')
<h1>Edit Employee</h1>
@endsection
@section('content')
<div id="success_message"></div>
<form id="form" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="id" name="id" value="{{$employee->id}}">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control email" name="email" value="{{old('email',$employee->email)}}">
                <span class="text-danger" id="input-email-error"></span>
            </div>
            <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control last_name" name="last_name"
                    value="{{old('last_name',$employee->last_name)}}">
                <span class="text-danger" id="input-last_name-error"></span>
            </div>

            <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control first_name" name="first_name"
                    value="{{old('first_name',$employee->first_name)}}">
                <span class="text-danger" id="input-first_name-error"></span>
            </div>

            <div class="form-group">
                <label>birthday</label>
                <input type="text" class="form-control birthday" name="birthday"
                    value="{{old('birthday',$employee->birthday)}}" placeholder="YYYY/mm/dd">
                <span class="text-danger" id="input-birthday-error"></span>
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control address" name="address"
                    value="{{old('address',$employee->address)}}">
                <span class="text-danger" id="input-address-error"></span>
            </div>

            <div class="form-group">
                <label>Salary</label>
                <input type="text" class="form-control salary" name="salary"
                    value="{{old('salary',$employee->salary)}}">
                <span class="text-danger" id="input-salary-error"></span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Name team</label>
                <select class="form-control team_id" name="team_id">
                    @foreach ($teams as $team)
                    <option value="{{$team->id}}" @if($team->id == old('team_id',$employee->team_id)) selected
                        @endif>{{$team->name}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Positon</label>
                <select class="form-control position" name="position">
                    @foreach (Config::get('common.POSITION') as $key => $value)
                    <option value="{{$key}}" @if($key==old('positon',$employee->team_id)) selected @endif>{{$value}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Type of work</label>
                <select class="form-control type_of_work" name="type_of_work">
                    @foreach (Config::get('common.TYPE_OF_WORK') as $key => $value)
                    <option value="{{$key}}" @if($key==old('type_of_work',$employee->type_of_work)) selected
                        @endif>{{$value}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Gender</label>
                <select class="form-control gender" name="gender">
                    @foreach (Config::get('common.GENDER') as $key => $value)
                    <option value="{{$key}}" @if($key==old('gender',$employee->gender)) selected
                        @endif>{{$value}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select class="form-control status" name="status">
                    @foreach (Config::get('common.STATUS') as $key => $value)
                    <option value="{{$key}}" @if($key==old('status',$employee->status)) selected @endif>{{$value}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" class="form-control-file" id="image" name="avatar" value="{{$employee->avatar}}">
                <img id="blah" src="{{ asset('storage/'.$employee->avatar) }}" alt="" width="100px">
                <span class="text-danger" id="image-input-error"></span>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" data-target="#exampleModal">Update employee</button>
</form>

<div id="add-confirm">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Email :</label>
                <span class="confirm-email"></span>
            </div>
            <div class="form-group">
                <label>last_name :</label>
                <span class="confirm-last_name"></span>
            </div>
            <div class="form-group">
                <label>first_name :</label>
                <span class="confirm-first_name"></span>
            </div>

            <div class="form-group">
                <label>birthday</label>
                <span class="confirm-birthday"></span>
            </div>

            <div class="form-group">
                <label>address :</label>
                <span class="confirm-address"></span>
            </div>

            <div class="form-group">
                <label>salary :</label>
                <span class="confirm-salary"></span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="">Name team :</label>
                <span class="confirm-team_id"></span>
            </div>

            <div class="form-group">
                <label for="">Positon :</label>
                <span class="confirm-position"></span>
            </div>
            <div class="form-group">
                <label for="">Type of work :</label>
                <span class="confirm-type_of_work"></span>
            </div>
            <div class="form-group">
                <label for="">Gender</label>
                <span class="confirm-gender"></span>
            </div>
            <div class="form-group">
                <label for="">STATUS</label>
                <span class="confirm-status"></span>
            </div>
            <div class="form-group">
                <label for="">Avatar</label>
                <img id="confirm-blah" src="" width="100px" class="mt-2" />
            </div>
        </div>
    </div>
    <input type=" button" class="btn btn-primary back" value="Back">
    <button type="submit" class="btn btn-primary add">Edit now</button>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit employee ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" data-route="{{ route('admin.employee.postEdit') }}"
                    class="btn btn-primary btnYes">Yes</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $(document).ready(function() {
            $("#image").change(function(e) {
                readURL(this);
                console.log(this.files);
                $('.avatar_hidden').val(this.files);
            });
        });
</script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        $('#form').submit(function (e) { 
            e.preventDefault();
            var newFormData = new FormData(this);
            var selectTeamName = [];
            $('.team_id :selected').each(function(i, selected){ 
                selectTeamName[i] = $(selected).text(); 
            });

            var selectPosition = [];
            $('.position :selected').each(function(i, selected){ 
                selectPosition[i] = $(selected).text(); 
            });

            var selectTypeOfWork = [];
            $('.type_of_work :selected').each(function(i, selected){ 
                selectTypeOfWork[i] = $(selected).text(); 
            });
            
            var selectGender = [];
            $('.gender :selected').each(function(i, selected){ 
                selectGender[i] = $(selected).text(); 
            });

            var selectStatus = [];
            $('.status :selected').each(function(i, selected){ 
                selectStatus[i] = $(selected).text(); 
            });
            
            var srcBlah = $('#blah').attr('src');
            $.ajax({
                type: "POST",
                url: "/api/checkEditEmployee",
                data: newFormData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status == 422){
                        if(response.error.email){
                            $('#input-email-error').text(response.error.email);
                        }else{
                            $('#input-email-error').text("");
                        }
                        
                        if(response.error.last_name){
                            $('#input-last_name-error').text(response.error.last_name);
                        }else{
                            $('#input-last_name-error').text("");
                        }
                        
                        if(response.error.first_name){
                            $('#input-first_name-error').text(response.error.first_name);
                        }else{
                            $('#input-first_name-error').text("");
                        }
                        
                        if(response.error.birthday){
                            $('#input-birthday-error').text(response.error.birthday);

                        }else{
                            $('#input-birthday-error').text("");
                        }
                        
                        if(response.error.address){
                            $('#input-address-error').text(response.error.address);

                        }else{
                            $('#input-address-error').text("");
                        }
                        
                        if(response.error.salary){
                            $('#input-salary-error').text(response.error.salary);
                        }else{
                            $('#input-salary-error').text("");
                        }
                        
                        if(response.error.avatar){
                            $('#image-input-error').text(response.error.avatar);
                        }else{
                            $('#image-input-error').text("");
                        }

                    }else{
                        $('#form').css('display','none');
                        $('#input-email-error').text("");
                        $('#input-last_name-error').text("");
                        $('#input-first_name-error').text("");
                        $('#input-birthday-error').text("");
                        $('#input-address-error').text("");
                        $('#input-salary-error').text("");
                        $('#image-input-error').text("");

                        $('#add-confirm').css('display','block');
                        $('.confirm-email').text($('.email').val());
                        $('.confirm-last_name').text($('.last_name').val());
                        $('.confirm-first_name').text($('.first_name').val());
                        $('.confirm-birthday').text($('.birthday').val());
                        $('.confirm-address').text($('.address').val());
                        $('.confirm-salary').text($('.salary').val());
                        $('.confirm-team_id').text(selectTeamName);
                        $('.confirm-position').text(selectPosition);
                        $('.confirm-type_of_work').text(selectTypeOfWork);
                        $('.confirm-gender').text(selectGender);
                        $('.confirm-status').text(selectStatus);
                        $("#confirm-blah").attr("src",srcBlah);

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
            var formData = new FormData($('#form')[0]);
            console.log(formData)
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
                            console.log(response);
                            if(response.status == 200){
                                $('#exampleModal').modal('hide');
                                window.location.href= 'http://127.0.0.1:8000/admin/employee/';
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