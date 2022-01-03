@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
    'add' => 'Users',
    'url' => route('backend.admin.users.show')
    ])

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
            <form method="POST" action="{{ route('backend.admin.role.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" name="name" id="title" class="form-control" required />
                                    @if ($errors->has('name'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('name') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputDescription">Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" required />
                                    @if ($errors->has('slug'))
                                    <div class="mt-1 text-red-500">
                                        {{ $errors->first('slug') }}
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="font-weight: bold;">Permissions</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body p-0">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td class="border-0">
                                                &nbsp;
                                                <a href="#" class="check_permission_all">Select All </a>
                                                /&nbsp;
                                                <a href="#" class="deselect_permission_all">Deselect All</a>
                                            </td>
                                        </tr>
                                        @foreach($permissions as $key => $permission)
                                            <tr class="expandable-body">
                                                <td>
                                                    <div class="p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td style="font-weight: bold;">
                                                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                        <div class="icheck-primary d-inline">
                                                                            <input type="checkbox" id="{{ $key }}" class="check_permission {{ $key }} {{ $key.'-1' }}" onclick="checkBoxPermission(this, '{{ $key }}')">
                                                                            <label for="{{ $key }}"></label>
                                                                        </div>
                                                                        {{ $key }} &nbsp;
                                                                    </td>
                                                                </tr>
                                                                <tr class="expandable-body">
                                                                    <td>
                                                                        <div class="p-0" style="display: none;">
                                                                            <table class="table table-hover">
                                                                                <tbody>
                                                                                    @foreach($permission as $value)
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="icheck-success d-inline">
                                                                                                    <input type="checkbox" name="permissions[]" value="{{ $value->slug }}" id="{{ $value->slug }}" class="check_permission {{ $key.'-2' }} {{ $key }} {{ $value->slug }}" onclick="checkBoxPermissionChild(this, '{{ $key }}', '{{ $value->slug }}')">
                                                                                                    <label for="{{ $value->slug }}">
                                                                                                    </label>
                                                                                                </div>
                                                                                                {{ $value->slug }}
                                                                                            </td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
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

@section('js')
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/permission.js') }}"></script>
@endsection