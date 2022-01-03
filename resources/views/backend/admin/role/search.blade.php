@foreach($roles as $role)
    <tr>
        <td>
            <div class="form-group">
                <div class="form-check">
                    <input value="{{ $role->id }}" data-id="{{ $role->id }}" class="form__check-all-target form-check-input sub_chk" type="checkbox">
                </div>
            </div>
        </td>
        
        <td>{{ $role->name }}</td>
        <td>
            <a href="{{ route('backend.admin.role.view' , $role->id) }}" class="btn btn-warning btn-sm btn-warning-edit"><i class="fas fa-eye"></i> View</a>
            <a href="{{ route('backend.admin.role.edit', $role->id) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
            <a href="{{ route('backend.admin.role.delete', $role->id) }}" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> Delete</a>
        </td>
    </tr>
@endforeach