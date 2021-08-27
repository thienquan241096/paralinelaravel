<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupFormRequest;
use App\Repositories\GroupRepositories\InterfaceGroupRepository;
use App\Repositories\TeamRepositories\InterfaceTeamRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class GroupController extends Controller
{
    protected $group;
    protected $team;


    public function __construct(InterfaceGroupRepository $group, InterfaceTeamRepository $team)
    {
        $this->group = $group;
        $this->team = $team;
    }

    public function index()
    {
        $groups = $this->group->all();
        return view('admin.group.index', compact('groups'));
    }

    public function view(Request $request)
    {
        $group = $this->group->findByID($request->id);
        return view('admin.group.view', compact('group'));
    }

    public function getAdd()
    {
        return view('admin.group.add');
    }

    public function postAdd(GroupFormRequest $request)
    {
        $this->group->create($request->all());
        return redirect()->route('admin.group.index')->with('message', 'Create success');
    }

    public function getEdit(Request $request)
    {
        $group = $this->group->findByID($request->id);
        return view('admin.group.edit', compact('group'));
    }

    public function postEdit(GroupFormRequest $request)
    {
        $this->group->update($request->id, $request->all());
        return redirect()->route('admin.group.index')->with('message', 'Update success');
    }

    public function delete(Request $request)
    {
        $data = Config::get('common.DEL_FLAG');
        $this->team->deleteTeamByGroupID($request->id, $data);
        $this->group->delete($request->id, $data);

        return redirect()->route('admin.group.index')->with('message', 'Delete success');
    }
}