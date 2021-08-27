<?php

namespace App\Repositories\EmployeeRepositories;

use App\Repositories\InterfaceRepository;

interface InterfaceEmployeeRepository extends InterfaceRepository
{
    public function deleteEmployeeByTeamID($parent_id, $attributes = []);
}