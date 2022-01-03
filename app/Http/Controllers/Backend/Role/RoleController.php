<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;
use App\Services\RoleService;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Role\StoreRoleRequest;
use App\Http\Requests\Backend\Role\UpdateRoleRequest;
use Hash;
use Auth;
use Illuminate\Support\Facades\Lang;
use App\Constant\PermissionConstant;

class RoleController extends Controller
{
    protected $roleRepository;
    protected $roleService;
    protected $permissionRepository;

    public function __construct(
        RoleRepository $roleRepository,
        RoleService $roleService,
        PermissionRepository $permissionRepository
    ) {
        $this->roleRepository = $roleRepository;
        $this->roleService = $roleService;
        $this->permissionRepository = $permissionRepository;
    }

    public function index() {
        if(Auth::user()->can(PermissionConstant::ROLE_PERMISSION_LIST)) {
            $roles = $this->roleRepository->paginate(10);
            return view('backend/admin/role/index', compact('roles'));
        }
    }

    public function create() {
        if(Auth::user()->can(PermissionConstant::ROLE_PERMISSION_CREATE)) {
            $permissions = $this->permissionRepository->orderBy('name')->get()->groupBy(function($data) {
                return $data->name;
            });
            return view('backend/admin/role/create', compact('permissions'));
        }
    }

    public function store(StoreRoleRequest $request) {
        if(Auth::user()->can(PermissionConstant::ROLE_PERMISSION_CREATE)) {
            if($request->validated()) {
                $role = $this->roleRepository->create($request->validated());
                if(is_array($request['permissions'])) {
                    $permissions =  $this->permissionRepository->whereIn('slug', $request['permissions'])->get();
                    $role->permissions()->attach($permissions);
                }
                return redirect()->route('backend.admin.role.show')->with('success', Lang::get('message.create', ['model' => 'role']));
            }
        }
    }

    public function view(Request $request) {
        $role = $this->roleRepository->find($request->id);
        $permissions = $this->permissionRepository->with(['roles' => function($q) use ($role) {
        return $q->where('id', $role->id);
        }])->orderBy('name')->get()->groupBy(function($data) {
            return $data->name;
        });
        return view('backend/admin/role/view', compact('role','permissions'));
    }

    public function edit(Request $request) {
        if(Auth::user()->can(PermissionConstant::ROLE_PERMISSION_EDIT)) {
            $role = $this->roleRepository->find($request->id);
            $permissions = $this->permissionRepository->with(['roles' => function($q) use ($role) {
            return $q->where('id', $role->id);
            }])->orderBy('name')->get()->groupBy(function($data) {
                return $data->name;
            });
            return view('backend/admin/role/edit', compact( 'role', 'permissions'));
        }
    }

    public function update(UpdateRoleRequest $request) {
        if(Auth::user()->can(PermissionConstant::ROLE_PERMISSION_EDIT)) {
            if($request->validated()) {
                $role = $this->roleRepository->find($request->id);
                $role->update($request->validated());
                $role->save();
                if(is_array($request['permissions'])) {
                    $role->permissions()->detach();
                    $permissions =  $this->permissionRepository->whereIn('slug', $request['permissions'])->get();
                    $role->permissions()->attach($permissions);
                }
                return redirect()->route('backend.admin.role.show')->with('success', Lang::get('message.update', ['model' => 'role']));;
            }
        }
    }

    public function delete(Request $request) {
        if(Auth::user()->can(PermissionConstant::ROLE_PERMISSION_DELETE)) {
            $user = $this->roleRepository->find($request->id);
            $user->delete();
            return redirect()->route('backend.admin.users.show')->with('success', Lang::get('message.delete', ['model' => 'User']));
        }
    }

    public function usersDelete(Request $request) {
        if(Auth::user()->can(PermissionConstant::ROLE_PERMISSION_DELETE)) {
            $this->roleRepository->whereIn('id', explode(",", $request->ids))->delete();
            return response()->json(['success' => "Delete user successful"]);
        }
    }
    public function search(Request $request) {
        $roles = $this->roleRepository
                        ->where('name', 'like', '%'. $request->search .'%')
                        ->orderBy('id', 'asc')
                        ->paginate(6);
        if ($request->ajax()) {
    		$view = view('backend.admin.role.search', compact('roles'))->render();
            return response()->json(['html'=>$view]);
        }
    }
}