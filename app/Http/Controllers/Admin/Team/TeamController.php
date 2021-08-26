<?php

namespace App\Http\Controllers\Admin\Team;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamFormRequest;
use App\Repositories\GroupRepositories\InterfaceGroupRepository;
use App\Repositories\TeamRepositories\InterfaceTeamRepository;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    protected $team;
    protected $group;

    public function __construct(InterfaceGroupRepository $group, InterfaceTeamRepository $team)
    {

        $this->team = $team;
        $this->group = $group;
    }

    public function index()
    {
        $teams = $this->team->all();
        $teams->load('m_groups');
        // $groups = $this->group->all();
        return view('admin.team.index', compact('teams'));
        // , compact('teams', 'groups')
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
        return redirect()->route('admin.team.index')->with('message', 'create success');
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
        // dump(1);
        // die;
        $this->team->delete($request->id, [
            'del_flag' => 1
        ]);
        return redirect()->route('admin.team.index')->with('message', 'Delete success');
    }
}