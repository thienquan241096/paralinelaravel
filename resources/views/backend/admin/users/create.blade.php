@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
        'add' => 'Users',
        'url' => route('backend.admin.users.show')
    ])

    @include('backend.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> User Add</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" id="inputName" class="form-control" required />
                                    @if ($errors->has('name'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" id="inputName" class="form-control" required />
                                    @if ($errors->has('email'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required />
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
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
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
                                            <img class="form__file-thumb" src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" />
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
                        <input type="submit" value="Create new user" class="btn btn-success float-left mr-2" />
                        <a href="#" class="btn btn-secondary float-left">Cancel</a>
                    </div>
                </div>
            </form>
        </section>
        <!-- /.content -->
    </div>

</div>


@endsection