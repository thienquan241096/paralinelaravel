<?php

namespace App\Http\Controllers\Admin\Team;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamFormRequest;
use App\Repositories\EmployeeRepositories\InterfaceEmployeeRepository;
use App\Repositories\GroupRepositories\InterfaceGroupRepository;
use App\Repositories\TeamRepositories\InterfaceTeamRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class TeamController extends Controller
{
    protected $team;
    protected $group;
    protected $employee;

    public function __construct(InterfaceGroupRepository $group, InterfaceTeamRepository $team, InterfaceEmployeeRepository $employee)
    {
        $this->team = $team;
        $this->group = $group;
        $this->employee = $employee;
    }

    public function index()
    {
        $teams = $this->team->all();
        $teams->load('m_groups');
        return view('admin.team.index', compact('teams'));
    }

    public function view(Request $request)
    {
        $team = $this->team->findByID($request->id);
        $team->load('m_groups');
        return view('admin.team.view', compact('team'));
    }

    public function getAdd(Request $request)
    {
        $groups = $this->group->all();
        return view('admin.team.add', compact('groups'));
    }

    public function postAdd(TeamFormRequest $request)
    {
        $this->team->create($request->all());
        return redirect()->route('admin.team.index')->with('message', 'Create success');
    }

    public function getEdit(Request $request)
    {
        $team = $this->team->findByID($request->id);
        $groups = $this->group->all();
        return view('admin.team.edit', compact('team', 'groups'));
    }

    public function postEdit(TeamFormRequest $request)
    {
        $this->team->update($request->id, $request->all());
        return redirect()->route('admin.team.index')->with('message', 'Update success');
    }

    public function delete(Request $request)
    {
        $data = Config::get('common.DEL_FLAG');
        $this->employee->deleteEmployeeByTeamID($request->id, $data);
        $this->team->delete($request->id, $data);
        return redirect()->route('admin.team.index')->with('message', 'Delete success');
    }
}