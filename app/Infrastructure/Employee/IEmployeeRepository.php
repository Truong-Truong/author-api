<?php
declare(strict_types=1);

namespace App\Infrastructure\Employee;

use App\Application\Employee\EmployeeCreateCommand;
use App\Models\Employee;

interface IEmployeeRepository
{
    /**
     * @param EmployeeCreateCommand $employeeCreateCommand
     * @return \App\Models\Employee $employee employee
     */
    public function register(EmployeeCreateCommand $employeeCreateCommand): Employee;
}
