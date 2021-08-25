<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
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
        dump($groups);
        return view('admin.group.index');
    }
}