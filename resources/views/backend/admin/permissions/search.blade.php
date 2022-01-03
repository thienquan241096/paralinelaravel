@foreach($permissions as $permission)
    <tr>
        <td>
            <div class="form-group">
                <div class="form-check">
                    <input value="{{ $permission->id }}" data-id="{{ $permission->id }}" class="form__check-all-target form-check-input sub_chk" type="checkbox">
                </div>
            </div>
        </td>
        
        <td>{{ $permission->name }}</td>
        <td>{{ $permission->slug }}</td>
        <td>
            <a href="{{ route('backend.admin.permissions.view' , $permission->id) }}" class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> View</a>
            <a href="{{ route('backend.admin.permissions.edit', $permission->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
            <a href="{{ route('backend.admin.permissions.delete', $permission->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> Delete</a>
        </td>
    </tr>
@endforeach