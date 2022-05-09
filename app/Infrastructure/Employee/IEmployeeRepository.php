<?php
declare(strict_types=1);

namespace App\Infrastructure\Employee;

use App\Domain\Employee\Employee as EmployeeDomain;
use App\Models\Employee;

interface IEmployeeRepository
{
    /**
     * @param \App\Domain\Employee\Employee $employeeDomain
     * @return \App\Models\Employee $employee employee
     */
    public function register(EmployeeDomain $employeeDomain): Employee;
}
