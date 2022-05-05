<?php
declare(strict_types=1);

namespace App\Infrastructure\Employee;

use App\Application\Employee\request\EmployeeCreateRequest;
use App\Infrastructure\Employee\IEmployeeRepository;
use App\Models\Employee;

final class EmployeeRepository implements IEmployeeRepository
{
    /**
     * @param EmployeeCreateRequest $employeeCreateRequest
     * @return \App\Models\Employee $employee employee
     */
    public function register(EmployeeCreateRequest $employeeCreateRequest): Employee
    {
        $employee = Employee::create($employeeCreateRequest->toArray());
        return $employee;
    }
}
