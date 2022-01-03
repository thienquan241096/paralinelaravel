<?php

namespace App\Http\Controllers\Backend\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PermissionRepository;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\Backend\Permissions\StorePermissionRequest;
use App\Http\Requests\Backend\Permissions\UpdatePermissionRequest;
use DB;
use Illuminate\Database\Eloquent\Collection;
use App\Constant\PermissionConstant;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    //
    protected $permissionRepository;

    public function __construct(
        PermissionRepository $permissionRepository
    ) {
        $this->permissionRepository = $permissionRepository;
    }

    public function index() {
        if (Auth::user()->can(PermissionConstant::PERMISSION_PERMISSION_LIST)) {
            $permissions = $this->permissionRepository->orderBy('name','asc')
            ->listPermission();
            return view('backend/admin/permissions/index', compact('permissions'));
        }
    }

    public function create() {
        if (Auth::user()->can(PermissionConstant::PERMISSION_PERMISSION_CREATE)) {
            $tables = DB::select('SHOW TABLES');
            $database = env('DB_DATABASE');
            $combine = "Tables_in_".$database;
            $data = new Collection;
            foreach($tables as $table){
                $data->put($table->$combine, $table->$combine);
            }

            return view('backend/admin/permissions/create', compact('data'));
        }
    }

    public function store(StorePermissionRequest $request) {
        if (Auth::user()->can(PermissionConstant::PERMISSION_PERMISSION_CREATE)) {
            if($request->validated()) {
                $customer = $this->permissionRepository->create($request->validated());
                $customer->save();
                return redirect()->route('backend.admin.permissions.show')->with('success', Lang::get('message.create', ['model' => 'Permission']));
            }  
        } 
    }

    public function edit(Request $request) {
        if (Auth::user()->can(PermissionConstant::PERMISSION_PERMISSION_EDIT)) {
            $permission = $this->permissionRepository->find($request->id);
            $tables = DB::select('SHOW TABLES');
            $database = env('DB_DATABASE');
            $combine = "Tables_in_".$database;
            $data = new Collection;
            foreach($tables as $table){
                $data->put($table->$combine, $table->$combine);
            }
            return view('backend/admin/permissions/edit', compact('permission', 'data'));
        }
    }

    public function update(UpdatePermissionRequest $request) { 
        if (Auth::user()->can(PermissionConstant::PERMISSION_PERMISSION_EDIT)) {  
            if($request->validated()) {
                $permission = $this->permissionRepository->where('id', $request->id)->first();
                $permission->update($request->validated());
                $permission->save();
                return redirect()->route('backend.admin.permissions.edit', $permission->id)->with('success', Lang::get('message.update', ['model' => 'Permission']));;
            } 
        }
    }

    public function view(Request $request) {
        if (Auth::user()->can(PermissionConstant::PERMISSION_PERMISSION_VIEW)) {
            $permissions = $this->permissionRepository->find($request->id);
            return view('backend/admin/permissions/view', compact('permissions'));
        }
    }

    public function delete(Request $request) {
        if (Auth::user()->can(PermissionConstant::PERMISSION_PERMISSION_DELETE)) {
            $permission = $this->permissionRepository->find($request->id);
            $permission->delete();
            return redirect()->route('backend.admin.permissions.show')->with('success', Lang::get('message.delete', ['model' => 'Permission']));
        }
    }

    public function permissionsDelete(Request $request) {
        if (Auth::user()->can(PermissionConstant::PERMISSION_PERMISSION_DELETE)) {
            $this->permissionRepository->whereIn('id', explode(",", $request->ids))->delete();
            return response()->json(['success' => "Delete permission successful"]);
        }
    }

    public function search(Request $request) {
        $permissions = $this->permissionRepository
                        ->where('name', 'like', '%'. $request->search .'%')
                        ->orWhere('slug', 'like', '%'. $request->search .'%')
                        ->orderBy('name', 'asc')
                        ->paginate(6);
        if ($request->ajax()) {
    		$view = view('backend.admin.permissions.search', compact('permissions'))->render();
            return response()->json(['html'=>$view]);
        }
    }
}
