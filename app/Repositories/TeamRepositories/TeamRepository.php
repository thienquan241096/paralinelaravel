<?php

namespace App\Repositories\TeamRepositories;

use App\Models\Team;
use App\Repositories\AbstractRepository;

class TeamRepository extends AbstractRepository implements InterfaceTeamRepository
{
    public function getModel()
    {
        return new Team();
    }
}