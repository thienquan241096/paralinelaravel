<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeFormRequest;
use App\Repositories\EmployeeRepositories\InterfaceEmployeeRepository;
use App\Repositories\GroupRepositories\InterfaceGroupRepository;
use App\Repositories\TeamRepositories\InterfaceTeamRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class EmployeeController extends Controller
{

    protected $employee;
    protected $team;
    protected $group;

    public function __construct(InterfaceEmployeeRepository $employee, InterfaceTeamRepository $team, InterfaceGroupRepository $group)
    {
        $this->employee = $employee;
        $this->team = $team;
        $this->group = $group;
    }

    public function index()
    {
        $employees = $this->employee->all();
        $teams = $this->team->getAll();
        $groups = $this->group->getAll();
        $teams->load('m_groups');
        $employees->load('m_teams');
        return view('admin.employee.index', compact('employees', 'teams', 'groups'));
    }

    public function getSearch(Request $request)
    {
        // $employees = $this->employee->all();
        $teams = $this->team->getAll();
        $groups = $this->group->getAll();
        $employees = $this->employee->search($request->keywordName);
        if ($request->keywordEmail != "") {
            $employees->email($request->keywordEmail);
        }
        // $employees
        $teams->load('m_groups');
        $employees->load('m_teams');
        return view('admin.employee.index', compact('employees', 'teams', 'groups'));
    }


    public function view(Request $request)
    {
        $teams  = $this->team->getAll();
        $employee = $this->employee->findByID($request->id);
        $employee->load('m_teams');
        return view('admin.employee.view', compact('employee', 'teams'));
    }

    public function getAdd(Request $request)
    {
        $teams = $this->team->getAll();
        return view('admin.employee.add', compact('teams'));
    }

    public function postAdd(EmployeeFormRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $newFileName = uniqid() . '-' . $request->avatar->getClientOriginalName();
            $path = $request->avatar->storeAs('public/uploads/employee', $newFileName);
            $avatar = $this->employee->avatar = str_replace('public/', '', $path);
        }
        $data = [
            'team_id' => $request->team_id,
            'avatar' => $avatar,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'salary' => $request->salary,
            'position' => $request->position,
            'status' => $request->status,
            'type_of_work' => $request->type_of_work,
        ];
        $this->employee->create($data);
        return response()->json([
            'status' => 200,
            'message' => 'Create success'
        ]);
    }

    public function getEdit(Request $request)
    {
        $employee = $this->employee->findByID($request->id);
        $teams = $this->team->getAll();
        return view('admin.employee.edit', compact('employee', 'teams'));
    }

    public function postEdit(EmployeeFormRequest $request)
    {
        if ($request->avatar == "") {
            $avatar = $this->employee->findByID($request->id)->avatar;
        } else {
            $newFileName = uniqid() . '-' . $request->avatar->getClientOriginalName();
            $path = $request->avatar->storeAs('public/uploads/employee', $newFileName);
            $avatar = $this->employee->avatar = str_replace('public/', '', $path);
        }

        $data = [
            'team_id' => $request->team_id,
            'avatar' => $avatar,
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'salary' => $request->salary,
            'position' => $request->position, 'status' => $request->status, 'type_of_work' => $request->type_of_work,
        ];
        $this->employee->update($request->id, $data);
        return response()->json([
            'status' => 200,
            'message' => 'Update success'
        ]);
    }

    public function delete(Request $request)
    {
        $data = Config::get('common.DEL_FLAG');
        $this->employee->delete($request->id, $data);
        return redirect()->route('admin.employee.index')->with('message', 'Delete success');
    }
}