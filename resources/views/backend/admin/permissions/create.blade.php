@extends('layouts.backend')
@section('content')
<div class="wrapper">

    @include('backend.includes.navbar-top', [
        'add' => 'Permissions',
        'url' => route('backend.admin.permissions.show')
    ])

    @include('backend.components.alert')

    <div class="content-wrapper" style="min-height: 1602px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="padding:30px;">
                        <h1 class="float-left mr-5"><i class="nav-icon fas fa-user"></i> Permission Add</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" action="{{ route('backend.admin.permissions.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputStatus">Permission Table</label>
                                    <select id="inputStatus" name="name" class="form-control custom-select" required>
                                        <option value="{{ $data['users'] }}">{{ $data['users'] }}</option>
                                        <option value="{{ $data['roles'] }}">{{ $data['roles'] }}</option>
                                        <option value="{{ $data['customers'] }}">{{ $data['customers'] }}</option>
                                        <option value="{{ $data['customers'] }}">{{ $data['permissions'] }}</option>
                                        <option value="{{ $data['plans'] }}">{{ $data['plans'] }}</option>
                                        <option value="{{ $data['categories_plans'] }}">{{ $data['categories_plans'] }}</option>
                                    </select>  
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputStatus">Key</label>
                                    <select id="inputStatus" name="slug" class="form-control show-permission-table" required>
                                        <option value="">Select your permission value</option>
                                    </select>  
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Create new permission" class="btn btn-success float-left mr-2" />
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
    <script>
        $( ".custom-select" ).change(function() {
            var table = $(this).val();
            var html = `
                <option value="list-${table.replace('_', '-')}">list-${table.replace('_', '-')}</option>
                <option value="view-${table.replace('_', '-')}">view-${table.replace('_', '-')}</option>
                <option value="edit-${table.replace('_', '-')}">edit-${table.replace('_', '-')}</option>
                <option value="delete-${table.replace('_', '-')}">delete-${table.replace('_', '-')}</option>
                <option value="create-${table.replace('_', '-')}">create-${table.replace('_', '-')}</option>
            `
            $('.show-permission-table').html(html);
        });
    </script>
@endsection