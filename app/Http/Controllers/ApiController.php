<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Http\Requests\GroupFormRequest;
use App\Http\Requests\TeamFormRequest;
use App\Repositories\EmployeeRepositories\InterfaceEmployeeRepository;
use App\Repositories\GroupRepositories\InterfaceGroupRepository;
use App\Repositories\TeamRepositories\InterfaceTeamRepository;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    protected $group;
    protected $team;
    protected $employee;

    public function __construct(InterfaceGroupRepository $group, InterfaceTeamRepository $team, InterfaceEmployeeRepository $employee)
    {
        $this->group = $group;
        $this->team = $team;
        $this->employee = $employee;
    }

    public function delete(Request $request)
    {
        $id = $request->get('inpGroupId');
        dump($id);
    }

    public function checkAddGroup(GroupFormRequest $request)
    {
        $inputName = $request->get('name');
        return response()->json([
            'status' => 200,
            'message' => "Success"
        ]);
    }

    public function checkEditGroup(GroupFormRequest $request)
    {
        $inputName = $request->get('name');
        return response()->json([
            'status' => 200,
            'message' => "Success"
        ]);
    }

    public function checkAddTeam(TeamFormRequest $request)
    {
        $result = $request->all();
        return response()->json([
            'status' => 200,
            'message' => "Success",
            'result' => $result
        ]);
    }

    public function checkEditTeam(TeamFormRequest $request)
    {
        $result = $request->all();
        return response()->json([
            'status' => 200,
            'message' => "Success",
            'result' => $result
        ]);
    }

    public function checkAddEmployee(EmployeeFormRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $newFileName = uniqid() . '-' . $request->avatar->getClientOriginalName();
            // $path = $request->avatar->storeAs('public/uploads/employee', $newFileName);
            // $avatar = $this->employee->avatar = str_replace('public/', '', $path);
        }
        $data = [
            'team_id' => $request->team_id,
            'avatar' => $newFileName,
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
        return response()->json([
            'status' => 200,
            'message' => "Success",
            'result' => $data
        ]);
    }

    public function checkEditEmployee(EmployeeFormRequest $request)
    {
        if ($request->avatar == null) {
            $newFileName = $this->employee->findByID($request->id)->avatar;
        } else {
            $newFileName = uniqid() . '-' . $request->avatar->getClientOriginalName();
        }

        $data = [
            'team_id' => $request->team_id,
            'avatar' => $newFileName,
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

        return response()->json([
            'status' => 200,
            'message' => "Success",
            'result' => $data
        ]);
    }
}