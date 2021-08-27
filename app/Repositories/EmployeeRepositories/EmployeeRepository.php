<?php

namespace App\Repositories\EmployeeRepositories;

use App\Models\Employee;
use App\Repositories\AbstractRepository;

class EmployeeRepository extends AbstractRepository implements InterfaceEmployeeRepository
{
    public function getModel()
    {
        return new Employee();
    }

    public function deleteEmployeeByTeamID($parent_id, $attributes = [])
    {
        $attributes['upd_id'] = 1;
        if (!$parent_id) {
            return false;
        }
        return $this->model->where('team_id', $parent_id)->update($attributes);
    }
}