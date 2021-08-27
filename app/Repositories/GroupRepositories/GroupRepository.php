<?php

namespace App\Repositories\GroupRepositories;

use App\Models\Group;
use App\Repositories\AbstractRepository;

class GroupRepository extends AbstractRepository implements InterfaceGroupRepository
{
    public function getModel()
    {
        return new Group();
    }

    public function test()
    {
    }
}