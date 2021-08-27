<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeFormRequest;
use App\Repositories\EmployeeRepositories\InterfaceEmployeeRepository;
use App\Repositories\TeamRepositories\InterfaceTeamRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class EmployeeController extends Controller
{

    protected $employee;
    protected $team;

    public function __construct(InterfaceEmployeeRepository $employee, InterfaceTeamRepository $team)
    {
        $this->employee = $employee;
        $this->team = $team;
    }

    public function index()
    {
        $employees = $this->employee->all();
        $employees->load('m_teams');
        // dump($employees);
        return view('admin.employee.index', compact('employees'));
    }
    public function view(Request $request)
    {
        // $employee = $this->employee->findByID($request->id);
        // $employee->load('m_groups');
        // return view('admin.employee.view', compact('employee'));
    }

    public function getAdd(Request $request)
    {
        $teams = $this->team->all();
        return view('admin.employee.add', compact('teams'));
    }

    public function postAdd(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $newFileName = uniqid() . '-' . $request->avatar->getClientOriginalName();
            $path = $request->avatar->storeAs('public/uploads/employee', $newFileName);
        }
        $data = [
            'team_id' => $request->team_id,
            'avatar' => $this->employee->avatar = str_replace('public/', '', $path),
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender, 'birthday' => $request->birthday,
            'address' => $request->address,
            'salary' => $request->salary,
            'position' => $request->position, 'status' => $request->status, 'type_of_work' => $request->type_of_work,
        ];
        $this->employee->create($data);
        return redirect()->route('admin.employee.index')->with('message', 'Create success');
    }

    public function getEdit(Request $request)
    {
        $employee = $this->employee->findByID($request->id);
        $teams = $this->team->all();
        return view('admin.employee.edit', compact('employee', 'teams'));
    }

    public function postEdit(EmployeeFormRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $newFileName = uniqid() . '-' . $request->avatar->getClientOriginalName();
            $path = $request->avatar->storeAs('public/uploads/employee', $newFileName);
        }

        $data = [
            'team_id' => $request->team_id,
            'avatar' => $this->employee->avatar = str_replace('public/', '', $path),
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender, 'birthday' => $request->birthday,
            'address' => $request->address,
            'salary' => $request->salary,
            'position' => $request->position, 'status' => $request->status, 'type_of_work' => $request->type_of_work,
        ];
        $this->employee->update($request->id, $data);
        return redirect()->route('admin.employee.index')->with('message', 'Update success');
    }

    public function delete(Request $request)
    {
        $data = Config::get('common.DEL_FLAG');
        $this->employee->delete($request->id, $data);
        return redirect()->route('admin.employee.index')->with('message', 'Delete success');
    }
}