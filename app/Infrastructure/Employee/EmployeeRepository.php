<?php
declare(strict_types=1);

namespace App\Infrastructure\Employee;

use App\Domain\Employee\Employee as EmployeeDomain;
use App\Infrastructure\Employee\IEmployeeRepository;
use App\Models\Employee;

final class EmployeeRepository implements IEmployeeRepository
{
    /**
     * @param \App\Domain\Employee\Employee $employeeDomain
     * @return \App\Models\Employee $employee employee
     */
    public function register(EmployeeDomain $employeeDomain): Employee
    {
        $employee = Employee::create($employeeDomain->toArray());
        return $employee;
    }
}
