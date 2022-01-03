@extends('layouts.backend')
@section('content')
    <div class="wrapper">

        @include('backend.includes.navbar-top', [
            'show' => 'Role',
            'id' => $role->id,
            'url' => route('backend.admin.role.show')
        ])

        <div class="content-wrapper" style="min-height: 1602px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6" style="padding:30px;">
                            <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Role View</h1>
                            <a href="{{ route('backend.admin.role.edit', $role->id) }}" class="btn btn-success float-left mr-2"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{ route('backend.admin.role.delete', $role->id) }}" class="btn btn-danger float-left mr-2"><i class="fas fa-edit"></i> Delete</a>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                    <input type="hidden" name="id" value="{{ $role->id }}"/>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" name="name" value="{{ $role->name }}" id="inputName" class="form-control" disabled/>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName">Slug</label>
                                        <input type="text" name="name" value="{{ $role->slug }}" id="inputName" class="form-control" disabled/>
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
                                        @foreach($permissions as $key => $permission)
                                            <tr class="expandable-body" >
                                                <td>
                                                    <div class="p-0">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                                    <td style="font-weight: bold;">
                                                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                                        <div class="icheck-primary d-inline">
                                                                            <input type="checkbox" id="{{ $key }}" class="check_permission {{ $key }} {{ $key.'-1' }}" onclick="checkBoxPermission(this, '{{ $key }}')" disabled>
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
                                                                                    @foreach($permission as $idPermission => $value)
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="icheck-success d-inline">
                                                                                                    <input type="checkbox" name="permissions[]" value="{{ $value->slug }}" id="{{ $value->slug }}" class="check_permission {{ $key.'-2' }} {{ $key }} {{ $value->slug }}" onclick="checkBoxPermissionChild(this, '{{ $key }}', '{{ $value->slug }}')" {{ isset($value->roles[0]->pivot->permission_id) == $value->id ? 'checked' : '' }} disabled>
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
            </section>
            <!-- /.content -->
        </div>

    </div>

@endsection
