<?php
declare(strict_types=1);

namespace App\Infrastructure\Employee;

use App\Application\Employee\request\EmployeeCreateRequest;
use App\Models\Employee;

interface IEmployeeRepository
{
    /**
     * @param EmployeeCreateRequest $employeeCreateRequest
     * @return \App\Models\Employee $employee employee
     */
    public function register(EmployeeCreateRequest $employeeCreateRequest): Employee;
}
