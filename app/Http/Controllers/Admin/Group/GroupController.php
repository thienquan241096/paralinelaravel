<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupFormRequest;
use App\Repositories\GroupRepositories\InterfaceGroupRepository;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $group;

    public function __construct(InterfaceGroupRepository $group)
    {
        $this->group = $group;
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
        return redirect()->route('admin.group.index')->with('message', 'create success');
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
        $data = [
            'del_flag' => 1
        ];
        $delete = $this->group->delete($request->id, $data);

        return redirect()->route('admin.group.index')->with('message', 'Delete success');
    }
}