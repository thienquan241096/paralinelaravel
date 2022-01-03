@extends('layouts.backend')
@section('content')
    <div class="wrapper">

        @include('backend.includes.navbar-top', [
            'show' => 'Permissions',
            'id' => $permissions->id,
            'url' => route('backend.admin.permissions.show')
        ])

        <div class="content-wrapper" style="min-height: 1602px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-8" style="padding:30px;">
                            <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Permission View</h1>
                            <a href="" class="btn btn-success float-left mr-2"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{ route('backend.admin.permissions.delete', $permissions->id) }}" class="btn btn-danger float-left mr-2"><i class="fas fa-edit"></i> Delete</a>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                    <input type="hidden" name="id" value="{{ $permissions->id }}"/>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" name="name" value="{{ $permissions->name }}" id="inputName" class="form-control" disabled/>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName">Slug</label>
                                        <input type="text" name="name" value="{{ $permissions->slug }}" id="inputName" class="form-control" disabled/>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                </div>
            </section>
            <!-- /.content -->
        </div>

    </div>

@endsection
