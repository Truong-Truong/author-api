<?php
declare(strict_types=1);

namespace App\Domain\service\Authentication;

use App\Application\Employee\EmployeeCreateResult;
use App\Models\Employee;

final class CreateTokenService
{
    /**
     * @var Employee
     */
    private $employee;

    /**
     * CreateTokenService constructor.
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * @param Employee $employee
     * @return \App\Application\Employee\EmployeeCreateResult $employeeCreateResult
     */
    public function handle(): EmployeeCreateResult
    {
        $accessToken = $this->employee->createToken('authToken')->accessToken;
        return new EmployeeCreateResult(
            $this->employee,
            $accessToken
        );
    }
}
