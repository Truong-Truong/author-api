<?php
declare(strict_types=1);

namespace App\Application\Authentication\service;

use App\Application\Authentication\result\TokenResult;
use App\Application\Employee\result\EmployeeCreateResult;
use App\Models\Employee;

final class CreateTokenApplicationService
{
    /**
     * @var Employee
     */
    private $employee;

    /**
     * CreateTokenApplicationService constructor.
     * @param \App\Models\Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * @param \App\Models\Employee $employee
     * @return \App\Application\Employee\result\EmployeeCreateResult $employeeCreateResult
     */
    public function handle(): EmployeeCreateResult
    {
        $accessToken = $this->employee->createToken('authToken')->accessToken;
        return new EmployeeCreateResult(
            $this->employee,
            new TokenResult($accessToken)
        );
    }
}
