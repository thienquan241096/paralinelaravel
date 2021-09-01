<?php

namespace App\Repositories\EmployeeRepositories;

use App\Models\Employee;
use App\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Auth;

class EmployeeRepository extends AbstractRepository implements InterfaceEmployeeRepository
{
    public function getModel()
    {
        return new Employee();
    }

    public function deleteEmployeeByTeamID($parent_id, $attributes = [])
    {
        $attributes['upd_id'] = Auth::user()->id;
        if (!$parent_id) {
            return false;
        }
        return $this->model->where('team_id', $parent_id)->update($attributes);
    }

    public function search($keyword)
    {
        return $this->model->where('last_name', 'like', '%' . "$keyword" . '%')->where('del_flag', '=', DEL_FLAG)->orderByDesc('id');
    }
}