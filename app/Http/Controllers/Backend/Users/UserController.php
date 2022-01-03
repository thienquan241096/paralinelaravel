<?php

namespace App\Http\Controllers\Backend\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\Users\StoreUsersRequest;
use App\Http\Requests\Backend\Users\UpdateUsersRequest;
use Hash;
use Illuminate\Support\Facades\Lang;
use Auth;
use App\Constant\PermissionConstant;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    protected $userRepository;
    protected $roleRepository;

    public function __construct(
        User $userRepository,
        Role    $roleRepository
    ) {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index() {
        if(Auth::user()->can(PermissionConstant::USER_PERMISSION_LIST)) {
            $users = $this->userRepository->all();
            return view('backend/admin/users/index', compact('users'));
        }
    }

    public function create() {
        if(Auth::user()->can(PermissionConstant::USER_PERMISSION_CREATE)) {
            $roles = $this->roleRepository->all();
            return view('backend/admin/users/create', compact('roles'));
        }
    }

    public function store(StoreUsersRequest $request) {
        if(Auth::user()->can(PermissionConstant::USER_PERMISSION_CREATE)) {
            if($request->validated()) {
                $role = $this->roleRepository->where('id', $request['role_id'])->first();
                if(!$role) {
                    return redirect()->route('backend.admin.users.create')->with('wrong', Lang::get('message.wrong', ['model' => 'Role']));
                }
                $user = $this->userRepository->create($request->validated());
                $user->password = Hash::make($request->password);
                $user->avatar = $this->userRepository->uploadAvatar($request->file('avatar'));
                $user->save();
                $user->roles()->attach($role);
                // $permissions = $this->roleRepository->with('permissions')->where('id', $role->id)->first();
                // $user->permissions()->attach($permissions->permissions);
                return redirect()->route('backend.admin.users.show')->with('success', Lang::get('message.create', ['model' => 'User']));
            }
        }
    }

    public function view(Request $request) {
        if(Auth::user()->can(PermissionConstant::USER_PERMISSION_VIEW)) {
            $user = $this->userRepository->find($request->id);
            $roles = $this->roleRepository->all();
            return view('backend/admin/users/view', compact('user', 'roles'));
        }
    }

    public function edit(Request $request) {
        if(Auth::user()->can(PermissionConstant::USER_PERMISSION_EDIT)) {
            $user = $this->userRepository->find($request->id);
            $roles = $this->roleRepository->all();
            return view('backend/admin/users/edit', compact('user', 'roles'));
        }
    }

    public function update(UpdateUsersRequest $request) {
        if(Auth::user()->can(PermissionConstant::USER_PERMISSION_EDIT)) {
            if($request->validated()) {
                $role = $this->roleRepository->where('id', $request['role_id'])->first();
                if(!$role) {
                    return redirect()->route('backend.admin.users.create')->with('wrong', Lang::get('message.wrong', ['model' => 'Role']));
                }
                $user = $this->userRepository->find($request->id);
                $user->update($request->validated());
                if($request->password) {
                    $user->password = Hash::make($request->password);
                }
                if($request->hasFile('avatar')) {
                    $user->avatar = $this->userRepository->uploadAvatar($request->file('avatar'));
                }
                $user->save();
                $user->roles()->detach();
                $user->roles()->attach($role);
                // $permissions = $this->roleRepository->with('permissions')->where('id', $role->id)->first();
                // $user->permissions()->syncWithoutDetaching($permissions->permissions);
                return redirect()->route('backend.admin.users.edit', $user->id)->with('success', Lang::get('message.update', ['model' => 'User']));;
            }
        }
    }

    public function delete(Request $request) {
        if(Auth::user()->can(PermissionConstant::USER_PERMISSION_DELETE)) {
            if(Auth::user()->id === (int)$request->id) {
                return redirect()->route('backend.admin.users.show')->with('wrong', Lang::get('message.wrong', ['model' => 'User']));
            }
            $user = $this->userRepository->find($request->id);
            $user->delete();
            return redirect()->route('backend.admin.users.show')->with('success', Lang::get('message.delete', ['model' => 'User']));
        }
    }

    public function usersDelete(Request $request) {
        if(Auth::user()->can(PermissionConstant::USER_PERMISSION_DELETE)) {
            $this->userRepository->whereIn('id', explode(",", $request->ids))->delete();
            return response()->json(['success' => "Delete user successful"]);
        }
    }

    public function search(Request $request) {
        $users = $this->userRepository
                        ->where('name', 'like', '%'. $request->search .'%')
                        ->orWhere('email', 'like', '%'. $request->search .'%')
                        ->orWhereHas('role', function ($query) use ($request) {
                            $query->where('name', 'like', '%'. $request->search .'%');
                        })->orderBy('id', 'asc')->paginate(6);
        $roles = $this->roleRepository->all();
        if ($request->ajax()) {
    		$view = view('backend.admin.users.search', compact('users','roles'))->render();
            return response()->json(['html'=>$view]);
        }
    }
}