<?php

namespace App\Http\Controllers;

use App\Repositories\GroupRepositories\InterfaceGroupRepository;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    protected $group;

    public function __construct(InterfaceGroupRepository $group)
    {
        $this->group = $group;
    }

    public function delete(Request $request)
    {
        $id = $request->get('inpGroupId');
        // $this->group->delete($id);
        dump($id);
    }
}