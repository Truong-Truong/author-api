<?php
declare(strict_types=1);

namespace App\Infrastructure\Employee;

use App\Application\Employee\EmployeeCreateCommand;
use App\Infrastructure\Employee\IEmployeeRepository;
use App\Models\Employee;

final class EmployeeRepository implements IEmployeeRepository
{
    /**
     * @param EmployeeCreateCommand $employeeCreateCommand
     * @return \App\Models\Employee $employee employee
     */
    public function register(EmployeeCreateCommand $employeeCreateCommand): Employee
    {
        $employee = Employee::create($employeeCreateCommand->toArray());
        return $employee;
    }
}
