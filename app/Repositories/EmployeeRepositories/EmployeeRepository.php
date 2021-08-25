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
}