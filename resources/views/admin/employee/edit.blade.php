@extends('admin.layouts.index')
@section('title')
<h1>Edit TEAM</h1>
@endsection
@section('content')
<div id="success_message"></div>
<form id="form" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$employee->id}}">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" value="{{old('email',$employee->email)}}">
                <span class="text-danger" id="input-email-error"></span>
            </div>
            <div class="form-group">
                <label>last_name</label>
                <input type="text" class="form-control" name="last_name"
                    value="{{old('last_name',$employee->last_name)}}">
                <span class="text-danger" id="input-last_name-error"></span>
            </div>

            <div class="form-group">
                <label>first_name</label>
                <input type="text" class="form-control" name="first_name"
                    value="{{old('first_name',$employee->first_name)}}">
                <span class="text-danger" id="input-first_name-error"></span>
            </div>

            <div class="form-group">
                <label>birthday</label>
                <input type="text" class="form-control" name="birthday" value="{{old('birthday',$employee->birthday)}}"
                    placeholder="YYYY/mm/dd">
                <span class="text-danger" id="input-birthday-error"></span>
            </div>

            <div class="form-group">
                <label>address</label>
                <input type="text" class="form-control" name="address" value="{{old('address',$employee->address)}}">
                <span class="text-danger" id="input-address-error"></span>
            </div>

            <div class="form-group">
                <label>salary</label>
                <input type="text" class="form-control" name="salary" value="{{old('salary',$employee->salary)}}">
                <span class="text-danger" id="input-salary-error"></span>
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
                    <option value="{{$key}}" @if($key==old('gender',$employee->gender)) selected
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
                <span class="text-danger" id="image-input-error"></span>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Update
        employee</button>
</form>
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
                <button type="button" data-route="{{ route('admin.employee.postEdit') }}"
                    class="btn btn-primary btnYes">Yes</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   $('#form').submit(function (e) { 
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData);
       $('#exampleModal').modal('show');
       $('.btnYes').click(function (e) { 
           e.preventDefault();
           var route = $(this).data('route');
           $.ajax({
                type:'POST',
                url: route,
                data: formData,
                contentType: false,
                processData: false,
                //    dataType: "json",
                success: (response) => {
                    console.log(response);
                    if (response.status == 422) {
                        $('#exampleModal').modal('hide');
                        
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
                        
                    }else if(response.status ==200){
                        $('#exampleModal').modal('hide');
                        // window.location.href= 'http://127.0.0.1:8000/admin/employee/';
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        window.location.reload();

                    }
                },
            });
       });
   });
});
</script>
@endsection