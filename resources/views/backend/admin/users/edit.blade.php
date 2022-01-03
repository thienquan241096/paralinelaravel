@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
        'edit' => 'User',
        'id' => $user->id,
        'url' => route('backend.admin.users.show')
    ])

    @include('backend.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> User Edit</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.users.update') }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="id" value="{{ $user->id }}" />
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" name="name" value="{{ $user->name }}" id="inputName" class="form-control" required />
                                    @if ($errors->has('name'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Email</label>
                                    <input type="email" name="email" value="{{ $user->email }}" id="inputName" class="form-control" required />
                                    @if ($errors->has('email'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Password</label>
                                    <br>
                                    <small>Leave empty to keep the same</small>
                                    <input type="password" name="password" id="password" class="form-control" />
                                    @if ($errors->has('password'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('password') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputStatus">Primary Role</label>
                                    <select id="inputStatus" name="role_id" class="form-control custom-select" required>
                                        @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id', $user->role_id == $role->id ? 'selected' : '') }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('role_id'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('role_id') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Avatar</label>
                                    <div class="input-group">
                                        <input type="file" id="adBanner" class="form__file-control" name="avatar" />
                                        <label for="adBanner" class="form__banner form__file-presenter">
                                            <img class="form__file-thumb" src="{{ asset('storage/avatars/'.$user->avatar) }}" />
                                        </label>
                                    </div>
                                    @if ($errors->has('avatar'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('avatar') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Edit user" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary float-left">Cancel</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>

@endsection