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

    public function deleteTeamByGroupID($parent_id, $attributes = [])
    {
        $attributes['upd_id'] = 1;
        if (!$parent_id) {
            return false;
        }
        return $this->model->where('group_id', $parent_id)->update($attributes);
    }

    public function search($keyword)
    {
        return 1;
    }
}