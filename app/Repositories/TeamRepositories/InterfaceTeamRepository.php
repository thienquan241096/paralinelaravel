<?php

namespace App\Repositories\TeamRepositories;

use App\Repositories\InterfaceRepository;

interface InterfaceTeamRepository extends InterfaceRepository
{
    public function deleteTeamByGroupID($parent_id, $attributes = []);
    public function searchTeam($keyword, $group_id);
}